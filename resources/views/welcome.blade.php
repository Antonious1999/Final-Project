@extends('layouts.app')
@section('content')
<div class="container">
  <video width="100%" height="800px"  controls autoplay muted>   
    <source src="{{URL::asset('/video/vid.mp4')}}" type="video/mp4"   >   
    {{-- <source src="{{URL::asset('movie.ogg')}}" type="video/ogg">    --}}
    
    </video> 
    @Auth
    <h2 class="text-center" style="font-size:xx-large">New Arrivals</h2>
    <div class="row">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{URL('homee/1.JPG')}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">BLOUSE</p>
          <a href="#" class="btn btn-danger">Buy now</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{URL('homee/2.JPG')}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">BLOUSE</p>
          <a href="#" class="btn btn-danger">Buy now</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{URL('homee/3.JPG')}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">BLOUSE</p>
          <a href="#" class="btn btn-danger">Buy now</a>
        </div>
      </div>

    </div>
    @else
    <p class="text-center"> <a class="btn btn-success" href="{{ route('login') }}">Please login to show products </a> </p>
  @endAuth
</div>
@endsection