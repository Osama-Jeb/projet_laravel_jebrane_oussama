<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                "name" => "chair1",
                "desc" => "wow what a chair lol",
                "stock" => 10,
                "price" => 149,
                "image" => "product_1.png",
                "category" => "chair",
                "user_id" => 1,
            ],
            [
                "name" => "chair2",
                "desc" => "wow what a chair lol",
                "stock" => 20,
                "price" => 249,
                "image" => "product_2.png",
                "category" => "chair",
                "user_id" => 1,
            ],
            [
                "name" => "chair3",
                "desc" => "wow what a chair lol",
                "stock" => 30,
                "price" => 349,
                "image" => "product_3.png",
                "category" => "chair",
                "user_id" => 1,
            ],
            [
                "name" => "chair4",
                "desc" => "wow what a chair lol",
                "stock" => 40,
                "price" => 449,
                "image" => "product_4.png",
                "category" => "chair",
                "user_id" => 1,
            ],
            [
                "name" => "chair5",
                "desc" => "wow what a chair lol",
                "stock" => 50,
                "price" => 549,
                "image" => "product_5.png",
                "category" => "chair",
                "user_id" => 1,
            ],
        ]);
    }
}
