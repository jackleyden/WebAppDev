@extends('layouts.app')

@section('title')
  Products Index
@endsection

@section('content')


       <ul>
           @foreach ($products as $product)
               <div class="col-md-12" style="background-color:black;">
                    <a href = "/product/{{$product->id}}">{{$product->name}}</a>
                    </br>
                    <p align= "right"> Total Reviews: {{$comments->where('product_id', '=', $product->id)->count()}}</p>
                </div>
                
           @endforeach
           <p> <a href="/product/create">Create</a></p>
       </ul>
       <div>{{$products->links()}}</div>
@endsection

