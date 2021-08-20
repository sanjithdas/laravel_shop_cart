<?php

namespace App\Http\Controllers;
use Cart;
use App\Shop;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use App\Mail\PurchaseSuccessfull;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function add_to_cart(Request $request){
        $pdt = Shop::find($request->prod_id);
        $options = ['description' => 'test'];
        //  id, name, quantity, price and weight of the product
        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => $request->qty,
            'price' =>$pdt->price,
            'weight' => 500
        ],$options);

        Cart::associate($cartItem->rowId, 'App\Shop');
       // dd($cart);
       Session::flash('success','Product added to the cart successfully');
        return redirect()->route('cart');
       // return  view('shop.cart')->with('cart',$cart);
    }

    public function cart(){
       // Cart::destroy();
        return view('shop.cart');
    }

    public function cart_delete($id){
        Cart::remove($id);
        Session::flash('success','Product removed successfully');
        return redirect()->back();
    }
    public function cart_increment($id, $qty){
        Cart::update($id, $qty+1);
        return redirect()->back();
    }
    public function cart_decrease($id, $qty){
        Cart::update($id, $qty-1);
        return redirect()->back();
    }
    public function rapid_add($id){
        $pdt = Shop::find($id);
        $options = ['user' => auth()->user()->name];
        //  id, name, quantity, price and weight of the product
        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' =>$pdt->price,
            'weight' => 500
        ],$options);

        Cart::associate($cartItem->rowId, 'App\Shop');
        Session::flash('success','Product added to the cart successfully');
       // dd($cart);
        return redirect()->route('cart');
    }
    public function checkout(){
        $cart = Cart::content();
       // dd($cart);
        return view('shop.checkout')->with('cart',$cart);
    }
    public function pay(){

        // dd(request()->all()) // returns the stripe token as well.
        Stripe::setApiKey('sk_test_9JxtRK5jQ2Bqz3EIsCsAduzE00AKF9IAoO');
        $token = request()->stripeToken;
        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'E-shop - products online',
            'source' => $token,
            'receipt_email' => 'sanjith.das@gmail.com',
        ]);
       Session::flash('purchased', 'Purchase successfull. wait for our email.');
       Mail::to(request()->stripeEmail)->send(new PurchaseSuccessfull(auth()->user()->name));
       Cart::destroy();
       return redirect('/shops');
    }
}
