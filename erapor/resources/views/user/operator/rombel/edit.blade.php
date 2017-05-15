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
                        <li><a href="{{route('kelas.index')}}">Kelas</a></li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>

            <div class="container-fluid" style="margin: 20px">
                <h3>Update Kelas : {{$rombel->kelas->tingkat}} {{$rombel->kelas->jurusan}} {{$rombel->kelas->no}}</h3>
                <div>
                    @include('partials.error')
                    {!!Form::button('Cancel', ['class' => 'btn btn-danger pull-right', 'type' => 'cancel'])!!}
                    <button type="submit" class="btn btn-primary pull-right">
                        <span class="fa fa-floppy-o"></span> Simpan
                    </button>                        
                    <div class="form-group">
                        {!!Form::label('student_list', 'Peserta Didik')!!} 
                        {!!Form::select('student_list[]', $student, $rombel->student_list, ['class' => 'form-control', 'multiple', 'id' => 'student_list'])!!}
                    </div>
                    {!!Form::close()!!}
                </div>    
                    <div>
                        <div class="panel">
                        <div class="panel-body">
                            <legend>Peserta Didik</legend>
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>BP</th>
                                    <th>Name</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rombel->student as $student)
                                    <tr>
                                        <td>
                                            {!!link_to_route('students.show', $student->nis, ['id' => $student->id])!!}
                                        </td>
                                        <td>{{$student->bp}}</td>
                                        <td>{{$student->name}}</td>
                                        @if($student->gender == 1)
                                            <td>Laki - Laki</td>
                                        @elseif($student->gender == 2)
                                            <td>Perempuan</td>
                                        @endif
                                        <td>{{$student->birth}}</td>
                                        <td>{{$student->birth_place}}</td>
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

@section('footer')
    <script>
        $(document).ready(function() {
            $('#table').dataTable();
        } );
        $('#student_list').select2();
    </script>
@endsection