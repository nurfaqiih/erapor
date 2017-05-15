@extends('app')

@section('content')
    <div class="page-title">
        <h3>Edit Lokal</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('operator.index')}}">Home</a></li>
                <li><a href="{{route('operator.index')}}">Dashboard</a></li>
                <li class="active">Operator</li>
                <li><a href="{{route('lokal.index')}}">Lokal</a></li>
                <li class="active">{{$kelas->tingkat.' '.$kelas->jurusan.' '.$kelas->no}}</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>

    <div class="container" style="margin: 20px">
        @include('partials.error')
        @include('flash::message')
        {!!Form::model($kelas, ['route' => ['lokal.update', $kelas->id], 'method' => 'PATCH'])!!}
        <div class="col-md-4">
            <div class="form-group">
                {!!Form::label('tingkat', 'Tingakatan : ')!!}
                {!!Form::select('tingkat', [
                0 => 'Pilih Tingkat',
                'X' => 'X',
                'XI' => 'XI',
                'XII' => 'XII'], null, ['class' => 'form-control'])!!}
            </div>
            <hr>
            <div class="form-group">
                {!!Form::label('jurusan', 'Peserta Didik')!!}
                {!!Form::select('jurusan', [
                0 => 'Pilih Jurusan',
                'IPA' => 'IPA',
                'IPS' => 'IPS'], null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('no', 'Peserta Didik')!!}
                {!!Form::select('no', ['Pilih Nomor', 1,2,3,4,5,6,7,8,9], null, ['class' => 'form-control'])!!}
            </div>
            {!!Form::submit('Save', ['class' => 'btn btn-info'])!!}
            {!!link_to_route('lokal.show', 'Cancel', ['id' => $kelas->id], ['class' => 'btn btn-danger'])!!}
        </div>
        {!!Form::close()!!}
    </div>
@stop