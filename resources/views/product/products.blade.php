@extends('product.main')
   
@section('content')
    
{{-- <div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{asset('image/')}}/{{ $product->image }}" alt="">
                <div class="caption">
                    <h4>{{ $product->name }}</h4>
                    
                    <p><strong>Price: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add-to-cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}

<div class="container">
    <div class="card-deck">
      @foreach($products as $product)
        <div class="card">
          <img src="{{asset('image/')}}/{{ $product->image }}" alt="{{ $product->name }}">
          <div class="card-body">
            <h5 class="card-title"><strong>{{ $product->name }}</strong></h5>
            <p class="card-text"><strong>Price: </strong> Rs {{ $product->price }}</p>
            <div class="btn-group" role="group">
              {{-- <a href="{{route('customer-cart', $product->id)}}" class="btn btn-primary btn-card" id="show-button">Order Now</a>
              <a href="#" class="btn btn-secondary btn-card">View</a> --}}
              <p class="btn-holder"><a href="{{ route('add-to-cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
            </div>
          </div>
        </div>
    
        @if($loop->iteration % 3 == 0)
        </div><div class="card-deck">
      @endif
      @endforeach
      </div>
  </div>
    
@endsection