@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            {{-- Title --}}
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Operator</li>
                        <li><a href="{{route('section.index')}}">Section</a></li>
                        <li class="active">{{$section->id}}</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            @include('partials.error')
            @include('flash::message')
            {{-- Body --}}

            <div class="container-fluid">
                <br>
                @include('partials.delete', ['route' => 'section.destroy', 'id' => $section->id])
                <button class="btn btn-primary pull-right" onclick="window.location.href='{{route('section.edit', ['id' => $section->id])}}'">
                    <span class="fa fa-pencil"></span> Edit
                </button>
                <div>
                    <legend>Kode Seksi : {{$section->kode}}</legend>
                    <div class="panel">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>Kelas<div id="student" class="text-success pull-right">{!!link_to_route('rombel.show', $section->rombel->name, ['id' => $section->rombel->id])!!}</div></li><hr>
                                <li>Mata Pelajaran<div class="text-success pull-right">{!!link_to_route('course.show', $section->course->name, ['id' => $section->course->id])!!}</div></li><hr>
                                <li>Pendidik / Guru<div class="text-success pull-right">{!!link_to_route('teachers.show', $section->teacher->name, ['id' => $section->teacher->id])!!}</div></li>
                                <li>Nomor Induk Pegawai<div class="text-success pull-right">{{$section->teacher->nip}}</div></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <legend>Peserta Didik</legend>
                    <div class="panel">
                        <div class="panel-body">
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Tahun Masuk</th>
                                    <th>Name</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($section->student as $student)
                                    <tr>
                                        <td>
                                            {!!link_to_route('students.show', $student->nis, ['id' => $student->id])!!}
                                        </td>
                                        <td>{{$student->bp}}</td>
                                        <td>{{$student->name}}</td>
                                        @if($student->gender == 1)
                                            <td>Laki - Laki</td>
                                        @elseif($student->gender == 2)
                                            <td>Perempuan</td>
                                        @endif
                                        <td>{{$student->birth}}</td>
                                        <td>{{$student->birth_place}}</td>
                                        <td><button v-on="click: lihatNilai({{$student->id}}, {{$section->id}})" class="btn btn-primary btn-xs btn-block">
                                            <i class="fa fa-search"></i> Lihat nilai</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.lihat-nilai')
    </div>
@endsection

@section('script')
    {!!Html::script(asset('js/vue/section-show.js'))!!}
@endsection