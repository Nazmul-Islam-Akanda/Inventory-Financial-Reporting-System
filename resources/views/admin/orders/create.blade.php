@extends('admin.master')
@section('content') 

<style>
    .narrow-col {
        width: 300px;
    }
</style>

<div class="container-fluid px-lg-4 px-xl-5">
 
    <div class="page-header">
        <h1 class="page-heading">Create Order</h1>
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

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('order.store') }}">
            @csrf


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pick</th> 
                        <th class="narrow-col">Quantity</th>
                        <th>Name</th>
                        <th>Purchase Price</th>
                        <th>Sell Price</th>
                        <th>Stock</th>    
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><input type="checkbox" name="product_ids[]" value="{{ $product->id }}"></td>
                        <td class="narrow-col">
                            <input style="width: 200px" type="number" name="quantity[{{ $product->id }}]" class="form-control" min="0">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->purchase_price }} BDT</td>
                        <td>{{$product->sell_price}} BDT</td>
                        <td>{{ $product->current_stock }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" class="form-control" id="discount" name="discount" step="0.01">
            </div>
            <div class="mb-3">
                <label for="paidAmount" class="form-label">Paid Amount</label>      
                <input type="number" class="form-control" id="paidAmount" name="paid_amount" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Make Sale</button>
        </form>
    </section>
</div>

@endsection