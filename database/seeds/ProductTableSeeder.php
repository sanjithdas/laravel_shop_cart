<?php

use App\Shop;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shop1 = Shop::create([
            'name' => 'Apple EarPods',
            'price' => 160,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3,
            
        ]);
        $shop2 = Shop::create([
            'name' => 'Beats On-Ear Headphones',
            'price' => 299,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3
        ]);
        $shop3 = Shop::create([
            'name' => 'Sony PlayStation 4',
            'price' => 224,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3
        ]);
        $shop4 = Shop::create([
            'name' => 'Hanging Speaker',
            'price' => 179,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3
        ]);
        $shop5 = Shop::create([
            'name' => 'Beats On-Ear Headphones — Black',
            'price' => 189,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3
        ]);
        $shop6 = Shop::create([
            'name' => 'Shiny Shoe',
            'price' => 128,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3
        ]);
        $shop7 = Shop::create([
            'name' => 'PS4 DualShock Controller',
            'price' => 152,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3
        ]);
        $shop8 = Shop::create([
            'name' => 'Antique Camera K145',
            'price' => 677,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3
        ]);
        $shop9 = Shop::create([
            'name' => 'Apple Mouse',
            'price' => 99,
            'quantity_in_stock' => 50,
            'quantity_in_order' =>3
        ]);
    }
}
