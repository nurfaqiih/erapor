@extends('app')

@section('content')
    <div class="page-title">
        <h3>Akademik</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.index')}}">Home</a></li>
                <li><a href="{{route('teacher.akademik')}}">Akademik</a></li>
                <li class="active">Teacher</li>
                <li class="active">Section</li>
                <li class="active">{{$section->id}}</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>
    <div class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a>{!!Html::image(Auth::user()->thumbnail, 'profile', ['class' => 'img-rounded', 'height' => 100, 'width' => 100])!!}</a></li>
                <li><a>Nama : {{Auth::user()->teacher->name}}</a></li>
                <li><a>NIP : {{Auth::user()->teacher->nip}}</a></li>
                <li><a href="{{route('teacher.akademik')}}"><i class="fa fa-institution"></i>Kelas yang diajar</a></li>

                @if(Auth::user()->teacher->rombel != null)
                    <li><a href="{{route('print.legger', Auth::user()->teacher->rombel->id)}}" target="_blank"><i class="fa fa-print"> Cetak Legger</i> </a> </li>
                    <li><a href="{{route('teacher.walas')}}"><i class="fa fa-user"></i> Wali Kelas</a> </li>
                @endif
            </ul>
            <small>Keterangan * </small><br>
            <small>NH = Nilai Ulangan Harian</small><br>
            <small>UTS = Ulangan Tengah Semester</small><br>
            <small>UAS = Ulangan Akhir Semester</small><br>
            <small>NPr = Nilai Pratikum</small><br>
            <small>NPj = Nilai Projek</small><br>
            <small>NPo = Nilai Portofolio</small><br>
            <small>NO = Nilai Observasi</small><br>
            <small>NDs = Nilai Diri Sendiri</small><br>
            <small>NAt = Nilai Antar Teman</small><br>
            <small>NJ = Nilai Jurnal</small><br>
        </div>
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-body">
                    @include('partials.legger')
                </div>
            </div>
        </div>
    </div>
@endsection