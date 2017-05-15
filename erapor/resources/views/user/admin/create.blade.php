@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Tambah User</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>
    <div class="container-fluid" style="margin: 20px">
        @include('partials.error')
        @include('flash::message')
        {!!Form::open(['route' => 'admin.store', 'class' => 'form-horizontal', 'role' => 'form'])!!}
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('admin.user')}}"><i class="fa fa-database"></i> Master Data User</a> </li>
                <li>
                    <a href="">
                        <button type="submit" class="btn btn-primary btn-block">
                            <span class="fa fa-floppy-o"></span> Simpan
                        </button>
                    </a>
                </li>
            </ul>
            <img src="/images/sma7.gif" class="img-responsive" alt="Responsive image">
        </div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-body">
                        <legend>Tambahkan User Baru</legend>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">@</div>
                                {!!Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username / NISN / NIP', 'required', 'autofocus'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-key"></span> </div>
                            {!!Form::select('role', ['Select Role',
                            'Administrator',
                            'Operator',
                            'Kepala Sekolah',
                            'Guru',
                            'Peserta Didik'], null, ['class' => 'form-control', 'required', 'id' => 'role'])!!}                      
                            </div>
                        </div>
                        <i class="fa fa-spinner fa-pulse" id="loading" style="display: none;"></i>
                        <div id="pelajaran" class="form-group" style="display: none;">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-calendar-o"></span> </div>
                                <select id="course" class="form-control" name="course" data-toggle="tooltip" data-placement="right" title="Mata Pelajaran">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!!Form::close()!!}
    </div>

@endsection

@section('footer')
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

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
