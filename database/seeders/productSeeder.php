<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products= collect([
            [
                'name'=>'Galaxy S23 FE',
                'description'=>'a portable device that allows users to make and receive calls, send text messages, and access the internet',
                'price'=> 29999,
                'quantity'=> 10
            ],
            [
                'name'=>'Vivo T3X 5G',
                'description'=>'a portable device that allows users to make and receive calls, send text messages, and access the internet',
                'price'=> 11249,
                'quantity'=> 8
            ],
            [
                'name'=>'realme 12X 5G',
                'description'=>'a portable device that allows users to make and receive calls, send text messages, and access the internet',
                'price'=> 12499,
                'quantity'=> 12
            ],
            [
                'name'=>'OPPO K12X 5G',
                'description'=>'a portable device that allows users to make and receive calls, send text messages, and access the internet',
                'price'=> 11844,
                'quantity'=> 10
            ],
            [
                'name'=>'moto g64 5G',
                'description'=>'a portable device that allows users to make and receive calls, send text messages, and access the internet',
                'price'=> 13999,
                'quantity'=> 10
            ]
        ]);
        $products->each(function($product){
            product::insert($product);
        });
        // product::create([

        // ]);
    }
}
