@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('student.index')}}">Home</a></li>
            </ol>
            @include('partials.navbar.date')
        </div>
    </div>

    <div class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            @include('user.student.layout.menu')
        </div>
        <div class="col-md-10">
            <div class="jumbotron">
                <div class="container">
                    <h2>Hai, {{Auth::user()->student->name}}</h2>
                    <h2>Selamat Datang di Aplikasi E-Rapor Kurikulum 2013 SMA Negeri 7 Padang.</h2>
                </div>
            </div>
        </div>
    </div>
@endsection

