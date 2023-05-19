<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food</title>
    @include('template.style')

    {{-- for layout --}}
    @include('product.style')
</head>
<body>
    @include('product.sidebar')

    {{-- <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">My Order</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <a href="{{route('customer')}}">
                  <li class="breadcrumb-item active">Dashboard /</li>
                </a>
                <a href="{{route('customer-logout')}}">
                  <li class="breadcrumb-item active"> Logout </li>
                </a>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div> --}}

      <nav class="navbar navbar-dark  justify-content-between" style="background-color: #343A40;">
        <a class="navbar-brand">Navbar</a>
        <form class="form-inline" action="{{route('search')}}">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>

      {{-- <div>
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ $details['image'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('newcart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div> --}}
 

    <br/>
<div class="container">
  
  
  <div class="content-wrapper">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
      @endif
      {{-- <div class="content"> --}}
          <div class="container-fluid">
              @yield('content')
          </div>
      {{-- </div> --}}
    </div>

    {{-- <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          @include('frontend.sidebar')
        </div>
        <div class="col-md-9">
          <!-- content here -->
          @yield('content')
        </div>
      </div>
    </div> --}}
</div>

     

    @include('product.script')
    @include('template.script')
    {{-- for layout --}}
</body>
</html>