@extends('layouts.master')

@section('title')
  Manufacturers
@endsection

@section('content')
    <div class= "row" id="content">
        <p><a href="{{url("add_item")}}">Add Items</a></p>
        <h1> Telescope accessories:</h1>
        <div class="col-md-12">
            <label> Manufacturers: </label> 
            <ul>
                @foreach ($manufacturers as $mann)
                    <li><a href = "/update_man_page/{{$mann->id}}">{{$mann->name}}</a></li>
                @endforeach
            </ul>

            @if ($comments)
                @foreach($comments as $comm)
                    @if ($comm->manufacturer == $manid)
                        <div class="col-md-12" style="background-color:black;">
                            <img src = "{{url("$comm->image")}}" width = 100, height = 100>
                            <a href = "/item_detail/{{$comm->id}}">{{$comm->summary}}</a>
                            </br>
                            <p align= "right"> Total Reviews:
                            <?php 
                                $sql = "select * from item, comment where item.id = comment.itemid and item.id = ?;";
                                $items = DB::select($sql, array($comm->id));
                                echo count($items);
                                ?></p>
                        </div>
                    @endif
                @endforeach
            @else
                No Items Found
            @endif
        </div>
    </div>
@endsection