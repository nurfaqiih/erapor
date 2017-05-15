@extends('app')

@section('content')
    <div class="page-title">
        <h3>Wali Kelas</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.index')}}">Home</a></li>
                <li><a href="{{route('teacher.walas')}}">Wali Kelas</a></li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>
    <div class="container-fluid" style="margin: 20px">
        {!!Form::model($student, ['route' => ['teacher.walas.update', 'rombel_id' => $rombel->id, 'student_id' => $student->id], 'method' => 'PATCH'])!!}
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li>{!!Html::image($student->user->thumbnail, 'profile', ['class' => 'img-rounded', 'height' => 100, 'width' => 100])!!}</li>
                <li><a>Nama : {{$student->name}}</a></li>
                <li><a>Kelas : {{$rombel->name}}</a></li>
                <li><a>{!!Form::submit('Simpan', ['class' => 'btn btn-block'])!!}</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        {!!Form::label('desc', 'Deskripsi Antar Mata Pelajaran :', ['class' => 'control-label'])!!}
                        {!!Form::textarea('desc', $student->pivot->desc, ['class' => 'form-control'])!!}
                    </div>
                    <h4>Kehadiran</h4>
                    <div class="form-group">
                        {!!Form::label('alfa', 'Alfa / Tanpa Keterangan :', ['class' => 'control-label'])!!}
                        {!!Form::text('alfa', $student->pivot->alfa, ['class' => 'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('izin', 'Izin :', ['class' => 'control-label'])!!}
                        {!!Form::text('izin', $student->pivot->izin, ['class' => 'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('sakit', 'Sakit :', ['class' => 'control-label'])!!}
                        {!!Form::text('sakit', $student->pivot->sakit, ['class' => 'form-control'])!!}
                    </div>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
    </div>
@endsection