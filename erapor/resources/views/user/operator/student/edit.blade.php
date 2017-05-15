@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Operator</li>
                        <li><a href="{{route('students.index')}}">Peserta Didik</a></li>
                        <li class="active">{{$student->id}}</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>        
            {!!Form::model($student, ['route' => ['students.update', $student->id], 'files' => true, 'method' => 'PATCH', 'class' => 'form-horizontal'])!!}
            @include('partials.error')
            <div class="container-fluid" style="margin: 20px">
                <div class="panel">
                    <div class="panel-body">
                        <div class="col-sm-4">
                            <a href="{{$student->user->thumbnail}}" class="thumbnail">
                            <img src="{{$student->user->thumbnail}}" alt="profile" class="img-responsive" width="200" height="400">
                        </a>
                        {!!Form::label('thumbnail', 'Photo Profile', ['class' => 'control-label'])!!}
                        {!!Form::file('thumbnail', ['class' => 'form-control'])!!}
                        </div>
                        <div class="col-sm-8">
                            <legend>Silahkan Masukkan Data Peserta Didik</legend>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i> </div>
                                    {!!Form::text('nis', null, ['class' => 'form-control', 'placeholder' => 'Nomor Induk Siswa Nasional'])!!}
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<div class="input-group">--}}
                                    {{--<div class="input-group-addon"><i class="fa fa-envelope-o"></i> </div>--}}
                                    {{--{!!Form::email('email', $student->user->email, ['class' => 'form-control', 'placeholder' => 'Email Address'])!!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-font"></i> </div>
                                    {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>{!!Form::radio('gender', 1, true)!!} Laki-Laki </label>
                                    <span>&nbsp;</span>
                                    <label> {!!Form::radio('gender', 2)!!} Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i> </div>
                                    {!!Form::input('date', 'birth', null, ['class' => 'form-control', 'placehoder' => 'Tanggal Lahir'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-building"></i> </div>
                                    {!!Form::text('birth_place', null, ['class' => 'form-control', 'placeholder' => 'Kota Tempat Lahir'])!!}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-list"></i> </div>
                                    {!!Form::selectRange('bp', 2011, 2040, null, ['class' => 'form-control', 'placeholder' => 'Pilih BP'])!!}
                                </div>
                            </div>
                        </div>
                        {!!Form::submit('Simpan', ['class' => 'btn btn-primary'])!!}
                        {!!Form::reset('Reset', ['class' => 'btn btn-default'])!!}
                    </div>  
                </div>
            </div>
            {!!Form::hidden('user_id', $student->user_id)!!}
            {!!Form::close()!!}
        </div>
    </div>
@endsection