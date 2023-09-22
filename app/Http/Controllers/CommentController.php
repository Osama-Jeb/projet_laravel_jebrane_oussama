<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $user = auth()->user();
        $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
            "phone" => ["required"],
            "message" => ["required"],
        ]);

        Comment::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
            "user_id" => $user->id,
            "product_id" => $product->id,
        ]);

        Toastr()->success("Comment Added");
        return redirect()->route("product.show", [$product]);
    }
}
