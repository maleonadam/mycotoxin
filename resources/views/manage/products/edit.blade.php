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
                    <h3><i class="fa fa-edit"></i> <strong>Edit Service</strong></h3>
                    <p><b><a href="{{ route('adminproducts.index') }}">Services</a></b> <i
                            class="fa fa-chevron-right fa-sm"></i>
                        <b>Edit service details</b></p>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('adminproducts.update', $product) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">Analyte</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="details">Technique</label>
                            <textarea class="form-control" type="text" name="details" cols="30" rows="5"
                                value="{{$product->details}}" required>{{$product->details}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="test_method">Test Method</label>
                            <textarea class="form-control" type="text" name="test_method" cols="30" rows="5"
                                value="{{$product->test_method}}" required>{{$product->test_method}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="accredit_status">Accredited Status</label>
                            <input type="text" class="form-control" name="accredit_status"
                                value="{{$product->accredit_status}}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Unit cost per sample (USD)</label>
                            <input type="number" class="form-control" name="price" value="{{$product->price}}" required>
                        </div>

                        <div class="cart-buttons">
                            <a href="{{ route('adminproducts.index') }}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-angle-left"></i> Back</a>
                            <button type="submit" class="btn btn-sm btn-success">Update <i
                                    class="fa fa-angle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection