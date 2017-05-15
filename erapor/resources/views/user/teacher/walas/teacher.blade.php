@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('teacher.index')}}">Home</a></li>
                <li><a href="{{route('teacher.walas')}}">Wali Kelas</a></li>
            </ol>
            @include('partials.navbar.date')
        </div>
    </div>
    <div id="main" class="container-fluid" style="margin: 20px">
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
                                <p>Kelas </p>
                                <p>Wali Kelas</p>
                                <!-- <button class="btn btn-info btn-sm">
                                    <span class="fa fa-file"></span> Leger Semester {{$semester}}
                                </button> -->
                                <p></p>
                            </div>
                            <div class="col-md-8">
                                <p>: {{$rombel->kelas->name}}</p>
                                <p>: {{$rombel->teacher->name}}</p>
                            </div>    
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <div class="col-sm-6">
                                <p>Tahun Ajar</p>
                                <p>Semester</p>
                            </div>                
                            <div class="col-sm-6">
                                <p>: {{$rombel->year}}</p>
                                <p>: {{$semester}}</p>
                            </div>
                        </div>                        
                        @include('partials.rapor.upload', ['import' => 'import.kehadiran', 'export' => 'export.kehadiran'])
                    </div>


                    <table id="table" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Nomor Induk Siswa Nasional</th>
                                <th>Nama Peserta didik</th>
                                <th>Jenis Kelasmin</th>
                                <th>Tahun Masuk</th>
                                <th>Rapor</th>
                                <th>Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($rombel->student as $student)
                            <tr>
                                <td>{!!Html::image($student->user->thumbnail, 'peofile', ['class' => 'img-circle', 'height' => 50, 'width' => 50])!!}</td>
                                <td>{{$student->nis}}</td>
                                <td>{{$student->name}}</td>
                                <td>
                                    <span v-if="{{$student->gender}} == 1">Laki-Laki</span>
                                    <span v-if="{{$student->gender}} == 2">Perempuan</span>
                                </td>
                                <td>{{$student->bp}}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs btn-block"
                                        v-on="click: rapor({{$rombel->id}}, {{$student->id}}, {{1}})"
                                    >
                                        <span class="fa fa-file"></span> Semester 1
                                    </button>
                                    <button class="btn btn-primary btn-xs btn-block" v-if="{{$semester}} == 2"
                                        v-on="click: rapor({{$rombel->id}}, {{$student->id}}, {{2}})"
                                    >
                                        <span class="fa fa-file"></span> Semester 2
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-xs btn-block" v-on="click: edit({{$rombel->id}}, {{$student->id}}, {{$semester}})">
                                        <span class="fa fa-pencil"></span> Kehadiran
                                    </button>
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        @include('partials.rapor.rapor')
        @include('partials.walas.kehadiran')
        @include('flash::message')
    </div>
@endsection

@section('script')
    {!!Html::script(asset('js/walas.js'))!!}
@endsection