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
                    <legend>Kenaikan Kelas</legend>                    
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-4">
                                <p>Kelas </p>
                                <p>Wali Kelas</p>
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
                    </div>
                    {!!Form::open(['route' => 'teacher.update.kenaikan'])!!}
                    <table id="table" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Nomor Induk Siswa Nasional</th>
                                <th>Nama Peserta didik</th>
                                <th>Jenis Kelasmin</th>
                                <th>Tahun Masuk</th>
                                <td>Status</td>
                                <th>Naik Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($rombel->student as $student)
                            <tr>
                                <td>{!!Html::image($student->user->thumbnail, 'peofile', ['class' => 'img-circle', 'height' => 50, 'width' => 50])!!}</td>
                                <td>{{$student->nis}}</td>
                                <td>{{$student->name}}</td>
                                <td>
                                    <span>Laki-Laki</span>
                                    <span>Perempuan</span>
                                </td>
                                <td>{{$student->bp}}</td>
                                <td>{{$student->kelas}}</td>
                                <td>
                                	@if($rombel->kelas->tingkat.' '.$rombel->kelas->jurusan != $student->kelas)
                                		{!!Form::checkbox('id[]', $student->id, 'checked', ['class' => 'form-control', 'disabled' => 'disabled'])!!}
                                	@else
                                	{!!Form::checkbox('id[]', $student->id, null, ['class' => 'form-control'])!!}
                                	@endif
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                    <button class="btn btn-info btn-block" type="submit">
                    	<span class="fa fa-save"></span> SIMPAN
                    </button>
                    {!!Form::hidden('tingkat', $rombel->kelas->tingkat)!!}
                    {!!Form::hidden('jurusan', $rombel->kelas->jurusan)!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
	{!!Html::script('js/vue/teacher/kenaikan.js')!!}
@endsection

