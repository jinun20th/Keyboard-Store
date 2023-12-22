<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($orderId)
    {
        $order = Order::with('orderProducts.product.category')->find($orderId);
        return view('order', ['order' => $order]);
    }
    
    
}