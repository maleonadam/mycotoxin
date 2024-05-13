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
                    <h3><i class="fa fa-edit"></i> <strong>Edit Profile</strong></h3>
                    <p><b><a href="{{ url('/useraccount') }}">My Profile</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>Update Details</b></p>
                </div>

                <div class="card-body"> 
                    <form class="form-horizontal" method="POST" action="{{ route('editProfile', Auth::user()->id) }}" aria-label="{{ __('editProfile') }}">
                        {{csrf_field()}}

                        <div class="form-group row pb-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ Auth::user()->lastname }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update Details') }}
                                </button>
                            </div>
                        </div>
    
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
