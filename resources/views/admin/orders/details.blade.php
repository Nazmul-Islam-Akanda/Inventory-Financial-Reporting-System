@extends('admin.master')
@section('content') 
<div class="container-fluid px-lg-4 px-xl-5">
    <!-- Page Header-->
    <div class="page-header">
        <h1 class="page-heading">Order Details</h1>
    </div>
    <section class="mb-3 mb-lg-5">
        <div class="card">
            <div class="card-body">
                <h5>Order ID: {{ $order->order_id }}</h5>
                <p>Date: {{ $order->created_at->format('Y-m-d') }}</p>
                <p>Total Amount: {{ $order->total_amount }} BDT</p>
                <p>Paid Amount: {{ $order->paid_amount }} BDT</p>
                <p>Due Amount: {{ $order->due_amount }} BDT</p>
                
                <h6>Order Items:</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->order_details as $detail)
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->unit_price }} BDT</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection