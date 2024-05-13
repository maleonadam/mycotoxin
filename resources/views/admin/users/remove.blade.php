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
                    <h3><i class="fa fa-edit"></i> <strong>Remove</strong></h3>
                    <p><b><a href="{{ url('/users') }}">All Users</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>Remove Role</b></p>
                </div>

                <div class="card-body"> 
                    <form class="form-horizontal" method="POST" action="{{ route('removeRole', $user->id) }}" aria-label="{{ __('removeRole') }}">
                        {{csrf_field()}}

                        <div class="form-group row pb-2">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" name="role" required>
                                    <option selected>Choose a Role...</option>
                                    <option value="staff">Staff</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option> 
                                </select>

                                @if ($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Remove Role') }}
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