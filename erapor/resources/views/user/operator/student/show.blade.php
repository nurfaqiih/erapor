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
                <li><a href="{{route('students.index')}}">Peserta Didik</a></li>
                <li class="active">{{$student->id}}</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>

    <div class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a href="{{route('students.edit', $student->id)}}"><i class="fa fa-pencil"></i>Edit</a></li>
                <li><a href="" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-trash"></i>Delete</a></li>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="panel">
                <div class="panel-body">
                    <div class="col-sm-4">
                        <a href="{{$student->user->thumbnail}}" class="thumbnail">
                            <img src="{{$student->user->thumbnail}}" alt="profile" class="img-responsive" width="200" height="400">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <legend>Data Peserta Didik</legend>
                        <div class="col-sm-4">
                            <dl>
                                <dt>Username</dt>
                                <dt>Email</dt>

                                <dt>Nama</dt>
                                <dt>Jenis Kelamin</dt>
                                <dt>Tanggal Lahir</dt>
                                <hr>
                                <dt>NISN</dt>
                                <dt>BP</dt>
                            </dl>
                        </div>
                        <div class="col-sm-8">
                            <dl>
                                <dd>: {{$student->user->username}}</dd>
                                <dd>: {{$student->user->email}}</dd>
                                <dd>: {{$student->name}}</dd>
                                <dd>
                                    @if($student->gender == 1)
                                        : Laki-Laki
                                    @elseif($student->gender == 2)
                                        : Perempuan
                                    @endif
                                </dd>
                                <dd>: {{$student->birth}}</dd>
                                <hr>
                                <dd>: {{$student->nis}}</dd>
                                <dd>: {{$student->bp}}</dd>
                            </dl>
                        </div>
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
                    {!!Form::open(['method' => 'DELETE', 'route' => ['students.destroy', $student->id]])!!}
                    {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection