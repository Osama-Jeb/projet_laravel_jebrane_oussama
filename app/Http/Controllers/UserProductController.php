<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class UserProductController extends Controller
{

    public function index()
    {
        $userProducts = UserProduct::all();
        $subtotal = 0;
        foreach ($userProducts as $key => $item) {
            $subtotal += $item->quantity * $item->product->price;
        }
        return view("frontend.pages.cart", compact("userProducts", "subtotal"));
    }

    public function store(Product $product)
    {
        $user = auth()->user();
        $exist = UserProduct::where("user_id", $user->id)->where("product_id", $product->id)->first();
        if ($exist) {
            $exist->quantity += 1;
            $exist->save();
            Toastr()->success("Increased Item Quantity!");
        } else {
            UserProduct::create([
                "user_id" => $user->id,
                "product_id" => $product->id,
                "quantity" => 1,
            ]);
            Toastr()->success("Added Successfully to Basket!");
        }

        return redirect()->back();
    }

    public function decrease(Product $product)
    {
        $user = auth()->user();
        $prod = UserProduct::where("user_id", $user->id)->where("product_id", $product->id)->first();
        $prod->quantity -= 1;
        if ($prod->quantity == 0) {
            $prod->delete();
            Toastr()->error("Product Removed From Basket!!", "Deleted");
        } else {
            $prod->save();
            Toastr()->warning("Product Quantity Decreased!!");
        }

        return redirect()->back();
        
    }
}
