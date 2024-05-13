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
                    <h3><i class="fa fa-ban"></i> <strong>Reject Order</strong></h3>
                    <p><b><a href="{{ route('all-orders.index') }}">All Orders</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>Reject this order </b></p>
                </div>

                <div class="card-body"> 
                    <form class="form-horizontal" action="{{ route('all-orders.reject', $order->id) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="form-group pb-2">
                            <label for="orderid">Order Number</label>
                            <input type="text" class="form-control" name="order_number" value="{{$order->order_number}}" disabled>
                        </div>

                        <div class="form-group pb-2">
                            <label for="accept_order">Reject Order</label>
                            <select class="form-inline" name="accept_order">
                                @if ($order->accept_order === 0)
                                    <option value="0">{{"Pending"}}</option>
                                    <option value="1">Accepted</option>
                                    <option value="2">Rejected</option>
                                @endif
                                @if ($order->accept_order === 1)
                                    <option value="1">{{"Accepted"}}</option>
                                @endif
                                @if ($order->accept_order === 2) {
                                    <option value="2">{{"Rejected"}}</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group pb-2">
                            <label for="reject_reason">Reason for rejection(if rejecting)</label>
                            <textarea class="form-control" type="text" name="reject_reason" cols="30" rows="3"></textarea>
                        </div>

                        <div class="cart-buttons">
                            <a href="{{ route('all-orders.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i> Back</a>
                            <button type="submit" class="btn btn-sm btn-success float-right">Accept/Reject <i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
