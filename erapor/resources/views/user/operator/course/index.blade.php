@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Operator</li>
                    <li class="active">Mata Pelajaran</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            <div class="container-fluid">
                @include('flash::message')
                <h3 class="text-center">Master Data Mata Pelajaran</h3>
                <div>
                    <ul class="list-unstyled mailbox-nav">
                        <li><a href="{{route('course.create')}}"><i class="fa fa-plus"></i> Tambah Mata Pelajaran</a> </li>
                        <li><a href="#" v-on="click: show = !show"><i class="fa fa-trash"></i> Multiple Delete</a></li>
                    </ul>
                </div>
                <div>
                    <div class="panel">
                        <div class="panel-body">
                        @include('partials.rapor.upload', ['import' => 'import.course', 'export' => 'export.course'])
                        {!!Form::open(['url' => 'course-delete'])!!}
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Mata Pelajaran</th>
                                    <th>Kelompok</th>
                                    <th v-show="! show">Action</th>
                                    <th v-show="show">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{$course->kode}}</td>
                                        <td>
                                            {!!link_to_route('course.show', $course->name, $course->id)!!}
                                        </td>
                                        <td>{{$course->type}}</td>
                                        <td class="text-center" v-show="! show">
                                            <a href="{{route('course.edit', $course->id)}}" class="btn btn-default btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                        </td>
                                        <td class="text-center" v-show ="show">
                                            <input  type="checkbox" name="checked[]" value="{{$course->id}}">
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
    <script>
        $(document).ready(function() {
            $('#table').dataTable();
        } );
    </script>
    {!!Html::script(asset('js/vue/course-index.js'))!!}
@endsection