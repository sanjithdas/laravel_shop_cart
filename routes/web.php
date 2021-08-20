<?php

//use Newsletter;
use App\Http\Controllers\Blog\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Newsletter subscriptions.



Route::get('/', function(){
    return view('index');
});
Route::get('/blog', 'WelcomeController@index')->name('welcome');
Route::get('blog/post/{post}',[PostsController::class, 'show'])->name('post.show');
Route::get('blog/categories/{category}',[PostsController::class,'category'])->name('post.category');
Route::get('blog/tags/{tag}',[PostsController::class,'tag'])->name('post.tag');

Route::post('news/subscribe', function(){
    $email = request('email');
   // return $email;
    Newsletter::subscribe($email);
    request()->session()->flash('subscribed', 'Successfully subscribed');
    return redirect()->back();
});


// Front end - user part
Route::prefix('shops')->group(function(){
    Route::get('/', 'ShopsController@index')->name('shop.index');
    Route::get('/show/{shop}','ShopsController@show')->name('product.show');
    Route::post('/cart/add','ShoppingCartController@add_to_cart')->name('cart.add');
    Route::get('/cart','ShoppingCartController@cart')->name('cart');
    Route::get('/cart/delete/{id}','ShoppingCartController@cart_delete')->name('cart.delete');
    Route::get('/cart/incr/{id}/{qty}','ShoppingCartController@cart_increment')->name('cart.incr');
    Route::get('/cart/decr/{id}/{qty}','ShoppingCartController@cart_decrease')->name('cart.reduce');
    Route::get('/cart/rapid/add/{id}','ShoppingCartController@rapid_add')->name('rapid.add');
    Route::get('/cart/checkout','ShoppingCartController@checkout')->name('checkout');
    Route::post('/cart/checkout','ShoppingCartController@pay')->name('cart.checkout');
});


Route::prefix('/admin')->middleware(['auth','admin'])->group(function(){
    Route::get('/products','ProductsController@index')->name('products.index');
    Route::get('/create','ProductsController@create')->name('products.create');
    Route::post('/store','ProductsController@store')->name('products.store');
    Route::get('/edit/{shop}','ProductsController@edit')->name('product.edit');
    Route::post('/update/{shop}','ProductsController@update')->name('product.update');
});



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('categories', 'CategoriesController')->middleware('auth');
// Route::resource('posts', 'PostsController')->middleware('auth');
// Route::get('trashed-post','PostsController@trashed')->name('trashed-posts.index');
// Route::put('restore-post/{post}','PostsController@restore')->name('posts.restore');

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::resource('posts', 'PostsController');
    Route::get('trashed-post','PostsController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}','PostsController@restore')->name('posts.restore');
});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('users','UsersController@index')->name('users.index');
    Route::get('users/create','UsersController@create')->name('users.create');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile-update' ,'UsersController@update')->name('users.update-profile');
});
