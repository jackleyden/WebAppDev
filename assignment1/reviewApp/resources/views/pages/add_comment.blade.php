@extends('layouts.master')

@section('title')
  Add Rateing
@endsection

@section('content')
  <div class = "formstyle">
    <h1> Add Review: </h1>
    <form method="post" action="/add_comment_action">
        {{csrf_field()}}
        <p>
          <label> Name: </label>
          <input type="text" name = "name">
          <input type="hidden" name = "itemid" value = {{$id}}>
        </p>
        <p>
          <label> Rate: </label>
          <input type="text" name = "rate">
        </p>
        <p>
          <label>Comment: </label>
          <textarea name = "comment"></textarea>
        </p>
        <input type="submit" value = "Add Item">
    </form>
  
    <h1> Add New User: </h1> 
    <form method="post" action="/add_user">
      {{csrf_field()}}
      <p>
        <label> Name: </label>
        <input type="text" name = "Uname">
      </p>
      <input type="submit" value = "Add User">
    </form>
  </div>
@endsection
