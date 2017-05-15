@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('student.index')}}">Home</a></li>
                <li><a href="{{route('student.course')}}"></a> Mata Pelajaran</li>
            </ol>
            @include('partials.navbar.date')
        </div>
    </div>

    <div id="course" class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            @include('user.student.layout.menu')
        </div>
        <div class="col-md-10">
            <h3>Daftar Mata Pelajaran yang diambil.</h3>
            <div class="panel">
                <div class="panel-body">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kelompok Mata Pelajaran</th>
                                <th>Mata Pelajaran</th>
                                <th>Nama Pendidik</th>
                                <th>Kelas</th>
                                <th>Tahun Ajar</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sections as $section)
                            <tr>
                                <td>{{$section->course->type}}</td>
                                <td style="text-align: left;">{{$section->course->name}}</td>
                                <td>{{$section->teacher->name}}</td>
                                <th>{{$section->rombel->name}}</th>
                                <td>{{$section->year}}</td>
                                <td>
                                    <button class="btn btn-info btn-block btn-sm" v-on="click: show({{$section->rombel->id}}, {{\Auth::user()->student->id}}, {{1}}, {{$section->id}})">
                                        <span class="fa fa-search"></span> Lihat Nilai
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('partials.student.lihat-nilai')
    </div>
@endsection

@section('script')
    {!!Html::script('js/vue/student/course.js')!!}}
@endsection

