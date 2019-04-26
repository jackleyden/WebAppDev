@extends('layouts.app')

@section('title')
  Products Index
@endsection

@section('content')

      <h1>Edit</h1>
      
      <form method="POST" action = "/product/{{$product->id}}">
          {{csrf_field()}}
          {{ method_field('PUT')}}
          <p><label>Name: </label><input type="text" name="name" value = "{{ old('name', $product->name)}}"></p>
            @if ($errors->first('name'))
              <div class="alert">
                <ul>
                    <li>{{$errors->first('name')}}</li>
                 
                </ul>
              </div>
            @endif
          <p><label>Price: </label><input type="text" name="price" value = "{{ old('price', $product->price)}}"></p>
            @if ($errors->first('price'))
              <div class="alert">
                <ul>
                    <li>{{$errors->first('price')}}</li>
                </ul>
              </div>
            @endif
            
            <p><label>Description: </label><input type="text" name="desc" value = "{{ old('desc', $product->desc)}}"></p>
            @if ($errors->first('desc'))
              <div class="alert">
                <ul>
                    <li>{{$errors->first('desc')}}</li>
                 
                </ul>
              </div>
            @endif
          
          <p> <select name = "manufacturer">
              @foreach ($mans as $man)
                @if ($man->id == old('manufacturer', $product->manufacturer_id))
                  <option value="{{$man->id}}" selected = "selected">{{$man->name}}</option>
                @else
                  <option value="{{$man->id}}">{{$man->name}}</option>
                @endif
              @endforeach
          </select></p>
          <input type="submit" value="Update">
      </form>
@endsection

