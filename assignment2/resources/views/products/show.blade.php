@extends('layouts.app')

@section('title')
  Products Index
@endsection

@section('content')
    <div id="content">
       <h1> {{$product->name}}</h1>
       <p> {{$product->manufacturer->name}}</p>
       <p> $ {{$product->price}}</p>
       
       <p style = "background-color:white; color:black;"> {{$product->desc}}</p>
       
        <?php try {?>
        @if(auth()->user()->type == ('admin'))
           <p> <a href="/product/{{$product->id}}/edit">Edit</a></p>
          
            <form method = "post" action = "/product/{{$product->id}}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input type="submit" value="Delete">
            </form>
        @endif
        <?php } catch (Exception $e) { }?>

        </br>
        </br>
        <div class="col-md-12" style="background-color:black;">
            @foreach($images as $image)
                <div class="col-md-4">
                    <img src = "{{URL("$image->image")}}" width="100%">
                    <p>Uploaded BY: {{$image->name}}</p>
                </div>
            @endforeach
        </div>
        <br>
        
         <?php try {?>
            @if(auth()->user()->type == ('admin') || auth()->user()->type == ('user'))
                <form method="POST" action="/image" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="name" value={{auth()->user()->Fullname}}>
                    <input type="hidden" name="product_id" value={{$product->id}}>
                    <p><input type="file" name="image"></p>
                    <input type="submit" value="Upload">
                </form>
             @endif
        <?php } catch (Exception $e) { }?>
        <br>
        <?php try {?>
            @if(auth()->user()->type == ('admin') || auth()->user()->type == ('user'))
                @if ($comments->where('email', '=', auth()->user()->email)->first() == null)
                    <p><a href="/comment/create/{{$product->id}}">Create Comment</a></p>
                @endif
            @endif
        <?php } catch (Exception $e) { }?>
        
        <a href="/product/orderby/{{$product->id}}/updated_at">By Date</a> 
        <a href="/product/orderby/{{$product->id}}/rating">Highest Rating</a>
        
        @foreach($comments as $comment)
            
             <div class="col-md-12" style="background-color:black;">
                  <div class="col-md-8" style="background-color:red;">
                    <p>Comment: {{$comment->comment}}</p>
                    
                     <?php try {?>
                        @if(auth()->user()->type == ('admin') || auth()->user()->email == ($comment->email))
                            <a href="/comment/{{$comment->id}}/edit">Edit</a>
                            
                             <form method = "post" action = "/comment/{{$comment->id}}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Delete">
                            </form>
                        @endif
                    <?php } catch (Exception $e) { }?>
                    
                    </div>
                    @if (($dislikes->where('comment_id','=',$comment->id)->count()) > ($likes->where('comment_id','=',$comment->id)->count()))
                     <div class="col-md-4" style="background-color:white; color:black;">
                    @else
                    <div class="col-md-4" style="background-color:black;">
                    @endif
                    <p>User: {{$comment->name}}</p>
                    <p>Rating: {{$comment->rating}}</p>
                    <p>Last edited: {{$comment->updated_at}}</p>
                    <p>Likes: {{$likes->where('comment_id','=',$comment->id)->count()}}, Dislikes: {{$dislikes->where('comment_id','=',$comment->id)->count()}}</p>
                    
                     <?php try {?>
                    @if(auth()->user()->type == ('admin') || auth()->user()->type == ('user'))
                        @if ($checkLike->where('comment_id','=', $comment->id)->where('user_id','=',auth()->user()->email)->first() == null)
                            @if (($dislikes->where('comment_id','=',$comment->id)->count()) > ($likes->where('comment_id','=',$comment->id)->count()))
                                <a href="/like/{{$comment->product_id}}/{{$comment->id}}" style="color:black;">Like</a>
                                <a href="/dislike/{{$comment->product_id}}/{{$comment->id}}" style="color:black;">Dislike</a>
                            @else
                                <a href="/like/{{$comment->product_id}}/{{$comment->id}}" >Like</a>
                                <a href="/dislike/{{$comment->product_id}}/{{$comment->id}}">Dislike</a>
                            @endif
                        @endif
                        <br>
                        @guest
                        @else
                        
                            @if ($follows->where('following', '=', $comment->email)->where('follower', '=', auth()->user()->email)->first() == null)
                                <form method="POST" action = "/follow">
                                      {{csrf_field()}}
                                      <input type="hidden" name="following" value="{{$comment->email}}">
                                      <input type="submit" value="Follow">
                                </form>
                            @else
                                <form method = "post" action = "/follow/{{$comment->email}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="submit" value="Unfollow">
                                </form>
                            @endif
                        @endguest
                    @endif
                    <?php } catch (Exception $e) { }?>
                    </div>
                </div>
                
        @endforeach
        {{$comments->links()}}
    </div>
@endsection

