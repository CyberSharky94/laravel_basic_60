@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Laravel 6.0 Basic CRUD</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"><i class="fas fa-plus"></i> Create New Product</a>
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
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('products.show',$product->id) }}"><i class="fas fa-eye"></i> Show</a>
    
                    <a class="btn btn-warning" href="{{ route('products.edit',$product->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>

                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
</div>

@endsection