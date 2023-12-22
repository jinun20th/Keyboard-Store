<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class WelcomePageController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->take(4)->get();
        $switches = Product::where('category_id', 1)->take(4)->get();
        $keyboards = Product::where('category_id', 2)->take(4)->get();
        // dd($products, $switches, $keyboards);
        return view('welcome')->with([
            'products'=> $products,
            'switches' => $switches,
            'keyboards' => $keyboards
        ]);
    }
}