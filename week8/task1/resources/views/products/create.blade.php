@extends('layouts.master')

@section('title')
  Products Index
@endsection

@section('content')

      <h1>Create</h1>
      <form method="POST" action = "/product">
          {{csrf_field()}}
          <p><label>Name: </label><input type="text" name="name"></p>
          <p><label>Price: </label><input type="text" name="price"></p>
          <p> <select name = "manufacturer">
              @foreach ($mans as $man)
                  <option value="{{$man->id}}">{{$man->name}}</option>
              @endforeach
          </select></p>
          <input type="submit" value="Create">
      </form>
   
@endsection

