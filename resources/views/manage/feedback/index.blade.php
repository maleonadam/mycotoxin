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
                        <h3><i class="fa fa-table"></i> <strong>Feedback</strong></h3>
                        <p>
                            <b><a href="{{ route('welcome') }}">
                                Home</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                            <b>Client feedback</b>
                        </p>
                    </div>

                    <div class="card-body">
                        <form class="mgBot10" method="POST" action="">
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-md-11 mb-2"> 
                                <input type="text" class="form-control" name="search" placeholder="Search using name">
                                </div>  
                                <div class="col-auto mb-2">
                                <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </form>  

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered table-sm table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Full name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Phone number</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Service offered</th>
                                            <th scope="col" class="text-center">Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($feedbacks as $feedback)
                                        <tr>
                                            <td scope="row">{{ $feedback->name }}</td>
                                            <td scope="row">{{ $feedback->address }}</td>
                                            <td scope="row">{{ $feedback->phone }}</td>
                                            <td scope="row"> 
                                            {{ $feedback->date }}
                                            </td>
                                            <td scope="row"> 
                                            {{ $feedback->service_offered }}
                                            </td>
                                            <td scope="row" class="text-center">
                                                <a href="{{ route('clientform', $feedback->id) }}"><i class="fa fa-eye">view</i></a>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-dark">
                                        <tr>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <ul class="pagination">
                                    {{ $feedbacks->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection