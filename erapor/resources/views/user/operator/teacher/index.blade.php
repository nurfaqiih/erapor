@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Pendidik</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            @include('flash::message')        
            <div class="container-fluid" style="margin: 20px">
                <h3 class="text-center">Master Data Pendidik</h3>
                <div>
                    <ul class="list-unstyled mailbox-nav">
                        <li><a href="{{route('teachers.create')}}"><i class="fa fa-plus"></i>Tambah Pendidik</a></li>
                        <li>
                            {{-- <button class="btn" v-on="click: delete" v-class="turnOn: deleted"><i class="fa fa-trash"></i> Multiple Delete</button> --}}
                            <a href="" v-on="click: delete" ><i class="fa fa-trash"></i> Multiple Delete</a></li>
                    </ul>
                </div>
                <div>
                    <div class="panel">
                        <div class="panel-body">
                            @include('partials.rapor.upload', ['export' => 'export.teacher', 'import' => 'import.teacher'])
                            {!!Form::open(['url' => 'teacher-delete'])!!}
                            <table id="table" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th v-show="!show">Action</th>
                                    <th v-show="show">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>
                                            {!!link_to_route('teachers.show', $teacher->nip, ['id' => $teacher->id], ['class' => 'text-capitalize'])!!}
                                        </td>
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->course->name}}</td>
                                        <td>{{$teacher->birth}}</td>
                                        <td>{{$teacher->birth_place}}</td>
                                        <td>
                                            @if($teacher->gender == 1)
                                                Laki-Laki
                                            @elseif($teacher->gender == 2)
                                                Perempuan
                                            @endif
                                        </td>
                                        <td v-show="!show">
                                            <a href="{{route('teachers.edit', $teacher->id)}}" class="btn btn-default btn-xs"><span class="fa fa-pencil"></span> Edit</ a>
                                        </td>
                                        <td v-show="show">
                                            <input type="checkbox" name="checked[]" value="{{$teacher->id}}">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!!Form::submit('Hapus Data', ['class' => 'btn btn-danger btn-block', 'v-show' => 'show'])!!}
                            {!!Form::close()!!}        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('script')
    {!!Html::script(asset('js/vue/teacher-index.js'))!!}
@endsection
