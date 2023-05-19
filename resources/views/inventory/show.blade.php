@extends('menu.layout')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Stocks</h2>
            </div>
            <!-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('menu.index') }}"> Back</a>
            </div> -->
        </div>
    </div>

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $inventory->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $inventory->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {{ $inventory->quantity }}
            </div>
        </div>
        
    </div>

@endsection