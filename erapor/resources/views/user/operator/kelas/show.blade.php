@extends('app')

@section('content')
    <div class="page-title">
        <h3>Lokal</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('operator.index')}}">Home</a></li>
                <li class="active">Operator</li>
                <li class="active">Lokal</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>
    <div class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a href="{{route('lokal.create')}}"><i class="fa fa-plus"></i>Tambah lokal</a></li>
                <li><a href="{{route('lokal.edit', $kelas->id)}}"><i class="fa fa-pencil"></i>Edit</a></li>
                <li><a href="" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-trash"></i>Trash</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Data Lokal</h4>
                </div>
                <div class="panel-body">
                    {{$kelas}}
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
                    {!!Form::open(['method' => 'DELETE', 'route' => ['lokal.destroy', $kelas->id]])!!}
                    {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection