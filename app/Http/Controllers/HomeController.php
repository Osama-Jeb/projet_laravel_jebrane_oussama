<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("frontend.pages.home", compact("products"));
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
