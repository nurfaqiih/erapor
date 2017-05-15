@extends('app')

@section('content')
    <div class="page-title">
        <h3>Master Data Kelas {{$tingkat}}</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('operator.index')}}">Home</a></li>
                <li class="active">Operator</li>
                <li><a href="{{route('kelas.index')}}"> Kelas</a></li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>
    <div class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a href="{{route('kelas.index')}}"><i class="fa fa-database"></i>Data Kelas</a></li>
                <li><a href="{{route('kelas.create')}}"><i class="fa fa-plus"></i>Tambah Kelas</a></li>
                <li><a href="{{route('kelas.tingkat', 'X')}}">Kelas X (Sepuluh)</a></li>
                <li><a href="{{route('kelas.tingkat', 'XI')}}">Kelas XI (Sebelas)</a></li>
                <li><a href="{{route('kelas.tingkat', 'XII')}}">Kelas XII (Dua Belas)</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-body">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th>Nomor</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($kelas as $klas)
                            <tr>
                                <td>{!!link_to_route('kelas.show', $klas->name, $klas->id )!!}</td>
                                <td>{{$klas->tingkat}}</td>
                                <td>{{$klas->jurusan}}</td>
                                <td>{{$klas->no}}</td>
                                <td>{{$klas->updated_at}}</td>
                                <td>
                                    <a href="{{route('kelas.edit', $klas->id)}}" class="btn btn-default btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
@endsection