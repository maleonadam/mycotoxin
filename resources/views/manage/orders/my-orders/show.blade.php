@extends('layouts.other')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-chevron-circle-down"></i> <strong>Order</strong></h3>
                        <p>
                            <b><a href="{{ route('my-orders.index') }}">
                                My Orders</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                            <b>Order Details</b>
                        </p>
                    </div>

                    <div class="card-body">

                        <div class="row mb-2">
                            <div class="col-4">
                                <h5 class="text-left"><b>Order Number:</b> <u>{{ $order->order_number }}</u></h5>
                            </div>
                            <div class="col-4">
                                <h5 class="text-center"><b>Date Placed:</b> <u>{{ $order->created_at->toFormattedDateString() }}</u></h5>
                            </div>
                            <div class="col-4">
                                @if($order->order_status_id === 1)
                                    <h5 class="text-right"><b>Order Status:</b> <span class="badge badge-light">Submitted</span></h5>
                                @elseif($order->order_status_id === 2)
                                    <h5 class="text-right"><b>Order Status:</b> <span class="badge badge-info">Received</span></h5>
                                @elseif($order->order_status_id === 3)
                                    <h5 class="text-right"><b>Order Status:</b> <span class="badge badge-warning">Processing</span></h5>
                                @else 
                                    <h5 class="text-right"><b>Order Status:</b> <span class="badge badge-success">Completed</span></h5>
                                @endif 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered table-sm table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Service</th>
                                            <th>Details</th>
                                            <th class="text-center">No. of samples</th>
                                            <th class="text-center">Item Status</th>
                                            <th class="text-center">Test Report</th>
                                            <th class="text-center">Raw Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order_products as $order_product)
                                            <tr>
                                                <td>{{ $order_product->product->name }}</td>
                                                <td>{{ $order_product->product->details }}</td>
                                                <td class="text-center">{{ $order_product->quantity }}</td>
                                                <td class="text-center">
                                                    @if($order_product->item_status === 1)
                                                    <p class="badge badge-light">submitted</p>
                                                    @elseif($order_product->item_status === 2)
                                                    <p class="badge badge-info">received</p>
                                                    @elseif($order_product->item_status === 3)
                                                    <p class="badge badge-warning">processing</p>
                                                    @else 
                                                    <p class="badge badge-success">completed</p>
                                                    @endif 
                                                </td>
                                                @if($order_product->item_result === null)
                                                    <td scope="row" class="text-center"><p class="badge badge-light">pending!</p></td>
                                                @else
                                                    <td scope="row" class="text-center"><a href="/item_result/download/{{$order_product->item_result}}">Download</a></td>
                                                @endif
                                                @if($order_product->item_rawdata === null)
                                                    <td scope="row" class="text-center"><p class="badge badge-light">pending!</p></td>
                                                @else
                                                    <td scope="row" class="text-center"><a href="/item_rawdata/download/{{$order_product->item_rawdata}}">Download</a></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-dark">
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            
                <section class="invoice">
                    
                    
                    
                </section>
        </div>
    </div>
@endsection
