@extends('layouts.app')

@section('title')
  Products Index
@endsection

@section('content')
    <div id="content">
       <h1> {{$product->name}}</h1>
       <p> {{$product->manufacturer->name}}</p>
       <p> $ {{$product->price}}</p>
       
      
           <p> <a href="/product/{{$product->id}}/edit">Edit</a></p>
          
            <form method = "post" action = "/product/{{$product->id}}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input type="submit" value="Delete">
            </form>

        </br>
        </br>
        @foreach($comments as $comment)
            
             <div class="col-md-12" style="background-color:black;">
                  <div class="col-md-8" style="background-color:red;">
                    <p>Comment: {{$comment->comment}}</p>
                    <a href="/comment/{{$comment->id}}/edit">Edit:</a>
                    </div>
                     <div class="col-md-4" style="background-color:blue;">
                    <p>User: {{$comment->name}}</p>
                    <p>Last edited: {{$comment->updated_at}}</p>
                    </div>
                </div>
        @endforeach
    </div>
@endsection

