@extends('product.main')
  
@section('content')

<table class="table table-bordered">
    <tr>
        <th>Products</th>
        <th>Image</th>
        <th>Price</th>
    </tr>

    @foreach ($products as $products)
    <tr>
        <td>{{ $products->name }}</td>
        <td><img src="{{asset('image/')}}/{{ $products->image }}" style="width: 150px;"></td>
        <td>{{ $products->price }}</td>
    </tr>
    @endforeach
</table>

@endsection