@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="/"> Home</a></li>
                <li class="active">Master Data User</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>

    <div id="admin_user" class="container-fluid" style="margin: 20px">
        @include('partials.error')
        @include('flash::message')
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                @include('user.admin.layout.menu')
                <li>
                    <a href="{{route('admin.create')}}"><i class="fa fa-plus"></i> Tambah User</a>
                </li>
                <li>
                    <a href="#" style="color: red" v-on="click: show = !show"><i class="fa fa-trash-o"></i> Multiple Delete</a>
                </li>
            </ul>
            <img src="/images/sma7.gif" class="img-responsive hidden-sm hidden-xs" alt="Responsive image">
        </div>
        <div class="col-md-10">
            <legend>Master Data User</legend>
            <div class="panel panel-default">
                <div class="panel-body">      
                    @include('partials.rapor.upload', ['export' => 'export.user', 'import' => 'import.user'])
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                            <td v-show="show" style="color: red">Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><img src="{{$user->thumbnail}}" class="img-circle" style="text-align: center" height="50" width="50"></td>
                                <td>
                                    @if($user->role == 1)
                                        {!!link_to_route('admin.show', 'Administrator', ['id' => $user->id], ['class' => 'text-capitalize'])!!}
                                    @elseif($user->role == 2)
                                        {!!link_to_route('admin.show', 'Operator', ['id' => $user->id], ['class' => 'text-capitalize'])!!}
                                    @elseif($user->role == 3)
                                        {!!link_to_route('admin.show', 'Kepala Sekolah', ['id' => $user->id], ['class' => 'text-capitalize'])!!}
                                    @elseif($user->role == 4)
                                        {!!link_to_route('admin.show', $user->teacher->name, ['id' => $user->id], ['class' => 'text-capitalize'])!!}
                                    @else
                                        {!!link_to_route('admin.show', $user->student->name, ['id' => $user->id], ['class' => 'text-capitalize'])!!}
                                    @endif
                                </td>
                                <td>{{$user->username}}</td>
                                <td>
                                    @if($user->email != null)
                                        {{$user->email}}
                                    @else
                                        <i style="color: red">Email belum divalidasi</i>
                                    @endif
                                </td>
                                <td>
                                    @if($user->role == 1)
                                        <span class="label label-info">Administrator</span>
                                    @elseif($user->role == 2)
                                        <span class="label label-primary">Operator</span>
                                    @elseif($user->role == 3)
                                        <span class="label label-success">Kepala Sekolah</span>
                                    @elseif($user->role == 4)
                                        <span class="label label-danger">Pendidik</span>
                                    @elseif($user->role == 5)
                                        <span class="label label-warning">Peserta Didik</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->email != null)
                                        <b style="color: green">Verified</b>
                                    @else
                                        <i style="color: red">Not Verified</i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.edit', $user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                                <td v-show="show" style="text-align: center">
                                    <input type="checkbox" name="checked[]" value="{{$user->id}}">
                                </td>
                            </tr>
                        @endforeach                                                
                        </tbody>
                    </table>
                    <button v-show="show" type="submit" class="btn btn-block btn-danger btn-danger">Hapus Data</button>          
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table').dataTable();
        } );
    </script>
    {!!Html::script(asset('js/admin-user.js'))!!}
@endsection