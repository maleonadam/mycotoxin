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
                    <h3><i class="fa fa-edit"></i> <strong>Update Item</strong></h3>
                    
                </div>

                <div class="card-body"> 
                    <form class="form-horizontal" action="{{ route('all-order-items.update', $order_product->id) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="form-group pb-2">
                            <label for="orderid">Item Id</label>
                            <input type="text" class="form-control" name="order_number" value="{{ $order_product->id }}" disabled>
                        </div>

                        <div class="form-group pb-2">
                            <label for="status">Status</label>
                            <select class="form-inline" name="item_status">
                                @if ($order_product->item_status === 1)
                                    <option value="1">{{"Submitted"}}</option>
                                    <option value="2">Received</option>
                                    <option value="3">Processing</option>
                                    <option value="4">Completed</option>
                                @endif
                                @if ($order_product->item_status === 2) {
                                    <option value="2">{{"Received"}}</option>
                                    <option value="3">Processing</option>
                                    <option value="4">Completed</option>
                                @endif
                                @if ($order_product->item_status === 3) {
                                    <option value="3">{{"Processing"}}</option>
                                    <option value="4">Completed</option>
                                @endif
                                @if ($order_product->item_status === 4) {
                                    <option value="4">{{"Completed"}}</option>
                                @endif
                            </select>
                        </div>

                        <div class="cart-buttons">
                            <a href="{{route('all-orders.index')}}" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i> Back</a>
                            <button type="submit" class="btn btn-sm btn-success float-right">Update <i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection