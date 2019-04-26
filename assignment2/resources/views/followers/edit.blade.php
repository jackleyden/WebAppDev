@extends('layouts.app')

@section('title')
  Products Index
@endsection

@section('content')

      <h1>Edit</h1>
      
      <form method="POST" action = "/comment/{{$comment->id}}">
          {{csrf_field()}}
          {{ method_field('PUT')}}
          <p><label>Comment: </label><input type="text" name="comment" value = "{{ old('comment', $comment->comment)}}"></p>
            @if ($errors->first('comment'))
              <div class="alert">
                <ul>
                    <li>{{$errors->first('comment')}}</li>
                </ul>
              </div>
            @endif
            
            <p><label>rating: </label><input type="text" name="rating" value = "{{ old('rating', $comment->rating)}}"></p>
            @if ($errors->first('rating'))
              <div class="alert">
                <ul>
                    <li>{{$errors->first('rating')}}</li>
                </ul>
              </div>
            @endif
            
            
          </select></p>
          <input type="submit" value="Update">
      </form>
@endsection

