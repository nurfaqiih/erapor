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
                        <li><a href="{{route('kelas.index')}}">Kelas</a></li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            @include('flash::message')
            @include('partials.error')

            {!!Form::open(['route' => 'kelas.store'])!!}
            {!!Form::hidden('year', $year)!!}
            <div class="container-fluid" style="margin: 20px">
                    <legend>Silahkan Masukan Data Kelas</legend>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                {!!Form::label('kelas', 'Kode Rombongan Belajar :')!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-code"></span> </div>
                                    {!!Form::text('kode', \Carbon\Carbon::now()->year.'-'.rand(100,999), ['class' => 'form-control'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('kelas', 'Kelas :')!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-users"></span> </div>
                                    {!!Form::select('kelas', $kelas, null, ['class' => 'form-control', 'v-on' => 'change: filter', 'v-model' => 'kelas'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('teacher', 'Wali Kelas :')!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-key"></span> </div>
                                    {!!Form::select('teacher', $teacher, null, ['class' => 'form-control'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('student', 'Peserta Didik :')!!}
                                <select id="student" class="form-control" multiple="multiple" name="student[]" v-attr="disabled: disable">
                                    <option v-repeat="student: students" value="@{{student.id}}">@{{student.name}}</option>
                                </select>
                            </div>
                            <div class="progress" id="loading" v-if="loading">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%; background-color: #70C1B3;">
                                    Loading ...
                                </div>
                            </div>
                            {!!Form::submit('Save', ['class' => 'btn btn-info'])!!}
                            {!!link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-danger'])!!}
                        </div>
                    </div>  
                </div>
            {!!Form::close()!!}
        </div>    
    </div>
@endsection

@section('footer')
    {!!Html::script('js/vue/rombel-create.js')!!}
@endsection