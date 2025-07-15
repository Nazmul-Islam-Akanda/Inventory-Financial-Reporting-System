@extends('admin.master')
@section('content') 

<div class="container-fluid px-lg-4 px-xl-5">
    <!-- Page Header-->
    <div class="page-header">
        <h1 class="page-heading">Product List</h1>
    </div>
    <section class="mb-3 mb-lg-5"> 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Purchase Price</th>
                    <th>Sell Price</th>
                    <th>Opening Stock</th>
                    <th>Current Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->purchase_price }} BDT</td>
                    <td>{{$product->sell_price}} BDT</td>
                    <td>{{ $product->opening_stock }}</td>
                    <td>{{ $product->current_stock }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form id="delete-form-{{ $product->id }}" action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $product->id }})">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>




@endsection