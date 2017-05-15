@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li><a href="{{route('operator.index')}}">Dashboard</a></li>
                        <li class="active">Operator</li>
                        <li><a href="{{route('course.index')}}">Mata Pelajaran</a></li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div> 

            <div class="container-fluid" style="margin: 20px">
                <legend class="text-center">Masukkan Data Mata pelajaran</legend>
                @include('partials.error')
                {!!Form::open(['route' => 'course.store'])!!}
                    <div class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                {!!Form::label('name', 'Kode : ', ['class' => 'control-label'])!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-code"></span> </div>
                                    {!!Form::text('code', rand(10, 99).'-'.\Carbon\Carbon::now()->year, ['class' => 'form-control', 'placeholder' => 'Kode Mata Pelajaran', 'disabled'])!!}
                                    {!!Form::hidden('kode', rand(10, 99).'-'.\Carbon\Carbon::now()->yearIso)!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('name', 'Nama Mata Pelajaran : ', ['class' => 'control-label'])!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-font"></span> </div>
                                    {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Mata Pelajaran'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('type', 'Kelompok Mata Pelajaran : ', ['class' => 'control-label'])!!}
                                    <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-bars"></span> </div>
                                    {!!Form::select('type', [
                                        0 => 'Kelompok Mata Pelajaran',
                                        'Kelompok A (wajib)' => 'Kelompok A (wajib)',
                                        'Kelompok B (wajib)' => 'Kelompok B (wajib)',
                                        'Kelompok C (peminatan)' => 'Kelompok C (peminatan)',
                                        ], 0, ['class' => 'form-control'])!!}
                                </div>
                            </div>
                            {!!Form::submit('Save', ['class' => 'btn btn-info'])!!}
                            {!!link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-danger'])!!}
                        </div>
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@stop
