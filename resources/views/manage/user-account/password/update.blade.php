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
                    <h3><i class="fa fa-edit"></i> <strong>Change Password</strong></h3>
                    <p><b><a href="{{ url('/useraccount') }}">My Profile</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>Update Password</b></p>
                </div>

                <div class="card-body"> 
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}" aria-label="{{ __('changePassword') }}">
                        {{csrf_field()}}

                        <div class="form-group row pb-2">
                            <label for="current-password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}" name="current-password" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update Password') }}
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
