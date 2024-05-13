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
                        <h3><i class="fa fa-file"></i> <strong>Services Report</strong></h3>
                        <p><b>Ordered services</b> <i class="fa fa-chevron-right fa-sm"></i>
                        <a href="{{ route('servicesreport.excel') }}" class="text-success"><u>Export report</u></a></p>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Filter By Date</h5>
                                        <form action="{{ route('checkreport') }}" method="post">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label for="">Pick a date</label>
                                                <input class="form-control" type="date" name="date" id="date" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Filter By Month</h5>
                                        <form action="{{ route('checkreport') }}" method="post">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label for="">Select month</label>
                                                <input type="text" class="form-control" name="month" id="searchbymonth" required/>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Filter By Year</h5>
                                        <form action="{{ route('checkreport') }}" method="post">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label for="">Select year</label>
                                                <input type="text" class="form-control" name="year" id="searchbyyear" required/>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th class="text-center">Samples per assay</th>
                                            <th class="text-center">Total Cost(USD)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderitems as $orderitem)
                                            <tr>
                                                <td>{{ $orderitem->name }}</td>
                                                <td class="text-center">{{ $orderitem->quantity_sold }}</td>
                                                <td class="text-center">{{ $orderitem->total_cost }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $("#searchbymonth").datepicker( {
            format: "mm-yyyy",
            startView: "months", 
            minViewMode: "months"
        });

        $("#searchbyyear").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });
    </script>
@endsection
