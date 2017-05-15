@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.index')}}">Home</a></li>
                <li><a href="{{route('teacher.akademik')}}">Seksi</a></li>
                <li class="active">Teacher</li>
            </ol>
            @include('partials.navbar.date')
        </div>
    </div>
    <div class="container-fluid" style="margin: 20px">
        
        @include('partials.teacher-side-menu')
        @include('flash::message')


        <div class="col-md-10">
            <div class="panel">
                <div class="panel-body">
                    <div class="col-md-2">
                        <p>Nama</p>
                        <p>NIP</p>
                        <p>Mata Pelajaran</p>
                    </div>
                    <div class="col-md-10">
                        <p>: {{$teacher->name}}</p>
                        <p>: {{$teacher->nip}}</p>
                        <p>: {{$teacher->course->name}}</p>
                    </div>

                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Kode Seksi</th>
                            <th>Kelas</th>
                            <th>Peserta Didik</th>
                            <th>Tahun Ajar</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teacher->section as $section)
                            <tr>
                                <td>
                                    {{$section->kode}}
                                </td>
                                <td>{{$section->kelas->tingkat.' '.$section->kelas->jurusan.' '.$section->kelas->no}}</td>
                                <td>{{$section->student->count()}} Orang</td>
                                <td>{{$section->year}}</td>
                                <td>

                                    <a href="{{route('teacher.section', $section->id)}}" class="btn btn-danger"><i class="fa fa-pencil"></i> Entry Nilai</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    </script>
@endsection
