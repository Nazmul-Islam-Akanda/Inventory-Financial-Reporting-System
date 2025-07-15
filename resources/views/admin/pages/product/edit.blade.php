@extends('admin.master')
@section('content') 

<div class="container-fluid px-lg-4 px-xl-5">
 
    <div class="page-header">
        <h1 class="page-heading">Edit Product</h1>
    </div>
    <section class="mb-3 mb-lg-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('product.update', $product->id) }}">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="purchasePrice" class="form-label">Purchase Price</label>
                <input type="number" class="form-control" id="purchasePrice" name="purchase_price" value="{{ $product->purchase_price }}" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="sellPrice" class="form-label">Sell Price</label>      
                <input type="number" class="form-control" id="sellPrice" name="sell_price" value="{{ $product->sell_price }}" step="0.01" required>
            </div>
            <div class="mb-3">  
                <label for="openingStock" class="form-label">Opening Stock</label>
                <input readonly type="number" class="form-control" id="openingStock" value="{{ $product->opening_stock }}" required>
            </div>
            <div class="mb-3">  
                <label for="currentStock" class="form-label">Current Stock</label>
                <input readonly type="number" class="form-control" id="currentStock" value="{{ $product->current_stock }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </section>
</div>

@endsection