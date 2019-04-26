@extends('layouts.master')

@section('title')
  Item Details
@endsection

@section('content')
    <ul id="editFeature">
        <li><a href="{{url("delete_item/$item->id")}}">Delete Items</a></li>
        <li><a href="{{url("update_item/$item->id")}}">update Items</a></li>
    </ul>
   <h1>{{$item -> summary}}</h1>
   <h3>Made by: {{$manufacturer[0] -> name}}</h3>

    <div class="col-md-12">
        <div class="col-md-6">
            {{$item -> details}}
        </div>
        <div class="col-md-6">
           <img src="{{url("$item->image")}}" width= "50%", height= "50%">
        </div>
    </div>
    <!-- list all comments -->
    <h2>Comments:</h2>
    <div class="col-md-12">
        @if ($comments)
            @foreach($comments as $comment)
                <div class="col-md-8" style="background-color:#2e0047;">
                    <p>Comment:{{$comment -> comment}}</p>
                    <a href="{{url("update_comment/$comment->id")}}">Edit</a>
                    <a href="{{url("delete_comment/$comment->id/$item->id")}}">Delete</a>
                </div>
                
                <div class="col-md-4" style = "background-color:#8a1bc6;">
                    <p>Name: {{$comment -> name}}</p>
                    <p>Rate (out of 5): {{$comment -> rate}}</p>
                </div>
            @endforeach
        @else
            <p>Be the first to rank this item.</p>
        @endif
        <a href="{{url("add_comment/$item->id")}}">add review</a>
    </div>
   
@endsection

