@extends('app')

@section('content')
    <div class="page-title">
        <h3>Master Data Peserta Didik</h3>
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
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>BP</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{!!Form::image($student->user->thumbnail, null, ['class' => 'img-circle', 'height' => 50, 'width' => 50])!!}</td>
                        <td>{{$student->nis}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->bp}}</td>
                        <td>{{$student->birth}}</td>
                        <td>{{$student->birth_place}}</td>
                        <td>
                            @if($student->gender == 1)
                                Laki-Laki
                            @else
                                Perempuan
                            @endif
                        </td>
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