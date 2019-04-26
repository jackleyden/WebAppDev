@extends('layouts.master')

@section('title')
  Update Comment
@endsection

@section('content')
  <div class = "formstyle">
    <h1> Update Comment</h1>
    <form method="post" action="/update_comment_action">
        {{csrf_field()}}
        <p>
          <label> Name: </label>
          <input type="hidden" name = "itemid" value = "{{$comment->itemid}}">
          <input type="hidden" name = "id" value = "{{$comment->id}}">
          <input type="text" name = "name" value = "{{$comment->name}}">
        </p>
        <p>
          <label> Rating (out of 5): </label>
          <input type="text" name = "rate" value = "{{$comment->rate}}">
        </p>
        <p>
          <label> Comment: </label>
          <textarea name = "comment">{{$comment->comment}}</textarea>
        </p>
        <input type="submit" value = "update Comment">
    </form>
  </div>
@endsection

