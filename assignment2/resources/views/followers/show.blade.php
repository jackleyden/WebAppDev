@extends('layouts.app')

@section('title')
  Followers
@endsection

@section('content')
    <div id="content">
      <h2>Following:</h2>
      @foreach ($follower as $follow)
          <p>{{$follow->following}}</p>
          <ul>
          @foreach ($comments->where('email', '=', $follow->following) as $comment)

            <a href="/product/{{$products->where('id', '=', $comment->product_id)->first()->id}}"><li>Product: {{$products->where('id', '=', $comment->product_id)->first()->name}}, Comment: {{$comment->comment}}, Rating: {{$comment->rating}}</li></a>
          @endforeach
          </ul>
          
              @if ($follower->where('following', '=', $follow->following)->where('follower', '=', auth()->user()->email)->first() == null)
                  <form method="POST" action = "/follow">
                        {{csrf_field()}}
                        <input type="hidden" name="following" value="{{$follow->following}}">
                        <input type="submit" value="Follow">
                  </form>
              @else
                  <form method = "post" action = "/follow/{{$follow->following}}">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <input type="submit" value="Unfollow">
                  </form>
              @endif
              
      @endforeach

    </div>
@endsection

