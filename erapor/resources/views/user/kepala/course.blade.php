@extends('app')

@section('content')
    <div class="page-title">
        <h3>Master Data Mata Pelajaran</h3>
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
                    <th>Kode</th>
                    <th>Mata Pelajaran</th>
                    <th>Tipe</th>
                    <th>Jumlah Pendidik</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{$course->kode}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$course->type}}</td>
                        <td>{{$course->teacher->count()}}</td>
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