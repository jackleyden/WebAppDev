@extends('layouts.app')

@section('title')
  Followers
@endsection

@section('content')
    <div id="content">
      <h2>Latest:</h2>
       <div class="col-md-12" style="background-color:black;">
         <?php $count = 0; ?>
        @foreach($products as $product)
          <?php if($count == 3) {break;} ?>
          <div class="col-md-4" style="background-color:grey;">
              <a href="product/{{$product->id}}">{{$product->name}}</a>
          </div>
          <?php $count++; ?>
        @endforeach
        </div>

      
      <h2>Recommendations:</h2>
       <div class="col-md-12" style="background-color:black;">
          @foreach ($follower as $follow)
              @foreach ($comments->where('email', '=', $follow->following)->where('rating','>=', 3) as $comment)
                <div class="col-md-4" style="background-color:grey;">
                  <a href="/product/{{$products->where('id', '=', $comment->product_id)->first()->id}}"><li>Product: {{$products->where('id', '=', $comment->product_id)->first()->name}}, Comment: {{$comment->comment}}, Rating: {{$comment->rating}}</li></a>
                </div>
              @endforeach
          @endforeach
        </div>
        
      <br>
      <br>
      
      <h2>You may also like:</h2>
      <div class="col-md-12" style="background-color:black;">
      @foreach ($follower as $follow)
          @foreach ($comments->where('email', '=', $follow->following)->where('rating','>=', 3) as $comment)
            @foreach ($comments->where('product_id', '=', $comment->product_id)->where('rating','>=', 3)->where('email', '!=', $follow->following) as $prodfind)
              <p>
              @if ($follower->where('following', '=', $prodfind->email)->where('follower', '=', auth()->user()->email)->first() == null)
                   <div class="col-md-4" style="background-color:grey;">
                  {{$prodfind->name}}: 
                  <form method="POST" action = "/follow">
                        {{csrf_field()}}
                        <input type="hidden" name="following" value="{{$follow->following}}">
                        <input type="submit" value="Follow">
                  </form>
                  </div>
              @endif
              </p>
            @endforeach
          @endforeach
      @endforeach
      </div>
    </div>
@endsection

