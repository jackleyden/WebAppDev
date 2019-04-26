@extends('layouts.master')

@section('title')
  Item List
@endsection

@section('content')
<h1> Items </h1>
    @if ($item)
      <ul>
      @foreach($item as $items)
        <li><a href = "/item_detail/{{$items->id}}">{{$items->summary}}</a></li>
      @endforeach
      </ul>
      
      <p><a href="{{url("add_item")}}">add Items</a></p>
    @else
      No Items Found
    @endif
@endsection

