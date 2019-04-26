@extends('layouts.master')

@section('title')
  Update Item
@endsection

@section('content')
    <div class = "formstyle">
        <h1> Update Item</h1>
        <form method="post" action="/update_item_action">
            {{csrf_field()}}
            <p>
                <label> Summary: </label>
                <input type="hidden" name = "id" value = "{{$item->id}}">
                <input type="text" name = "summary" value = "{{$item->summary}}">
            </p>
            <p>
                <label> Image: </label>
                <input type="text" name = "image" value = "{{$item->image}}">
            </p>
            <p>
                <label>Select The Manufacturer: </label>
                <select name = "manufacturer">
                    @foreach ($manufacturer as $mann)
                        <option value = "{{$mann->id}}">{{$mann->name}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label> Details: </label>
                <textarea name = "details">{{$item->details}}</textarea>
            </p>
            <input type="submit" value = "update Item">
        </form>
    </div>
@endsection

