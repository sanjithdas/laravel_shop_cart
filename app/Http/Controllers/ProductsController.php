<?php
/**
 * @author Sanjith
 *
 */
namespace App\Http\Controllers;
use App\Http\Requests\shop\UpdateProductRequest;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\shop\CreateProductsRequest;



class ProductsController extends Controller
{
   public function index(){
     //  dd('test');
    return view('shop.admin.products')->with('products',Shop::all());
   }
   public function create(){
       return view('shop.admin.create');
   }
   public function store(CreateProductsRequest $request){
    $image = $request->image->store('shop','public');
    if (isset($request->description)){
        $description = $request->description;
    }

    //create the post
    $post = Shop::create([
        'name' => $request->name,
        'price' => $request->price,
        'quantity_in_stock' => $request->quantity_in_stock,
        'quantity_in_order'   => $request->quantity_in_order,
        'description' => $description,
        'display_image' => $image
       ]);

    session()->flash('success','Product created successfully');
        return redirect(route('products.index'));
   }
   public function edit(Shop $shop){
       return view('shop.admin.create')->with('product',$shop);
   }
   public function update(Shop $shop, UpdateProductRequest $request){
       //update database record
       $shop->name=$request->name;
       $shop->price = $request->price;
       $shop->quantity_in_stock = $request->quantity_in_stock;
       $shop->description = $request->description;
       if ($request->hasFile('image')){
           $image = $request->image->store('shop','public');
           $shop->deleteImage();
           $shop->display_image = $image;
       }
       $shop->update();
       session()->flash('success','Product updated successfully');
       return redirect(route('products.index'));

   }


}
