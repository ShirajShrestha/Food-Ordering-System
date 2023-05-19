@extends('menu.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Orders</h2>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
<tr>
    <th>Customer ID</th>
    <th>Product </th>
    <th>Quantity</th>
    <th>Status</th>
</tr>

@foreach ($details as $details)
<tr>
    <td>{{ $details->id}}</td>
    <td>{{ $details->name}}</td>
    <td>{{ $details->quantity }}</td>
    <td>{{ $details->status }}</td>
</tr>
@endforeach
</table>



@endsection