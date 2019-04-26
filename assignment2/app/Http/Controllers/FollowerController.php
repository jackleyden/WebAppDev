<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\Comment;
use App\Product;

class FollowerController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $follow = Follower::where('following', '=', $request->following);
        $follow = $follow->where('follower', '=', auth()->user()->email)->first();
        
        if ($follow == null){
            $this->validate($request, [
            'following' => 'required',
            ]);
            
        $follow = new Follower();
        $follow -> follower = auth()->user()->email;
        $follow -> following = $request->following;
        $follow->save();
        }
        
        $follows = auth()->user()->email;
        return redirect("/follow/$follows");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $follower = Follower::where('follower', '=', $id)->get();
        
        $comments = Comment::all();
        
        $product = Product::all();
        
        return view('followers.show')->with('user',$id)->with('follower',$follower)->with('comments', $comments)->with('products', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Follower::where('following', '=', $id);
        $comment = $comment->where('follower', '=', auth()->user()->email);
        $comment->delete();
        
        $link = auth()->user()->email;
        return redirect("/follow/$link");
    }
}
