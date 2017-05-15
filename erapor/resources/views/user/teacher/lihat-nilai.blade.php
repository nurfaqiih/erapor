@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.index')}}">Home</a></li>
                <li><a href="{{route('teacher.akademik')}}">Akademik</a></li>
                <li class="active">Teacher</li>
                <li><a href="{{route('teacher.section', $rapor->section_id)}}">Section</a></li>
                <li class="active">{{$rapor->section_id}}</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>

    <div class="container-fluid" style="margin: 20px">
        @include('flash::message')
        @include('partials.error')
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a>{!!Html::image($student->user->thumbnail, 'profile', ['class' => 'img-rounded', 'height' => 100, 'width' => 100])!!}</a></li>
                <li><a>Nama : {{$student->name}}</a></li>
                <li><a>NISN : {{$student->nis}}</a></li>
                <li><a>Jenis Kelamin :
                        @if($student->gender == 1)
                            Laki-Laki
                        @elseif($student->gender == 2)
                            Perempuan
                        @endif</a></li>
                <li><a href="{{route('teacher.akademik')}}"><i class="fa fa-institution"></i>Kelas yang diajar</a></li>
                @if(Auth::user()->teacher->rombel != null)
                    <li><a href="{{route('teacher.walas')}}"><i class="fa fa-user"></i> Wali Kelas</a> </li>
                @endif
                <li><a href="{{route('teacher.section', $rapor->section_id)}}"><i class="fa fa-pencil"></i> Enrty Nilai</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <h3>Masukkan Nilai Rapor Peserta Didik</h3>
            <!-- <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#rapor"><span class="fa fa-share-square-o"></span> Entry Nilai</button> -->
            <br>
            <div class="row">
                <div class="panel">
                    <div class="panel-body">
                        <div class="col-md-4">
                            <legend>Pengetahuan</legend>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td>Nilai</td>
                                    <td>Rata-Rata (0>100)</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Ulangan Harian</td>
                                    <td>{{$rapor->NH}}</td>
                                </tr>
                                <tr>
                                    <td>Ulangan Tengah Semester</td>
                                    <td>{{$rapor->UTS}}</td>
                                </tr>
                                <tr>
                                    <td>Ulangan Semester</td>
                                    <td>{{$rapor->UAS}}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2" align="right">Total : {{$rapor->NH + $rapor->UTS + $rapor->UAS}}</td>
                                </tr>
                                </tfoot>
                            </table>
                            <dl class="dl-horizontal">
                                <dt> Rata-Rata</dt>
                                <dd>: {{round(($rapor->NH + $rapor->UTS + $rapor->UAS)/3, 2)}}</dd>
                                <dt>Nilai</dt>
                                <dd>: {{$rapor->score_knowledge}}</dd>
                                <dt>Huruf</dt>
                                <dd>: {{$rapor->letter_knowledge}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <legend>Keterampilan</legend>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td>Nilai</td>
                                    <td>Rata-Rata (0>100)</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Pratikum</td>
                                    <td>{{$rapor->NPr}}</td>
                                </tr>
                                <tr>
                                    <td>Projek</td>
                                    <td>{{$rapor->NPj}}</td>
                                </tr>
                                <tr>
                                    <td>Portofolio</td>
                                    <td>{{$rapor->NPo}}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2" align="right">Total : {{$rapor->NPr + $rapor->NPj + $rapor->NPo}}</td>
                                </tr>
                                </tfoot>
                            </table>
                            <dl class="dl-horizontal">
                                <dt> Rata-Rata</dt>
                                <dd>: {{round(($rapor->NPr + $rapor->NPj + $rapor->NPo)/3, 2)}}</dd>
                                <dt>Nilai</dt>
                                <dd>: {{$rapor->score_skill}}</dd>
                                <dt>Huruf</dt>
                                <dd>: {{$rapor->letter_skill}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <legend>Sikap</legend>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td>Nilai</td>
                                    <td>Rata-Rata (0>100)</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Observasi</td>
                                    <td>{{$rapor->NO}}</td>
                                </tr>
                                <tr>
                                    <td>Diri Sendiri</td>
                                    <td>{{$rapor->NDs}}</td>
                                </tr>
                                <tr>
                                    <td>Antar Teman</td>
                                    <td>{{$rapor->NAt}}</td>
                                </tr>
                                <tr>
                                    <td>Jurnal</td>
                                    <td>{{$rapor->NJ}}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2" align="right">Total : {{$rapor->NO + $rapor->NDs + $rapor->NAt + $rapor->NJ}}</td>
                                </tr>
                                </tfoot>
                            </table>
                            <dl class="dl-horizontal">
                                <dt> Rata-Rata</dt>
                                <dd>: {{round(($rapor->NO + $rapor->NDs + $rapor->NAt + $rapor->NJ)/4, 2)}}</dd>
                                <dt>Nilai</dt>
                                <dd>: {{$rapor->score_attitude}}</dd>
                                <dt>Huruf</dt>
                                <dd>: {{$rapor->letter_attitude}}</dd>
                            </dl>
                        </div>
                        <h5>Deskripisi Pengetahuan :</h5>
                        {!!Form::textarea('desc_knowledge', $rapor->desc_knowledge, ['class' => 'form-control', 'disabled', 'rows' => 3])!!}
                        <h5>Deskripisi Keterampilan :</h5>
                        {!!Form::textarea('desc_skill', $rapor->desc_skill, ['class' => 'form-control', 'disabled', 'rows' => 3])!!}
                        <h5>Deskripisi Sikap dan Sosial :</h5>
                        {!!Form::textarea('desc_attitude', $rapor->desc_attitude, ['class' => 'form-control', 'disabled', 'rows' => 3])!!}
                    </div>
                </div>
            </div>
            @include('partials.rapor.rapor')
        </div>
    </div>
@endsection