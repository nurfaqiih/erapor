@extends('app')

@section('content')
    <div class="page-title">
        <h3>Edit Informasi User</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('admin.index')}}">Home</a></li>
                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('admin.user')}}">User</a></li>
                <li><a href="{{route('admin.show', ['id' => $user->id])}}">{{$user->id}}</a></li>
                <li class="active">Edit</li>
            </ol>            
        </div>
        @include('partials.navbar.date')
    </div>
    <div class="container-fluid" style="margin: 20px">
        @include('partials.error')
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('admin.user')}}"><i class="fa fa-database"></i> Master Data User</a> </li>
            </ul>
        </div>
        <div class="col-md-10">
        <div class="panel">
            <div class="panel-body">
                <h3>Silahkan Masukkan Data User</h3>
                {!!Form::model($user, ['route' => ['admin.update', $user->id], 'files' => true, 'method' => 'PATCH', 'class' => 'form-horizontal'])!!}
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{$user->thumbnail}}" height="250" width="250" class="img-rounded img-responsive">
                    </div>
                    <div class="col-md-8">
                        <div class="alert alert-info important">
                            <h2>User Bio:</h2>
                            <h4>Boostrap User Profile</h4>    
                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                        </div> 
                        <div class="row col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-key"></span> </div>
                                {!!Form::select('role', ['Select Role',
                                'Administrator',
                                'Operator',
                                'Kepala Sekolah',
                                'Guru',
                                'Peserta Didik'], $user->role, ['class' => 'form-control', 'required', 'id' => 'role'])!!}
                            </div><br>
                            <i class="fa fa-spinner fa-pulse" id="loading" style="display: none;"></i>
                            <div id="pelajaran" class="form-group" style="display: none;">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-calendar-o"></span> </div>
                                    <select id="course" class="form-control" name="course">
                                    <option value=""></option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-envelope-o"></span> </div>
                                {!!Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email Address'])!!}
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-font"></span></div>
                                {!!Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nama Lengkap'])!!}
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-at"></span></div>
                                {!!Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => 'NIP/NIM/Username'])!!}
                            </div><br>
                            <button type="submit" class="btn btn-primary pull-right">
                                <span class="fa fa-floppy-o"></span> Simpan
                            </button>
                            {!!Form::button('Cancel', ['class' => 'btn btn-danger pull-right', 'type' => 'cancel'])!!}
                        </div>   
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">
        $(document).on({
            ajaxStart: function() { $('#loading').show();    },
            ajaxStop: function() { $('#loading').hide(); }
        });
        $('#role').change(function(){
            var e = $('#role').val();
            if(e != 4){
                $('#pelajaran').hide();
            } else if(e == 4) {
                $('#pelajaran').show();
                $.get('/api/user/teacher', function(data){
                    $('#course').empty();
                    $.each(data, function(index, courseObj){
                        $('#course').append('<option value="' + courseObj.id + '">' + courseObj.name + '</option>');
                    });
                });
            }
        });
    </script>
@endsection