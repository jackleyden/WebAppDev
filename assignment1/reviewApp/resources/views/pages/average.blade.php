@extends('layouts.master')

@section('title')
  Average
@endsection

@section('content')
<div class= "row" id="content">
    <p><a href="{{url("add_item")}}">Add Items</a></p>
    <h1> Telescope accessories:</h1>
    <div class="col-md-12">
      <!-- building list of items -->
      @if ($comments) 
        @foreach($comments as $comm)
          <div class="col-md-12" style="background-color:black;">
            <img src = "{{$comm->image}}" width = 100, height = 100>
            <a href = "/item_detail/{{$comm->id}}">{{$comm->summary}}</a>
            </br>
            <p align= "right"> 
            Average Rating: {{$comm -> avgComments}}
            </p>
          </div>
                  
        @endforeach
        
        @foreach($nulledcomments as $comm)
          <div class="col-md-12" style="background-color:black;">
            <img src = "{{$comm->image}}" width = 100, height = 100>
            <a href = "/item_detail/{{$comm->id}}">{{$comm->summary}}</a>
            </br>
            <p align= "right"> 
              Average Rating: 0
            </p>
          </div>
                  
        @endforeach
      @else
          no data found
      @endif
    </div>
</div>
@endsection