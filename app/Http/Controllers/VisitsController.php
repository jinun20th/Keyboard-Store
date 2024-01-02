<?php

namespace App\Http\Controllers;

use App\CountryVisit;
use App\Order;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $revenueData = Order::selectRaw('DATE(created_at) as date, SUM(billing_total) as total')
            ->groupBy('date')
            ->get();
        return view('admin.visits')->with([
            'revenueData' => $revenueData,
            'orders' => $orders,
        ]);
    }
}
