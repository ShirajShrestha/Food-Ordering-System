@extends('inventory.layout')
 
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
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
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Quantity</th>
    </tr>

    @foreach ($inventory as $inventory)
    <tr>
        <td>{{ $inventory->id }}</td>
        <td>{{ $inventory->name }}</td>
        <td>{{ $inventory->quantity }}</td>
    </tr>
    @endforeach
</table>



@endsection


