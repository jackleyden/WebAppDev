@extends('layouts.master')

@section('title')
  Products Index
@endsection

@section('content')

       <h1> {{$product->name}}</h1>
       <p> {{$product->manufacturer->name}}</p>
       <p> <a href="/product/{{$product->id}}/edit">Edit</a></p>
       

<form method = "post" action "/product/{{$product->id}}">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <input type="submit" value="Delete">
</form>

@endsection

