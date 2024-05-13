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
                    <h3><i class="fa fa-briefcase"></i> <strong>Services</strong></h3>
                    <div class="row d-flex justify-content-between">
                        <p><b><a href="{{ route('welcome') }}">Home</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                            <b>All Services</b></p>
                        <p><a href="{{ route('adminproducts.create') }}" class="btn btn-sm btn-info">Add New Service</a>
                        </p>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Analyte</th>
                                    <th scope="col">Technique</th>
                                    <th scope="col">Test Method</th>
                                    <th scope="col">Accreditation Status</th>
                                    <th scope="col">Unit cost per sample (USD)</th>
                                    <th class="text-center" colspan="2">Actions</th>
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
                                        <a href="{{ route('adminproducts.edit', $product) }}"
                                            class="btn btn-outline-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('adminproducts.destroy', $product) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')"
                                                class="btn btn-outline-danger btn-sm" type="submit"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
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
                                    <td colspan="2"><strong></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection