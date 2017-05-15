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
                        <li><a href="{{route('kelas.index')}}">Kelas</a></li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>

            @include('flash::message')
            <div class="container-fluid" style="margin: 20px">
                <h3 class="text-center">Master Data Kelas</h3>
                <div>
                    <ul class="list-unstyled mailbox-nav">
                        <li><a href="{{route('kelas.create')}}"><i class="fa fa-plus"></i> Tambah Kelas</a> </li>
                        <li><a href="#" v-on="click: show = !show"><i class="fa fa-trash"></i> Multiple Delete</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="panel">
                        <div class="panel-body">
                        @include('partials.rapor.upload', ['export' => 'export.rombel', 'import' => 'import.rombel'])
                        {!!Form::open(['url' => 'rombel-delete'])!!}
                            <table id="table" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Kode Kelas</th>
                                    <th>Nama</th>
                                    <th>Jumlah Peserta Didik</th>
                                    <th>Jumlah Mata Pelajaran</th>
                                    <th>Jurusan</th>
                                    <th>Wali Kelas</th>
                                    <th>Tahun Ajar</th>
                                    <th v-show="!show">Action</th>
                                    <th v-show="show">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rombels as $rombel)
                                    <tr>
                                        <td>
                                            {!!link_to_route('kelas.show', $rombel->kode, $rombel->id, ['class' => 'text-capitalize'])!!}
                                        </td>
                                        <td>{{$rombel->name}}</td>
                                        <td>{{$rombel->student->count()}}</td>
                                        <td>{{$rombel->section->count()}}</td>
                                        <td>{{$rombel->kelas->jurusan}}</td>
                                        <td>{{$rombel->teacher->name}}</td>
                                        <td>{{$rombel->year}}</td>
                                        <td v-show="!show">
                                            @include('partials.pilihan-table', [
                                                'route' => 'kelas',
                                                'id' => $rombel->id
                                            ])
                                        </td>
                                        <td v-show="show">
                                            <input type="checkbox" name="checked[]" value="{{$rombel->id}}">
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
    {!!Html::script(asset('js/vue/rombel-index.js'))!!}
@endsection