<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth;
use Illuminate\Support\Facades\Hash;
use App\Order;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userOrders = Order::where('user_id', $user->id)->with('orderProducts.product.category')->get();

        $products = collect();
        foreach ($userOrders as $order) {
            $orderProducts = $order->orderProducts;
            $products = $products->merge($orderProducts->pluck('product'));
        }

        return view('profile')->with(
            [
                'user' => $user,
                'userOrders' => $userOrders, 
                'products' => $products,
            ]
        );
    }


    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Thông tin profile đã được cập nhật thành công!');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Mật khẩu cũ không chính xác.');
                    }
                },
            ],
            'new_password' => 'required|string|min:8|different:current_password|confirmed',
            'new_password_confirmation' => 'required|string',
        ]);

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Mật khẩu đã được đổi thành công!');
    }
}
