<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                "itemName" => "Zoom Freak 2",
                "itemPrice" => 1799999,
                "itemImage" => "assets/shoe/shoe1.jpg",
                "itemDescription" => "Basketball Shoe | 3 Colours"
            ],
            [
                "itemName" => "Nike Air Force 1 NDESTRUKT",
                "itemPrice" => 2279000,
                "itemImage" => "assets/shoe/shoe2.jpg",
                "itemDescription" => "Men's Shoe | 1 Colours"
            ],
            [
                "itemName" => "Nike Air Max Zephyr",
                "itemPrice" => 2889000,
                "itemImage" => "assets/shoe/shoe3.jpg",
                "itemDescription" => "Men's Shoe | 2 Colours"
            ],
            [
                "itemName" => "Jordan Delta",
                "itemPrice" => 2099000,
                "itemImage" => "assets/shoe/shoe4.jpg",
                "itemDescription" => "Men's Shoe | 1 Colours"
            ],
            [
                "itemName" => "Air Jordan XXXVPF",
                "itemPrice" => 2599000,
                "itemImage" => "assets/shoe/shoe5.jpg",
                "itemDescription" => "Basketball Shoe | 1 Colours"
            ],
            [
                "itemName" => "LeBron 18 'Los Angeles By Night'",
                "itemPrice" => 2999000,
                "itemImage" => "assets/shoe/shoe6.jpg",
                "itemDescription" => "Basketball Shoe | 3 Colours"
            ],
        ]);
    }
}
