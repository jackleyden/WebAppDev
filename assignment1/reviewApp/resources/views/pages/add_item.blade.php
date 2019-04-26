@extends('layouts.master')

@section('title')
  Add Item
@endsection

@section('content')
    <div class = "formstyle">
        <h1> Add Item</h1>
        <form method="post" action="/add_item_action">
            {{csrf_field()}}
            <p>
                <label> Summary: </label>
                <input type="text" name = "summary">
            </p>
                <label> Image: </label>
                <input type="text" name = "image">
                </br>
                <label> Manufacturer: </label> 
                <select name = "manufacturer">
                    @foreach ($manufacturer as $mann)
                        <option value = "{{$mann->id}}">{{$mann->name}}</option>
                    @endforeach
                </select>
            <p>
                <label> Details: </label>
                <textarea name = "details"></textarea>
            </p>
            <input type="submit" value = "Add Item">
        </form>
        
        </br>
        <h1> Add New Manufacturer: </h1> 
        <form method="post" action="/add_man">
            {{csrf_field()}}
            <p>
                <label> Name: </label>
                <input type="text" name = "name">
            </p>
            <input type="submit" value = "Add man">
        </form>
    </div>
@endsection

