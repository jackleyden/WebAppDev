<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Manufacturer;
use App\Comment;
use App\Image;
use App\Like;
use App\Follower;

use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
             $this->middleware('admin' || 'user');
    }
    
    public function index()
    {
            $products = Product::paginate(5);
            $comments = Comment::all();

            return view('products.index')->with('products',$products)->with('comments',$comments);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create')->with('mans', Manufacturer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'desc' => 'required|max:255',
            'manufacturer' => 'exists:manufacturers,id'
            ]);
            
        $product = new Product();
        $product -> name = $request->name;
        $product -> price = $request->price;
        $product -> desc = $request->desc;
        $product -> manufacturer_id = $request->manufacturer;
        $product->save();
        return redirect("/product/$product->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $order = 'product_id')
    {
        $product = Product::find($id);
        $comments = Comment::where('product_id','=',$id)->orderBy($order, 'desc')->paginate(5);
        $images = Image::where('product_id','=',$id)->get();
        
        $checkLike = Like::all();
        
        $likes = Like::where('status','=','like')->get();
        $dislikes = Like::where('status','=','dislike')->get();
        
        $follow = Follower::all();
        
        return view('products.show')->with('product', $product)->with('comments', $comments)->with('images', $images)->with('likes', $likes)->with('dislikes', $dislikes)->with('checkLike', $checkLike)->with('follows', $follow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            if(auth()->user()->type == ('admin'))
            {
            $product = Product::find($id);
            return view('products.edit')->with('product', $product)->with('mans', Manufacturer::all());
            } else { return redirect("/product/$id");}
        } catch (\Exception $e) {
            return redirect("/product/$id");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'price' => 'numeric|min:1',
            'desc' => 'required|max:255', 
            'manufacturer' => 'exists:manufacturers,id'
            ]);
            
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->manufacturer_id = $request->manufacturer;
        $product->save();
        return redirect("/product/$product->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            if(auth()->user()->type == ('admin'))
            {
                $counter = Comment::where('product_id', '=', $id)->count();
                
                while ($counter > 0 )
                {
                    $c = Comment::where('product_id', '=', $id)->first()->id;
                    $c =  Comment::find($c);
                    
                    $c->delete();
                    $counter -=1;
                }
                
                $product = Product::find($id);
                $product->delete();
               
                return redirect("/product");
            } else { return redirect("/product/$id");}
        } catch (\Exception $e) {
            return redirect("/product/$id");
        }
    }
}
