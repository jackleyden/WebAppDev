@extends('layouts.master')

@section('title')
  index
@endsection

@section('content')
    <div class= "row" id="content">
        <p><a href="{{url("add_item")}}">Add Items</a></p>
        <h1> Telescope Accessories:</h1>
        <div class="col-md-12">
            @if ($comments)
              @foreach($comments as $comm)
                <div class="col-md-12" style="background-color:black;">
                    <img src = "{{$comm->image}}" width = 100, height = 100>
                    <a href = "/item_detail/{{$comm->id}}">{{$comm->summary}}</a>
                    </br>
                    <p align= "right"> Total Reviews:
                        <?php // must perform check per comment relevent to its item
                            $sql = "select * from item, comment where item.id = comment.itemid and item.id = ?;";
                            $items = DB::select($sql, array($comm->id));
                            echo count($items);
                        ?>
                    </p>
                </div>
              @endforeach
            @else
                no data found
            @endif
        </div>
    </div>
@endsection