@extends('layouts.other')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('layouts.alerts')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa fa-file"></i> <strong>Orders Report</strong></h3>
                    <p><b>Order timelines report</b> <i class="fa fa-chevron-right fa-sm"></i>
                    <a href="{{ route('ordersreport.excel') }}" class="text-success"><u>Export report</u></a></p>
                    
                </div>

                <div class="card-body"> 
                    @if($order_dates->count() > 0)
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-bordered table-sm table-hover"> 
                            <thead>
                              <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Placed On</th>
                                <th scope="col">Accepted On</th>
                                <th scope="col">Budget Upload On</th>
                                <th scope="col">Invoice Upload On</th>
                                <th scope="col">Service Specification Upload On</th>
                                <th scope="col">Signed Service Specification Upload On</th>
                                <th scope="col">First Payment Upload On</th>
                                <th scope="col">Second Payment Upload On</th>
                                <th scope="col">Order Completed On</th>
                              </tr>
                            </thead>

                            <tbody>
                                @foreach($order_dates as $order_date)
                                    <tr>
                                        <td scope="row">{{ $order_date->order_numbered }}</td>
                                        <td scope="row">{{ $order_date->ordercreated_date }}</td>
                                        <td scope="row">{{ $order_date->accept_date }}</td>
                                        <td scope="row">{{ $order_date->budget_date }}</td>
                                        <td scope="row">{{ $order_date->invoice_date }}</td>
                                        <td scope="row">{{ $order_date->service_date }}</td>
                                        <td scope="row">{{ $order_date->signedservi_date }}</td>
                                        <td scope="row">{{ $order_date->payment_date }}</td>
                                        <td scope="row">{{ $order_date->paymentone_date }}</td>
                                        <td scope="row">{{ $order_date->ordercomplete_date }}</td>
                                    </tr>  
                                @endforeach
                            </tbody>
                          </table>
                          <ul class="pagination">
                              {{ $order_dates->links() }}
                          </ul>
                        </div>
                      </div>
                    @else
                      <div class=" row col-12">
                        <h3>There is no report to display!</h3>
                        <div class="mb-5"></div>
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
