@extends('app')

@section('content')
    <div class="page-title">
        <h3>Master Data Kelas</h3>
        @include('partials.navbar.date')
    </div>

    <div class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                @include('user.kepala.layout.menu')
            </ul>
        </div>
        <div class="col-md-10">
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama Kelas</th>
                        <th>Tingakatan</th>
                        <th>Jurusan</th>
                        <th>Nomor</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($kelas as $class)
                    <tr>
                        <td>{{$class->name}}</td>
                        <td>{{$class->tingkat}}</td>
                        <td>{{$class->jurusan}}</td>
                        <td>{{$class->no}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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