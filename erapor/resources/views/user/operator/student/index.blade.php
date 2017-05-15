@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Peserta Didik</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div> 

            @include('flash::message')
            <div class="container-fluid" style="margin: 20px">
                <div>
                    <div class="panel col-md-12">
                        <h3 class="text-center">Master Data Peserta Didik</h3>
                        <a href="{{route('students.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peserta Didik</a>
                        <button class="btn btn-default" v-on="click: delete"><i class="fa fa-trash"></i>Multiple Delete</button>
                        <div class="panel-body">
                            @include('partials.rapor.upload', ['export' => 'export.student', 'import' => 'import.student'])
                            {!!Form::open(['url' => 'students-delete'])!!}
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>BP</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th v-show="!show">Action</th>
                                    <th v-show="show">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>
                                            {!!link_to_route('students.show', $student->nis, ['id' => $student->id], ['class' => 'text-capitalize'])!!}
                                        </td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->bp}}</td>
                                        <td>{{$student->user->username}}</td>
                                        <td>{{$student->user->email}}</td>
                                        <td>{{$student->birth}}</td>
                                        <td>{{$student->birth_place}}</td>
                                        <td v-show="!show">
                                            <a href="{{route('students.edit', $student->id)}}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        </td>
                                        <td v-show="show" class="text-center">
                                            <input type="checkbox" name="checked" value="{{$student->id}}">
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
    {!!Html::script(asset('js/vue/students-index.js'))!!}
@endsection

