<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yoeunes\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index()
    {
        $fullproducts = Product::all();
        $products = Product::paginate(8);
        return view("frontend.pages.category", compact("products", "fullproducts"));
    }

    public function admin()
    {
        $products = Product::all();
        $categories = Category::all();
        return view("backend.pages.products", compact("products", "categories"));
    }

    public function store(Request $request)
    {
        request()->validate([
            "name" => ["required"],
            "desc" => ["required"],
            "image" => ["required", "image", "mimes:png,jpg,svg,gif", "max:2048"],
            "stock" => ["required", "integer"],
            "price" => ["required", "integer"],
            "category" => ["required"],
        ]);

        $imgSrc = request()->file("image");
        $imgSrc->storePublicly("img/products/", "public");
        $imgName = $imgSrc->hashName();

        Product::create([
            "name" => $request->name,
            "desc" => $request->desc,
            "image" => $imgName,
            "stock" => $request->stock,
            "price" => $request->price,
            "category_id" => $request->category,
            "user_id" => auth()->user()->id,
        ]);

        Toastr()->success("Product Successfully Created!");

        return redirect()->back();
    }


    public function show(Product $product)
    {
        $shuffled = Product::all()->shuffle()->take(5);
        $user = Auth::user();
        return view("frontend.partials.product_show", compact("product", "shuffled", "user"));
    }

    public function update(Request $request, Product $product)
    {
        request()->validate([
            "name" => ["required"],
            "desc" => ["required"],
            "stock" => ["required", "integer"],
            "price" => ["required", "integer"],
        ]);

        $imgSrc = request()->file("image");
        if ($imgSrc) {

            request()->validate([
                "imgage " => ["required", "image", "mimes:png,jpg,jpeg,gif,svg", "max:2048"],
            ]);

            $imgSrc->storePublicly("img/products/", "public");
            $imgName = $imgSrc->hashName();
        }

        $product->update([
            "name" => $request->name,
            "desc" => $request->desc,
            "image" => $imgName ?? $product->image,
            "stock" => $request->stock,
            "price" => $request->price,
            "category_id" => $product->category_id ?? $request->category,
            "user_id" => auth()->user()->id,
        ]);

        Toastr()->success("Product Updated Successfully!!");
        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        if (strlen($product->image) >= 16) {
            Storage::disk("public")->delete('/img/products/' . $product->image);
        }
        $product->delete();
        Toastr()->error("Product Deleted", "Watchout");
        return redirect()->back();
    }
}
