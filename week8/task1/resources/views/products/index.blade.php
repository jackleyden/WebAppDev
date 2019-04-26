@extends('layouts.master')

@section('title')
  Products Index
@endsection

@section('content')
   <ul>
       @foreach ($products as $product)
       <a href = "/product/{{$product->id}}"><li>{{$product->name}}</li></a>
       @endforeach
       
       <p> <a href="/product/create">Create</a></p>
   </ul>
@endsection

