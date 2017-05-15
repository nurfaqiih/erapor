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
{{--                <li class="active">{{$section->id}}</li>--}}
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
                    <h3 class="text-center">
                        {{--LAPORAN CAPAIAN KOMPETENSI PESERTA DIDIK--}}
                    </h3><br><br>
                    <div class="col-sm-6">
                        <div class="col-sm-4">
                            <p>Nama Pendidik</p>
                            <p>Mata Pelajaran</p>
                        </div>
                        <div class="col-sm-6">
                            {{--<p>: {{$section->teacher->name}}</p>--}}
                            {{--<p>: {{$section->course->name}}</p>--}}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="col-sm-4 col-sm-offset-3">
                            <p>Kelas</p>
                            <p>Semester</p>
                            <p>Tahun Ajaran</p>
                        </div>
                        <div class="col-sm-4">
                            {{--<p>: {{$section->kelas->name}}</p>--}}
                            {{--<p>: {{$section->semester}}</p>--}}
                            {{--<p>: {{$section->year}}</p>--}}
                        </div>
                    </div>

                    <table id="table" class="table table-bordered table-condensed" cellspacing="0" width="100%">
                        {{--<thead>--}}
                        {{--<tr>--}}
                        {{--<th rowspan="2"><p>No.</p></th>--}}
                        {{--<th rowspan="2"><p>Nama Siswa</p></th>--}}
                        {{--<th colspan="3">Pengetahuan (KI-3)</th>--}}
                        {{--<th colspan="2">Total</th>--}}
                        {{--<th colspan="3">Keterampilan (KI-4)</th>--}}
                        {{--<th colspan="2">Total</th>--}}
                        {{--<th colspan="4">Sikap dan Spiritual</th>--}}
                        {{--<th colspan="2">Total</th>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<th>NH</th>--}}
                        {{--<th>UTS</th>--}}
                        {{--<th>UAS</th>--}}
                        {{--<th>Angka</th>--}}
                        {{--<th>Huruf</th>--}}
                        {{--<th>NPr</th>--}}
                        {{--<th>NPj</th>--}}
                        {{--<th>NPo</th>--}}
                        {{--<th>Angka</th>--}}
                        {{--<th>Huruf</th>--}}
                        {{--<th>NO</th>--}}
                        {{--<th>NDs</th>--}}
                        {{--<th>NAt</th>--}}
                        {{--<th>NJ</th>--}}
                        {{--<th>Angka</th>--}}
                        {{--<th>Huruf</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}

                        {{--<tbody>--}}
                        {{--@foreach($sections as $section)--}}
                        {{--@foreach($section->rapor as $rapor)--}}
                        {{--<tr>--}}
                        {{--<td>{{$no}}</td>--}}
                        {{--<td>{{$rapor->student->name}}</td>--}}
                        {{--<td>{{$rapor->NH}}</td>--}}
                        {{--<td>{{$rapor->UTS}}</td>--}}
                        {{--<td>{{$rapor->UAS}}</td>--}}
                        {{--<td>{{$rapor->score_knowledge}}</td>--}}
                        {{--<td>{{$rapor->letter_knowledge}}</td>--}}
                        {{--<td>{{$rapor->NPr}}</td>--}}
                        {{--<td>{{$rapor->NPj}}</td>--}}
                        {{--<td>{{$rapor->NPo}}</td>--}}
                        {{--<td>{{$rapor->score_skill}}</td>--}}
                        {{--<td>{{$rapor->letter_skill}}</td>--}}
                        {{--<td>{{$rapor->NO}}</td>--}}
                        {{--<td>{{$rapor->NDs}}</td>--}}
                        {{--<td>{{$rapor->NAt}}</td>--}}
                        {{--<td>{{$rapor->NJ}}</td>--}}
                        {{--<td>{{$rapor->score_attitude}}</td>--}}
                        {{--<td>{{$rapor->letter_attitude}}</td>--}}
                        {{--</tr>--}}
                        {{--<?php $no++ ?>--}}
                        {{--@endforeach--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}

                        <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama Peserta Didik</th>
                            @foreach(range(1, 9) as $index)
                                <th colspan="3">Mata Pelajaran</th>
                            @endforeach
                            <th rowspan="2">Total</th>
                            <th rowspan="2">Rata-rata</th>
                            <th colspan="3">Kehadiran</th>
                        </tr>
                        <tr>
                            @foreach(range(1, 9) as $index)
                                <th>Pengetahuan</th>
                                <th>Keterampilan</th>
                                <th>Sikap</th>
                            @endforeach
                            <th>A</th>
                            <th>I</th>
                            <th>S</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nama Peserta Didik</td>
                            @foreach(range(1, 9) as $index)
                                <td></td>
                                <td></td>
                                <td></td>
                            @endforeach
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="col-md-3 pull-right">
                        <p class="text-center">Padang, {{\Carbon\Carbon::now()->format('d M Y')}}</p>
                        <br><br><br>
                        {{--<p class="text-center">{{$section->teacher->name}}</p>--}}
                        {{--<p class="text-center">{{$section->teacher->nip}}</p>--}}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <style>
        td {
            border-collapse:collapse;
            border: 1px black solid;
        }
        tr:nth-of-type(5) td:nth-of-type(1) {
            visibility: hidden;
        }
        .rotate {
            -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
            -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
            -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
            filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
        }
    </style>
    <script>
        window.addEventListener('load', function () {
            var rotates = document.getElementsByClassName('rotate');
            for (var i = 0; i < rotates.length; i++) {
                rotates[i].style.height = rotates[i].offsetWidth + 'px';
            }
        });
    </script>
@endsection