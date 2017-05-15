@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <h3>Edit Mata Pelajaran</h3>
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
        @include('partials.error')
        <div>
            <div class="panel">
                <div class="panel-body">
                    <legend>Edit Mata Pelajaran</legend>
                    {!!Form::model($course, ['route' => ['course.update', $course->id], 'method' => 'PATCH'])!!}
                    <div class="form-group">
                        {!!Form::label('name', 'Kode : ', ['class' => 'control-label'])!!}
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-code"></span> </div>
                            {!!Form::text('kode', null, ['class' => 'form-control', 'placeholder' => 'Kode Mata Pelajaran', 'disabled'])!!}
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
                            ], null, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    {!!Form::submit('Save', ['class' => 'btn btn-info'])!!}
                    {!!link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
        </div>    
    </div>
@endsection
