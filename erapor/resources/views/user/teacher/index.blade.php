@extends('app')

@section('content')
    <div class="page-title">
        <!-- <h3>Dashboard</h3> -->
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.index')}}">Home</a></li>
                <li class="active">Teacher</li>
            </ol>
            @include('partials.navbar.date')
        </div>
    </div>
    <div class="container-fluid" style="margin: 20px">
        @include('partials.teacher-side-menu')

        <div class="col-md-10">
            <div class="jumbotron">
                <div class="container">
                    <h1>Selamat Datang, {{Auth::user()->name}}</h1>
                    <h3>Manfaatkan Aplikasi E-Rapor SMA Kurikulum 2013 ini dengan sebaik-baiknya. Jaga kerahasian username, email, dan password anda !!!</h3>
                </div>
            </div>
            <h1>Informasi Akademik</h1>
            <table class="table">
                <tr>
                    <td>Batas Akhir Entry Nilai</td>
                    <td>: {{Config::get('kalender.expire')}}</td>
                </tr>
                <tr>
                    <td>Akses Rapor</td>
                    <td>: {{Config::get('kalender.open')}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
