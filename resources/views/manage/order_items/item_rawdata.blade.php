@extends('layouts.other')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            @include('layouts.alerts')
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            @foreach ($errors->all() as $error)
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            @endforeach
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa fa-upload"></i> <strong>Item Raw Data</strong></h3> 
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('all-order-items.upload-rawdata', $order_product->id) }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="form-group pb-2">
                            <label for="prodid">Item Id</label>
                            <input type="text" class="form-control" name="order_prod_id" value="{{ $order_product->id }}" disabled>
                        </div>

                        <div class="form-group pb-2">
                            <label for="rawdata">Item Raw Data</label>
                            <input type="file" class="form-control-file pl-0" name="item_rawdata">
                        </div>

                        <div class="cart-buttons">
                            <a href="{{route('all-orders.index')}}" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i> Back</a>
                            <button type="submit" class="btn btn-sm btn-success float-right">Upload <i class="fa fa-angle-right"></i></button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection