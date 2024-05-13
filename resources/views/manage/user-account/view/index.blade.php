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
                        <h3><i class="fa fa-user"></i> <strong>My Profile</strong></h3>
                        <p><b><a href="{{ route('welcome') }}">Home</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                            <b>Account Details</b></p>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2 ml-1">
                            <h6 class="text-center"><b>First name:</b> {{ Auth::user()->name }}</h6>
                        </div>

                        <div class="row mb-2 ml-1">
                            <h6 class="text-center"><b>Last name:</b> {{ Auth::user()->lastname }}</h6>
                        </div>

                        <div class="row mb-2 ml-1">
                            <h6 class="text-center"><b>Email address:</b> {{ Auth::user()->email }}</h6>
                        </div>

                        <div class="row mb-2 ml-1">
                            <div>
                            <a href="/useraccount/edit">Edit Account</a> | <a href="/change/password">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
