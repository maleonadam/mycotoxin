@extends('layouts.other')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa fa-edit"></i> <strong>Update Order</strong></h3>
                    <p><b><a href="{{ route('all-orders.index') }}">All Orders</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>Update Order Status</b></p>
                </div>

                <div class="card-body"> 
                    <form class="form-horizontal" action="{{ route('all-orders.update', $order->id) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="form-group pb-2">
                            <label for="orderid">Order Number</label>
                            <input type="text" class="form-control" name="order_number" value="{{$order->order_number}}" disabled>
                        </div>

                        <div class="form-group pb-2">
                            <label for="status">Status</label>
                            <select class="form-inline" name="order_status_id">
                                @if ($order->order_status_id === 1)
                                    <option value="1">{{"Submitted"}}</option>
                                    <option value="2">Received</option>
                                    <option value="3">Processing</option>
                                    <option value="4">Completed</option>
                                @endif
                                @if ($order->order_status_id === 2) {
                                    <option value="2">{{"Received"}}</option>
                                    <option value="3">Processing</option>
                                    <option value="4">Completed</option>
                                @endif
                                @if ($order->order_status_id === 3) {
                                    <option value="3">{{"Processing"}}</option>
                                    <option value="4">Completed</option>
                                @endif
                                @if ($order->order_status_id === 4) {
                                    <option value="4">{{"Completed"}}</option>
                                @endif
                            </select>
                        </div>

                        <div class="cart-buttons">
                            <a href="{{ route('all-orders.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i> Back</a>
                            <button type="submit" class="btn btn-sm btn-success float-right">Update <i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
