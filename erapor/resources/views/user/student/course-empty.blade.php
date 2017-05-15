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
                <div class="panel-body text-center">
                    <span class="fa fa-warning fa-5x"></span>
                    <h2>Oops, Anda belum memiliki mata pelajaran atau data tidak ditemukan.</h2>
                </div>
            </div>
        </div>
        @include('partials.student.lihat-nilai')
    </div>
@endsection

@section('script')
    {!!Html::script('js/vue/student/course.js')!!}}
@endsection

