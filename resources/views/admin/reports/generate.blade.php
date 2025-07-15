@extends('admin.master')
@section('content')  

<div class="container-fluid px-lg-4 px-xl-5">
    <div class="page-header">
        <h1 class="page-heading">Financial Report</h1>
    </div>
    <section class="mb-3 mb-lg-5">
        <form method="GET" action="{{ route('report.generate') }}" class="mt-4 mb-4">
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
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </div>
            </div>
        </form>


        <div class="row mb-3">
                  <!-- Widget Type 1-->
                  <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div>
                            <h4 class="fw-normal text-red">{{$total_sales}}</h4>
                            <p class="subtitle text-sm text-muted mb-0">BDT</p>
                          </div>
                          <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-red">
                                  <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#speed-1"> </use>
                                </svg>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-red-light">
                        <div class="row align-items-center text-red">
                          <div class="col-10">
                            <p class="mb-0">Total Sales</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Widget Type 1-->
                  <!-- Widget Type 1-->
                  <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div>
                            <h4 class="fw-normal text-blue">{{$total_expenses}}</h4>
                            <p class="subtitle text-sm text-muted mb-0">BDT</p>
                          </div>
                          <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-blue">
                                  <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#news-1"> </use>
                                </svg>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-blue-light">
                        <div class="row align-items-center text-blue">
                          <div class="col-10">
                            <p class="mb-0">Total Expenses</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Widget Type 1-->
                  <!-- Widget Type 1-->
                  <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div>
                            <h4 class="fw-normal text-primary">{{$profit}}</h4>
                            <p class="subtitle text-sm text-muted mb-0">BDT</p>
                          </div>
                          <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-primary">
                                  <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#bookmark-1"> </use>
                                </svg>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-primary-light">
                        <div class="row align-items-center text-primary">
                          <div class="col-10">
                            <p class="mb-0">Profit</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Widget Type 1-->
            </div>

    </section> 
</div>

@endsection