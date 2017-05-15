@extends('app')

@section('content')
    <div class="page-title">
        <h3>Master Data Pendidik</h3>
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
                        <th>Profile</th>
                        <th>NIP (Nomor Induk Pegawai)</th>
                        <th>Nama</th>
                        <th>Mata Pelajaran</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td><img class="img-circle" height="50" width="50" src="{{$teacher->user->thumbnail}}"></td>
                        <td>{{$teacher->nip}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->course->name}}</td>
                        <td>{{$teacher->user->username}}</td>
                        <td>{{$teacher->user->email}}</td>
                        <td>{{$teacher->birth}}</td>
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