@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.index')}}">Home</a></li>
                <li><a href="{{route('teacher.akademik')}}">Akademik</a></li>
                <li class="active">Teacher</li>
                <li class="active">Section</li>
                <li class="active">{{$section->id}}</li>
            </ol>
            @include('partials.navbar.date')
        </div>
    </div>
    <div id="teacher" class="container-fluid" style="margin: 20px">

        @include('partials.teacher-side-menu')

        <div class="col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <legend>Daftar Peserta Didik</legend>                    
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-4">
                                <p>Kode Seksi</p>
                                <p>Kelas </p>
                                <p>Mata Pelajaran</p>
                            </div>
                            <div class="col-md-8">
                                <p>: {{$section->kode}}</p>
                                <p>: {{$section->rombel->name}}</p>
                                <p>: {{$section->course->name}}</p>
                            </div>    
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <div class="col-sm-6">
                                <p>Tahun Ajar</p>
                                <p>Semester</p>
                            </div>                
                            <div class="col-sm-6">
                                <p>: {{$section->year}}</p>
                                <p>: {{Config::get('kalender.semester')}}</p>
                            </div>
                        </div>
                    </div>
                    @include('partials.rapor.upload', ['import' => 'import.blangko', 'export' => 'export.blangko'])
                    @include('flash::message')
                    <br>
                    <br>

                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Profile</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($rapors as $rapor)
                            <tr>
                                <td>{!!Html::image($rapor->student->user->thumbnail, 'peofile', ['class' => 'img-circle', 'height' => 50, 'width' => 50])!!}</td>
                                <td>
                                    {!!link_to_route('teacher.rapor', $rapor->student->nis, [$rapor->student->id, $section->id])!!}
                                </td>
                                <td>{{$rapor->student->name}}</td>
                                <td>
                                    @if($rapor->student->gender == 1)
                                        Laki-Laki
                                    @elseif($rapor->student->gender == 2)
                                        Perempuan
                                    @endif
                                </td>
                                <td>
                                    @if($rapor->score_knowledge == 0 && $rapor->score_attitude == 0 && $rapor->score_skill == 0)
                                        {!!$red!!}
                                    @elseif(
                                        $rapor->score_knowledge == 0 || 
                                        $rapor->score_attitude == 0 || 
                                        $rapor->score_skill == 0 ||
                                        $rapor->desc_knowledge == null ||
                                        $rapor->desc_skill == null ||
                                        $rapor->desc_attitude == null
                                    )
                                        {!!$blue!!}
                                    @elseif(
                                        $rapor->score_knowledge != 0 && 
                                        $rapor->score_attitude != 0 && 
                                        $rapor->score_skill != 0 &&
                                        $rapor->desc_knowledge != null &&
                                        $rapor->desc_skill != null &&
                                        $rapor->desc_attitude != null
                                        )
                                        {!!$green!!}
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm btn-block" v-on="click: entry({{$rapor->student->id}}, {{$section->id}})">
                                        <span class="fa fa-pencil"> </span> Entry Nilai
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('partials.rapor.entry-nilai')
    </div>

@endsection

@section('script')
    {!!Html::script('js/vue/teacher-section.js')!!}
@endsection