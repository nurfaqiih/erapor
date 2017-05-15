@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Dashboard</li>
                        <li>{!!link_to_route('teachers.index', 'Pendidik')!!}</li>
                        <li class="active">Tambah Pendidik</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            @include('partials.error')
            <div class="container-fluid" style="margin: 20px">
                <h3 class="text-center">Masukkan Data Pendidik</h3>
                <div>
                    {!!Form::open(['route' => 'teachers.store', 'files' => true])!!}
                    <div class="panel">
                        <div class="panel-body">
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('profiles/default.jpg')}}" alt="default" class="img-thumbnail" width="200" height="200">
                                </a>
                                <div class="form-group">
                                    {!!Form::label('thumbnail', 'Photo Profile', ['class' => 'control-label'])!!}
                                    {!!Form::file('thumbnail')!!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i> </div>
                                        {!!Form::text('nip', null, ['class' => 'form-control', 'placeholder' => 'Nomor Induk Pegawai', 'autofocus'])!!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-book"></i> </div>
                                        {!!Form::select('course_id', $course, null, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<div class="input-group-addon"><i class="fa fa-envelope-o"></i> </div>--}}
                                        {{--{!!Form::text('email', null, ['class' => 'col-sm-8 form-control', 'placeholder' => 'Email Address'])!!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-font"></i> </div>
                                        {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name'])!!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i> </div>
                                        {!!Form::input('date', 'birth', null, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="radio text-left">
                                        <label>{!!Form::radio('gender', 1, true)!!} Laki-Laki </label>
                                        <span>&nbsp;</span>
                                        <label> {!!Form::radio('gender', 2)!!} Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-building"></i> </div>
                                        {!!Form::text('birth_place', null, ['class' => 'form-control', 'placeholder' => 'Kota Tempat Lahir'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            {!!Form::button('Cancel', ['class' => 'btn btn-danger pull-right', 'type' => 'cancel'])!!}
                            <button type="submit" class="btn btn-primary pull-right">
                                <span class="fa fa-floppy-o"></span> Simpan
                            </button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>        
        </div>
    </div>
@endsection