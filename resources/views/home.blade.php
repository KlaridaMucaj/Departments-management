@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                     <h3>My data!</h3>
                    @foreach($users as $user)
                    @if( $user->id == Auth::user()->id)
                    <table class="table table-bordered data-table" id="mytable">
                        <tr>
                            <td>
                                <img src="{{$user->image}}" width='200' height='200' class="img img-responsive" />
                            </td>
                            <td>
                                <li><b>Id:</b> {{ $user->id }}</li>
                                <li><b>Departament id:</b> {{ $user->departament_id }}</li>
                                <li><b>Name:</b> {{ $user->name }}</li>
                                <li><b>Email:</b> {{ $user->email }}</li>
                                <li><b>Role:</b> {{ $user->role }}</li>
                                <li><b>Password:</b> {{ $user->password }}</li>

                                <a href='/edit/{{$user->id}}' class='edit btn btn-primary btn-sm'>Update your data</a>

                                @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>

                    @can('isAdmin')
                    <h6>(Admin can access this portion!!)</h6>
                    <a href="/dep" class="btn btn-primary float-right btn-success">Departaments info</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection