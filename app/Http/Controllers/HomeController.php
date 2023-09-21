<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $lastFourElements = $products->slice(-4);
        return view("frontend.pages.home", compact("products", "lastFourElements"));
    }

    public function contact()
    {
        return view("frontend.pages.contact");
    }

    public function signin()
    {
        return view("frontend.pages.signin");
    }

    public function cart()
    {
        return view("frontend.pages.cart");
    }
}
