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
use App\Comment;
use App\Like;
use App\Follower;

Route::get('comment/create/{id}','CommentController@create');
Route::get('product/orderby/{id}/{order}','ProductController@show');

Route::resource('product', 'ProductController');
Route::resource('comment', 'CommentController');
Route::resource('image','ImageController');
Route::resource('follow','FollowerController');

Route::get('/', function () {
    //return view('welcome');
    return redirect('/product');
});

Route::get('/like/{id}/{cid}', function ($id,$cid) {
    
    $check = Like::where('comment_id','=', $cid)->get();
    
    if($check->where('user_id','=',auth()->user()->email)->first() == null){
        $like = new Like();
        $like -> user_id = auth()->user()->email;
        $like -> status = "like";
        $like -> comment_id = $cid;
        $like->save();
    }
    return redirect("/product/$id");
});

Route::get('/dislike/{id}/{cid}', function ($id,$cid) {
    $check = Like::where('comment_id','=', $cid)->get();
    
    if(auth()->user()->type == ('admin') || auth()->user()->type == ('user')){
        if($check->where('user_id','=',auth()->user()->email)->first() == null){
           $like = new Like();
            $like -> user_id = auth()->user()->email;
            $like -> status = "dislike";
            $like -> comment_id = $cid;
            $like->save();
        }
    }
    return redirect("/product/$id");
});

Route::get('/recommend', function () {
    try{
        if(auth()->user()->type == ('admin') || auth()->user()->type == ('user')){
            $follower = Follower::where('follower','=', auth()->user()->email)->get();
            $comments = Comment::all();
            $products = Product::orderBy('id', 'desc')->get();
        
            return view('recommend')->with('follower', $follower)->with('comments', $comments)->with('products',$products)->with('i', 0);
        }
    } catch(Exception $e){
        return redirect('/');
    }
});

Route::get('/docs', function () {
    //return view('welcome');
    return view('docs');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
