@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('admin.index')}}">Home</a></li>
                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('admin.user')}}">User</a></li>
                <li class="active">{{$user->id}}</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>
    <div id="admin-show" class="container-fluid" style="margin: 20px">
        @include('flash::message')
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('admin.user')}}"><i class="fa fa-database"></i> Master Data User</a> </li>
                <li><a href="{{route('admin.edit', ['id' => $user->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{$user->thumbnail}}" class="img-rounded img-responsive" height="250" width="250">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Username</label><br>     
                                    <label>Nama</label><br>   
                                    {{-- <label>Gender</label><br> --}}
                                </div>
                                <div class="col-md-8">
                                    <label>: {{$user->username}} </label><br>
                                    <label>: {{$user->name}}</label><br>
                                    {{-- <label>: {{$user->teacher->gender}}</label> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info important">
                                <h2>User Bio:</h2>
                                <h4>Boostrap User Profile</h4>    
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <i class="fa fa-user"> </i><label> Status</label><br>
                                    <i class="fa fa-envelope"> </i><label> Email Address</label><br>
                                    {{-- <i class="fa fa-calendar"></i><label> Tanggal Lahir</label><br> --}}
                                    {{-- <i class="fa fa-map-marker"></i><label> Tempat Lahir</label><br> --}}
                                </div>
                                <div class="col-md-8">
                                    <label>: {{$user->role}}</label><br>
                                    <label>: {{$user->email}}</label><br>
                                    {{-- <label>: {{$user->teacher->birth}}</label><br> --}}
                                    {{-- <label>: {{$user->teacher->birth_place}}</label><br> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!!Html::script(asset('js/admin-show.js'))!!}
@endsection
