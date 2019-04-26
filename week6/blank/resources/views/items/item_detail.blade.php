@extends('layouts.master')

@section('title')
  Item Details
@endsection

@section('content')

   <h1>{{$item -> summary}}</h1>
   
   {{$item -> details}}
   
   
   <p><a href="{{url("delete_item/$item->id")}}">Delete Items</a></p>
    <p><a href="{{url("update_item/$item->id")}}">update Items</a></p>
    <p><a href="/">Home</a></p>
@endsection

