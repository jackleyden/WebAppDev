@extends('layouts.master')

@section('title')
  Results
@endsection

@section('content')
  <div class= "row" id="content">
    <h1> Search:</h1>
    <div class="col-md-12">
      @if ($results)
        @foreach($results as $result)
          <div class="col-md-12" style="background-color:black;">
              <img src = "{{url("$result->image")}}" width = 100, height = 100>
              <a href = "/item_detail/{{$result->id}}">{{$result->summary}}</a>
              </br>
              <p align= "right"> Total Reviews:
                <?php 
                    $sql = "select * from item, comment where item.id = comment.itemid and item.id = ?;";
                    $items = DB::select($sql, array($result->id));
                    echo count($items);
                ?>
              </p>
          </div>
        @endforeach
      @else
        No Items Found
      @endif
    </div>
  </div>
@endsection