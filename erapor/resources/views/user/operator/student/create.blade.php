@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li><a href="{{route('students.index')}}">Peserta Didik</a></li>
                        <li class="active">Tambah Peserta Didik</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            @include('partials.error')
            {!!Form::open(['route' => 'students.store', 'files' => true])!!}
            <div class="container-fluid" style="margin: 20px">
                
                    <div class="panel">
                        <div class="panel-body">
                            <div class="col-sm-4">
                                <a href="/profiles/default.jpg" class="thumbnail">
                                    <img src="/profiles/default.jpg" alt="profile" class="img-responsive" width="200" height="400">
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
                                        {{--{!!Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address'])!!}--}}
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
                                        {!!Form::input('date', 'birth', date('m-d-Y'), ['class' => 'form-control', 'placehoder' => 'Tanggal Lahir'])!!}
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
                                        {!!Form::selectRange('bp', 2011, 2040, \Carbon\Carbon::now()->year, ['class' => 'form-control', 'placeholder' => 'Pilih BP'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                {!!Form::submit('Simpan', ['class' => 'btn btn-primary'])!!}
                {!!Form::reset('Reset', ['class' => 'btn btn-delfault'])!!}
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@stop
