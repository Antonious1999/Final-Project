@extends('layouts.app')
@section('content')
<div class="container">
    <h1> All products page</h1>
    @foreach ($products as $product)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('upload_product/'.$product->picture)}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text" style="font-size: x-large">Price: 10$</p>
          <a href="#" class="btn btn-danger">Buy now</a>
        </div>
      </div>

    @endforeach
   
</div>
@endsection