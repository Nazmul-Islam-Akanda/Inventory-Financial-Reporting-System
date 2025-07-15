@extends('admin.master')
@section('content') 
<div class="container-fluid px-lg-4 px-xl-5">
    <!-- Page Header-->
    <div class="page-header">
        <h1 class="page-heading">Audit Ledger</h1>
    </div>
    <section class="mb-3 mb-lg-5">
        <form method="GET" action="{{ route('journal.ledger') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date', now()->subDays(30)->toDateString()) }}">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date', now()->toDateString()) }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        @if ($journals->isEmpty())
            <div class="alert alert-info">No records found.</div>
        @else

        @foreach($journals as $journal)
        @php
            $order = $journal->first()->order;
        @endphp
        <div class="card mb-4">
            <div class="card-header">
                <strong>Order #{{ $order->order_id }}</strong>
            </div>
            <div class="card-body p-0">
            <table class="table table-striped m-0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($journal as $jr)
                            <tr>
                                <td>{{ $jr->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $jr->type }}</td>
                                <td>{{ $jr->amount }} BDT</td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        @endforeach

        @endif
    </section>
</div>


@endsection