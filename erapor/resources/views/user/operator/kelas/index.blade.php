@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{route('operator.index')}}">Home</a></li>
                    <li class="active">Operator</li>
                    <li><a href="{{route('lokal.index')}}">Lokal</a></li>
                </ol>
            </div>
            @include('partials.navbar.date')
        </div>
        <div class="container-fluid" style="margin: 20px">
            @include('flash::message')
            <h3 class="text-center">Master Data Lokal</h3>
            <div>
                <ul class="list-unstyled mailbox-nav">
                    <li><a href="{{route('lokal.create')}}"><i class="fa fa-plus"></i>Tambah Lokal</a></li>
                    <li><a href="" v-on="click: toggle"><span class="fa fa-trash"></span> Multiple Delete</a></li>
                </ul>
            </div>
            <div>
                <div class="panel">
                    <div class="panel-body">
                        @include('partials.rapor.upload', ['import' => 'import.kelas', 'export' => 'export.kelas'])
                        {!!Form::open(['url' => 'kelas-delete'])!!}
                        <table id="table" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Tingkat</th>
                                <th>Jurusan</th>
                                <th>Nomor</th>
                                <th>Last Update</th>
                                <th v-show="visible">Action</th>
                                <th v-show="!visible">Delete</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($kelas as $klas)
                                <tr>
                                    <td>{!!link_to_route('lokal.show', $klas->id, $klas->id )!!}</td>
                                    <td>{{$klas->tingkat}}</td>
                                    <td>{{$klas->jurusan}}</td>
                                    <td>{{$klas->no}}</td>
                                    <td>{{$klas->updated_at}}</td>
                                    <td v-show="visible">
                                        @include('partials.pilihan-table', ['route' => 'lokal', 'id' => $klas->id])
                                    </td>
                                    <td v-show="!visible">
                                        <input type="checkbox" name="checked[]" value="{{$klas->id}}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!!Form::submit('Hapus Data', ['class' => 'btn btn-danger btn-block', 'v-show' => '!visible'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('script')
    {!!Html::script(asset('js/vue/kelas-index.js'))!!}
@endsection