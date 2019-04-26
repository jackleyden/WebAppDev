@extends('layouts.master')

@section('title')
  Products Index
@endsection

@section('content')

      <h1>Create</h1>
      <form method="POST" action = "/product/{{$product->id}}">
          {{csrf_field()}}
          {{ method_field('PUT')}}
          <p><label>Name: </label><input type="text" name="name" value = "{{$product->name}}"></p>
          <p><label>Price: </label><input type="text" name="price" value = "{{$product->price}}"></p>
          <p> <select name = "manufacturer">
              @foreach ($mans as $man)
                @if ($man->id == $product->manufacturer_id)
                  <option value="{{$man->id}}" selected = "selected">{{$man->name}}</option>
                @else
                  <option value="{{$man->id}}">{{$man->name}}</option>
                @endif
              @endforeach
          </select></p>
          <input type="submit" value="Update">
      </form>
   
@endsection

