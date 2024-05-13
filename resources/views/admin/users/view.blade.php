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
                    <h3><i class="fa fa-user-circle"></i> <strong>Users</strong></h3>
                    <p>
                        <b><a href="{{ route('welcome') }}">
                            Home</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>All Users</b>
                    </p>
                </div>

                <div class="card-body">
                    <form class="mgBot10" method="POST" action="{{ url('search-users') }}">
                        @csrf
                          <div class="form-row align-items-center">
                            <div class="col-md-11 mb-2"> 
                              <input type="text" class="form-control" name="search" placeholder="Search user, use name or email">
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
                                        <th scope="col">First name</th>
                                        <th scope="col">Last name</th>
                                        <th scope="col">Email address</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" class="text-center">Assign/Remove Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                      <tr>
                                        <td scope="row">{{ $user->name }}</td>
                                        <td scope="row">{{ $user->lastname }}</td>
                                        <td scope="row">{{ $user->email }}</td>
                                        <td scope="row"> 
                                            @foreach($user->roles as $role)
                                                  @if($user->roles->count()>1)
                                                    <label class="label label-primary">
                                                      {{ $role->name }}
                                                    </label> 
                                                    &nbsp 
                                                  @else
                                                    <label class="label label-primary">
                                                      {{ $role->name }}
                                                    </label>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td scope="row" class="text-center">
                                            <a href="{{ url('/assign/role', $user->id) }}">Assign</a>,
                                            <a href="{{ url('/remove/role', $user->id) }}">Remove</a> 
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
                                    </tr>
                                </tfoot>
                            </table>
                            <ul class="pagination">
                                {{ $users->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection