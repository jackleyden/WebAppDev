@extends('layouts.app')

@section('title')
  Products Index
@endsection

@section('content')

      <h1>Create</h1>
      @if (count($errors) > 0)
        <div class="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <form method="POST" action = "/comment">
          {{csrf_field()}}
          <p><label>Comment: </label><input type="text" name="comment" value="{{ old('comment')}}"></p>
          <p><label>Rating: </label><input type="text" name="rating" value="{{ old('rating')}}"></p>
          
          <input type="hidden" name="product_id" value="{{$PID}}">
          
          <input type="submit" value="Create">
      </form>
   
@endsection

