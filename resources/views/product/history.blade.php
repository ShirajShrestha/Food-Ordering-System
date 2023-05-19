@extends('product.main')
  
@section('content')

<table class="table table-bordered">
    <tr>
        <th>Menu</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    @foreach($data as $orders)
    <tr>
        <td>{{$orders->name}}</td>
        <td>{{$orders->quantity}}</td>
        <td>{{$orders->price}}</td>
    </tr>
    @endforeach

</table>

@endsection