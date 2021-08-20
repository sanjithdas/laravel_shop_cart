<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function index(){

        return view('shop.index')->with('products',Shop::paginate(9));
    }

    public function show(Shop $shop)
    {
        return view('shop.show')->with('product',$shop);
    }

}
