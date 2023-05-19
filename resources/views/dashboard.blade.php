{{-- @extends('admin.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    You are Logged In
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Food Ordering System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    @include('template.style')

    <style>
        .card-deck {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 20px;
      }

    .card {
      width: calc(33.33% - 20px);
      margin-bottom: 20px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
      position: relative;
    }

    
    @media (max-width: 768px) {
      .card {
        width: calc(50% - 15px);
      }
    }

    @media (max-width: 576px) {
      .card {
        width: 100%;
      }
    }
    </style>
</head>
<body>

    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Food Ordering System</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('customer-login')}}">Login</a></li>
                <li class="breadcrumb-item"><a href="{{route('customer-register')}}">Register </a></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
   


    <div class="container">
        <div class="card-deck">
          @foreach($products as $product)
            <div class="card">
              <img src="{{asset('image/')}}/{{ $product->image }}" alt="{{ $product->name }}">
              <div class="card-body">
                <h5 class="card-title"><strong>{{ $product->name }}</strong></h5>
                <p class="card-text"><strong>Price: </strong> Rs {{ $product->price }}</p>
                <div class="btn-group" role="group">
                  <a href="{{route('customer-login')}}" class="btn btn-primary btn-card">Order Now</a>
                  {{-- <a href="#" class="btn btn-secondary btn-card">View</a> --}}
                </div>
              </div>
            </div>
        
            @if($loop->iteration % 3 == 0)
            </div><div class="card-deck">
          @endif
          @endforeach
          </div>
      </div>
    
    
</body>
</html>
