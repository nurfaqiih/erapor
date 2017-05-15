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
                        <li><a href="{{route('course.index')}}">Mata Pelajaran</a></li>
                        <li class="active">{{$course->id}}</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            <div style="margin-bottom: 40px; margin-top: 5px; margin-right: 20px">
                @include('flash::message')
                @include('partials.delete', ['route' => 'course.destroy', 'id' => $course->id])
                <button class="btn btn-primary pull-right" onclick="window.location.href='{{route('course.edit', ['id' => $course->id])}}'">
                    <span class="fa fa-pencil"></span> Edit
                </button>
            </div>
                
            <div class="container-fluid" style="margin: 2">
                <div>
                    
                </div>
            
                <div>
                    <div class="panel">
                        <div class="panel-body">
                            <legend>Mata Pelajaran</legend>
                            <div class="form-group">
                                {!!Form::label('name', 'Kode : ', ['class' => 'control-label'])!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-code"></span> </div>
                                    {!!Form::text('kode', $course->kode, ['class' => 'form-control', 'placeholder' => 'Kode Mata Pelajaran', 'disabled'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('name', 'Nama Mata Pelajaran : ', ['class' => 'control-label'])!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-font"></span> </div>
                                    {!!Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'Nama Mata Pelajaran', 'disabled'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('type', 'Kelompok Mata Pelajaran : ', ['class' => 'control-label'])!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-bars"></span> </div>
                                    {!!Form::text('tyoe', $course->type, ['class' => 'form-control', 'disabled'])!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="panel">
                        <div class="panel-body">
                            <legend>Daftar Pendidik</legend>
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama Pendidik</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($course->teacher as $teacher)
                                    <tr>
                                        <td>{!!link_to_route('teachers.show', $teacher->nip, $teacher->id)!!}</td>
                                        <td>{{$teacher->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
@endsection