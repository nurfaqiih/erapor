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
                    <li><a href="{{route('teachers.index')}}">Pendidik</a></li>
                    <li class="active">{{$teacher->id}}</li>
                </ol>
            </div>
            @include('partials.navbar.date')
        </div>
    
    @include('flash::message')
    <div class="container-fluid" style="margin: 20px">
    <h3 class="text-center">Data Pendidik</h3>
        <div>
            <ul class="list-unstyled mailbox-nav">
                <li><a href="{{route('teachers.create')}}"><i class="fa fa-plus"></i>Tambah Pendidik</a></li>
                <li><a href="{{route('teachers.edit', $teacher->id)}}"><i class="fa fa-pencil"></i>Edit</a></li>
                <li><a href="" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-trash"></i>Delete</a></li>
            </ul>
        </div>
        <div>
            <div class="panel">
                <div class="panel-body">
                    <div class="col-sm-4">
                        <a href="{{$teacher->user->thumbnail}}" class="thumbnail">
                            <img src="{{$teacher->user->thumbnail}}" alt="profile" class="img-responsive" width="250" height="250">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <div class="col-sm-4">
                            <dl>
                                <dt>Username</dt>
                                <dt>Email</dt>
                                <dt>NIP</dt>
                                <dt>Nama</dt>
                                <dt>Jenis Kelamin</dt>
                                <dt>Tanggal Lahir</dt>
                                <hr>
                                <dt>Mata Pelajaran</dt>
                            </dl>
                        </div>
                        <div class="col-sm-8">
                            <dl>
                                <dd>: {{$teacher->user->username}}</dd>
                                <dd>: {{$teacher->user->email}}</dd>
                                <dd>: {{$teacher->nip}}</dd>
                                <dd>: {{$teacher->name}}</dd>
                                <dd>
                                    @if($teacher->gender == 1)
                                        : Laki-Laki
                                    @elseif($teacher->gender == 2)
                                        : Perempuan
                                    @endif
                                </dd>
                                <dd>: {{$teacher->birth}}</dd>
                                <hr>
                                <dd>: {{$teacher->course->name}}</dd>
                            </dl>
                        </div>
                    </div>

                    <div>
                        <legend>Daftar Seksi</legend>
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Pendidik</th>
                                <th>Tahun Ajar</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($teacher->section as $section)
                                <tr>
                                    <td>
                                        {!!link_to_route('section.show', $section->kode, ['id' => $section->id], ['class' => 'text-capitalize'])!!}
                                    </td>
                                    <td>{{$section->rombel->name}}</td>
                                    <td>{{$section->course->name}}</td>
                                    <td>{{$section->teacher->name}}</td>
                                    <td>{{$section->year}}</td>
                                    <td>{{$section->updated_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('footer')
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Warning !!<a class="anchorjs-link" href="#mySmallModalLabel"><span class="anchorjs-icon"></span></a></h4>
                </div>
                <div class="modal-body">
                    Are You Sure to Delete this record??
                </div>

                <div class="modal-footer">
                    {!!Form::open(['method' => 'DELETE', 'route' => ['teachers.destroy', $teacher->id]])!!}
                    {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table').dataTable();
        } );
    </script>
@endsection