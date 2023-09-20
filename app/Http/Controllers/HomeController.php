<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("frontend.pages.home");
    }

    public function category()
    {
        return view("frontend.pages.category");
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
