@extends('admin.master')
@section('content') 

<div class="container-fluid px-lg-4 px-xl-5">
    <div class="page-header">
        <h1 class="page-heading">Order List</h1>
    </div>
    <section class="mb-3 mb-lg-5"> 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $order->total_amount }} BDT</td>
                    <td>{{ $order->paid_amount }} BDT</td>
                    <td>
                        <a href="{{ route('order.details', $order->id) }}" class="btn btn-sm btn-primary">Details</a>
                        <form id="delete-form-{{ $order->id }}" action="{{ route('order.delete', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $order->id }})">Delete</button>
                        </form>
                </tr>
                @endforeach
            </tbody>
        </table>   
    </section>
</div>

@endsection