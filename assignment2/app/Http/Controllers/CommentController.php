<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Manufacturer;
use App\Comment;

use Auth;

class CommentController extends Controller
{
    
     public function __construct()
    {
             $this->middleware('admin' || 'user');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try{
            if(auth()->user()->type == ('admin') || auth()->user()->type == ('user'))
            {
                $check = Comment::where('email', '=', auth()->user()->email)->where('product_id','=', $id)->first() == null;
                if ($check){
                    return view('comments.create')->with('PID', $id);
                }
            } else { return redirect("/product/$id");}
        } catch (\Exception $e) {
            return redirect("/product/$id");
        }
        return redirect("/product/$id");
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
            'comment' => 'required|max:255',
            'rating' => 'numeric|min:1|max:5',
            ]);
            
        $comment = new Comment();
        $comment -> name = auth()->user()->Fullname;
        $comment -> comment = $request->comment;
        $comment -> product_id = $request->product_id;
        $comment -> email = auth()->user()->email;
        $comment -> rating = $request->rating;
        $comment->save();
        return redirect("/product/$comment->product_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        try{
            if(auth()->user()->email == $comment->email || auth()->user()->type == ('admin'))
            {
            return view('comments.edit')->with('comment', $comment);
            } else { return redirect("/product/$comment->product_id");}
        } catch (\Exception $e) {
            return redirect("/product/$comment->product_id");
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
            'comment' => 'required|max:255',
            'rating' => 'numeric|min:1|max:5',
            ]);
            
            $comment = Comment::find($id);
            $comment->comment = $request->comment;
            $comment -> rating = $request->rating;
            $comment->save();
            return redirect("/product/$comment->product_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $comment = Comment::find($id);
        try{
            if(auth()->user()->email == $comment->email || auth()->user()->type == ('admin'))
            {    
                $comment = Comment::find($id);
                $comment->delete();
                return redirect("/product/$comment->product_id");
            } else { return redirect("/product/$comment->product_id");}
        } catch (\Exception $e) {
            return redirect("/product/$comment->product_id");
        }
    }
}
