<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Cart;
use App\Order;
use App\OrderProduct;
use Cartalyst\Stripe\Stripe;
use Mail;
use App\Mail\OrderPlaced;
use App\Product;

class CheckoutController extends Controller
{


    public function index()
    {
        if (Cart::instance('default')->count() > 0) {
            $subtotal = Cart::instance('default')->subtotal() ?? 0;
            $discount = session('coupon')['discount'] ?? 0;
            $newSubtotal = $subtotal - $discount > 0 ? $subtotal - $discount : 0;
            $tax = $newSubtotal * (config('cart.tax') / 100);
            $total = $tax + $newSubtotal;
            return view('checkout')->with([
                'subtotal' => $subtotal,
                'discount' => $discount,
                'newSubtotal' => $newSubtotal,
                'total' => $total,
                'tax' => $tax
            ]);
        }
        return redirect()->route('cart.index')->withError('You have nothing in your cart , please add some products first');
    }

    public function store(CheckoutRequest $request)
    {
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withError('Sorry, one of the items on your cart is no longer available');
        }

        $paymentMethod = $request->payment_method;

        if ($paymentMethod == 'zalopay') {
            $this->handleZaloPayPayment($request);
        } else if ($paymentMethod == 'stripe') {
            $this->handleStripePayment($request);
        } else {
            $this->insertIntoOrdersTable($request, null, null);
            $this->handleOrderCompletion($request);
        }
    }

    public function handleZaloPayPayment($request)
    {
        $embeddata = '{}'; // Merchant's data
        $transID = rand(0, 1000000);

        $items = Cart::instance('default')->content()->map(function ($item) {
            return [
                "itemid"       => $item->model->slug,
                "itemname"     => $item->model->name,
                "itemprice"    => $item->model->price,
                "itemquantity" => $item->qty,
            ];
        })->values()->toJson();

        $order = [
            "app_id" => env('ZALO_APP_ID'),
            "app_time" => round(microtime(true) * 1000),
            "app_trans_id" => date("ymd") . "_" . $transID,
            "app_user" => "user123",
            "item" => $items,
            "embed_data" => $embeddata,
            "amount" => Cart::instance('default')->total(),
            "description" => "M4U - Payment for the order #$transID",
            "bank_code" => "zalopayapp"
        ];

        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"] . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
        $order["mac"] = hash_hmac("sha256", $data, env('ZALO_KEY1'));

        $context = stream_context_create([
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($order)
            ]
        ]);

        $resp = file_get_contents(env('ZALO_ENDPOINT_CREATE'), false, $context);
        $result = json_decode($resp, true);

        $this->insertIntoOrdersTable($request, null, $order['app_trans_id']);
        $this->handleOrderCompletion($request);

        if (isset($result['order_url'])) {
            echo '<script>window.open("' . $result['order_url'] . '", "_blank");</script>';
        }
    }

    public function handleStripePayment($request)
    {

        $lineItems = [];
        $items = Cart::instance('default')->content()->map(function ($item) {
            return [
                "itemid"       => $item->model->slug,
                "itemname"     => $item->model->name,
                "itemprice"    => $item->model->price,
                "itemquantity" => $item->qty,
            ];
        })->values();

        foreach ($items as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'vnd',
                    'product_data' => [
                        'name' => $item['itemname'],
                    ],
                    'unit_amount' => $item['itemprice'] * 100,
                ],
                'quantity' => $item['itemquantity'],
            ];
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url'  => route('checkout.cancel'),
        ]);
        echo '<script>window.open("' . $session->url . '", "_blank");</script>';
        $this->insertIntoOrdersTable($request, null, $session->id);
        $this->handleOrderCompletion($request);
        return redirect($session->url);
    }

    public function handleOrderCompletion($request)
    {
        $this->decreaseQuantities();
        Cart::instance('default')->destroy();
        session()->forget('coupon');
        return redirect()->route('welcome')->with('success', 'Your order is completed successfully!');
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['code'] ?? null;
        $newSubtotal = Cart::instance('default')->subtotal() - $discount;
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;
        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'code' => $code,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal
        ]);
    }

    private function insertIntoOrdersTable($request, $error, $transID)
    {
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postal_code,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name,
            'billing_discount' => $this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_tax' => $this->getNumbers()->get('newTax'),
            'billing_total' => $this->getNumbers()->get('newTotal'),
            'payment_gateway' => $request->payment_method,
            'trans_id' => $transID,
            'shipped' => 0,
            'error' => $error
        ]);

        foreach (Cart::instance('default')->content() as $item) {
            OrderProduct::create([
                'product_id' => $item->model->id,
                'order_id' => $order->id,
                'quantity' => $item->qty
            ]);
        }
        return $order;
    }

    private function decreaseQuantities()
    {
        foreach (Cart::instance('default')->content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    private function productsAreNoLongerAvailable()
    {
        foreach (Cart::instance('default')->content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }
        return false;
    }

    public function success(Request $request)
    {
        return view('success');
    }

    public function cancel()
    {
        return "You have cancelled your order.";
    }
}
