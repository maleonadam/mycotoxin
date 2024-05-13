@extends('layouts.other')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-briefcase"></i> <strong>Services</strong></h3>
                        <p><b><a href="{{ route('welcome') }}">Home</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                            <b>All Services</b></p>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered mb-0 table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Analyte</th>
                                    <th scope="col">Technique</th>
                                    <th scope="col">Test Method</th>
                                    <th scope="col">Accreditation Status</th>
                                    <th scope="col">Unit cost per sample (USD)</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td><strong>{{ $product->name }}</strong></td>
                                    <td>{{ $product->details }}</td>
                                    <td>{{ $product->test_method }}</td>
                                    <td>{{ $product->accredit_status }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('cart.store', $product->id) }}" method="get">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <input type="hidden" name="details" value="{{ $product->details }}">
                                            <div>
                                                <!-- <i class="fa fa-cart-plus"></i> -->
                                                <button type="submit" class="btn btn-success btn-sm">request service</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6">
                                        <p class="text-info">*	All samples are analyzed in triplicates, certified reference material is used (where available) to assess the accuracy of assays.</p>
                                        <p class="text-info">*	All the raw and finalized data will be provided alongside photocopies of analysis certificates for the reference materials.</p>
                                        <p class="text-info">*	The above cost indicates both consumable costs and staff time.</p>
                                    </td>
                                </tr>
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
@endsection