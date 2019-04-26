<?php

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
use App\Product;
use App\Manufacturer;

Route::resource('product', 'ProductController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    /*$product = new Product;
    $product->name = 'ipod';
    $product->price = 3;
    $product-> manufacturer_id = 1;
    $product->save();
    $id = $product->id;
    dd($id);*/
    
    $product = Product::create(array('name'=> 'Station', 'price'=> 555, 'manufacturer_id' => 1));

    dd($product);
});

Route::get('/r', function () {
     $products = App\Manufacturer::find(1)->products;
     foreach ($products as $product){
         echo $product->name;
     }
     
     $mans = Product::find(1)->manufacturer;
     
     echo $mans -> name;
});

