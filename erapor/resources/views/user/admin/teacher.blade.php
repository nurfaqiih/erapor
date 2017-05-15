@extends('app')

@section('content')
    <div class="page-title">
        <h3>Dashboard</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('admin.index')}}">Home</a></li>
                <li class="active">User</li>
                <li class="active">Teacher</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid" style="margin: 20px">
        <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->user->role}}</td>
                    <td>{{$user->user->username}}</td>
                    <td>{{$user->user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop