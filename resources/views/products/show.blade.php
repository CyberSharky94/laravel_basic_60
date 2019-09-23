@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Product</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="details_section">
                <table class="table table-bordered table-sm table-striped table-hover">
                    <tr>
                        <th>Name:</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Details:</th>
                        <td>{{ $product->detail }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection