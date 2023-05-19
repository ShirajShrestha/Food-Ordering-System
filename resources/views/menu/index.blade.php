@extends('menu.layout')
 
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('menu.create') }}"> Add New Product</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<!-- <a class="btn btn-success" href="{{ route('menu.create') }}"> Add Product</a> -->

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    @foreach ($menu as $menu)
    <tr>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->description }}</td>
        <td>{{ $menu->price }}</td>
        <td><img src="{{asset('image/')}}/{{ $menu->image }}" width="100px"></td>
        
        <td>
            <form action="{{ route('menu.destroy',$menu->id) }}" method="post">
                @csrf
                <a class="btn btn-info" href="{{ route('menu.show',$menu->id) }}">Show</a>
    
                <a class="btn btn-primary" href="{{ route('menu.edit',$menu->id) }}">Edit</a>

                @method('DELETE')
      
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



@endsection


