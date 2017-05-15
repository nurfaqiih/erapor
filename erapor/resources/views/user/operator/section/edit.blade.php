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
                        <li><a href="{{route('section.index')}}">Section</a></li>
                        <li class="active">{{$section->id}}</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            @include('partials.error')
            @include('flash::message')
            {!!Form::model($section, ['route' => ['section.update', $section->id], 'method' => 'PATCH'])!!}
            {!!Form::hidden('kode', $section->kode)!!}
            {!!Form::hidden('year', $section->year)!!}
            <div class="container-fluid">
                <h3>Kode Seksi : {{$section->id}}</h3>
                <hr>
                <div class="form-group">
                    {!!Form::label('rombel_id', 'Rombongan Belajar :')!!}
                    {!!Form::select('rombel_id', $rombel, null, ['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('course_id', 'Mata Pelajaran : ')!!}
                    {!!Form::select('course_id', $course, null, ['class' => 'form-control', 'id' => 'course'])!!}
                </div>
                <div class="form-group">
                    <label>Pendidik :</label>
                    {!!Form::select('teacher_id', $teacher, null, ['class' => 'form-control', 'id' => 'teacher', 'disabled'])!!}
                </div>
                @include('partials.loading')
                {!!Form::submit('Save', ['class' => 'btn btn-info'])!!}
                {!!link_to_route('section.show', 'Cancel', ['id' => $section->id], ['class' => 'btn btn-danger'])!!}    
                {!!Form::close()!!}
                
                <legend>Peserta Didik</legend>
                <div class="panel">
                    <div class="panel-body">
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($section->student as $student)
                                <tr>
                                    <td>
                                        {!!link_to_route('students.show', $student->nis, ['id' => $student->id])!!}
                                    </td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->created_at}}</td>
                                    <td>{{$student->updated_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

            $(document).on({
                ajaxStart: function() { $('#loading').show();    },
                ajaxStop: function() { $('#loading').hide(); }
            });

            $('#course').on('change', function (e) {
                console.log(e);

                var course_id = e.target.value;

                //ajax
                $.get('/api/section?course_id=' + course_id, function (data) {
                    //success data
                    $('#teacher').empty();
                    $('#teacher').prop("disabled", false);
                    $.each(data, function (index, teacherObj) {
                        $('#teacher').append('<option value="' + teacherObj.id + '">' + teacherObj.name + '</option>');
                    });
                });
            });

        } );
    </script>
@endsection