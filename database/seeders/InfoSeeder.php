<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Info::insert([
            [
                "city" => "Buttonwood, California.",
                "adress" => "Rosemead, CA 91770",
                "phone" => "00 (440) 9865 562",
                "hours" => "Mon to Fri 9am to 6pm",
                "email" => "support@colorlib.com",
            ],
        ]);
    }
}
