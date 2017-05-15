@extends('app')

@section('content')
    <div class="page-title">
        <h3>Create Lokal</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('operator.index')}}">Home</a></li>
                <li><a href="{{route('operator.index')}}">Dashboard</a></li>
                <li class="active">Operator</li>
                <li><a href="{{route('lokal.index')}}">Lokal</a></li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>
    @include('partials.error')
    <div class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                <li><a href="{{route('lokal.index')}}"><i class="fa fa-database"></i>Data Lokal</a></li>
                <li><a href="{{route('lokal.create')}}"><i class="fa fa-plus"></i>Tambah Lokal</a></li>
            </ul>
        </div>
        <div class="col-sm-6">
            <legend>Silahkan masukan data lokal</legend>
            <div class="panel">
                <div class="panel-body">
                    {!!Form::open(['route' => 'lokal.store'])!!}
                    <div class="form-group">
                        {!!Form::label('tingkat', 'Tingakatan : ', ['class' => 'control-label'])!!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-check"></i> </div>
                            {!!Form::select('tingkat', [
                            0 => 'Pilih Tingkat',
                            'X' => 'X',
                            'XI' => 'XI',
                            'XII' => 'XII'], null, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('jurusan', 'Jurusan : ', ['class' => 'control-label'])!!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-check"></i> </div>
                            {!!Form::select('jurusan', [
                            0 => 'Pilih Jurusan',
                            'IPA' => 'IPA',
                            'IPS' => 'IPS'], null, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('no', 'Nomor : ', ['class' => 'control-label'])!!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-check"></i> </div>
                            {!!Form::select('no', ['Pilih Nomor', 1,2,3,4,5,6,7,8,9], null, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    {!!Form::submit('Save', ['class' => 'btn btn-info'])!!}
                    {!!link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
