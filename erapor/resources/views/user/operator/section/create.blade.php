@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            @include('partials.error')
            @include('flash::message')
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li><a href="{{route('section.index')}}">Seksi</a></li>
                        <li><a href="{{route('section.create')}}">Create Seksi</a></a></li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            {!!Form::open(['route' => 'section.store'])!!}
            {!!Form::hidden('semester', $semester)!!}
            <div class="row" style="margin: 20px">
                <div class="col-md-12">
                    <legend>Silahkan Masukkan Data Seksi</legend>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                {!!Form::label('year', 'Tahun Ajar :', ['class' => 'control-label'])!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-tag"></span> </div>
                                    {!!Form::text('tahun', $year, ['class' => 'form-control', 'disabled'])!!}
                                    {!!Form::hidden('year', $year)!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('kode', 'Kode Seksi :', ['class' => 'control-label'])!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-code"></span> </div>
                                    {!!Form::text('kode', $kode.'-'.$semester, ['class' => 'form-control', 'disabled'])!!}
                                    {!!Form::hidden('kode', $kode.'-'.$semester)!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('rombel_id', 'Kelas / Rombongan Belajar :', ['class' => 'control-label'])!!}
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-users"></span> </div>
                                    <!-- {!!Form::select('rombel_id', $rombel, null, ['class' => 'form-control', 'v-model' => 'kelas'])!!} -->
                                    <select id="rombel_id" name="rombel_id" class="form-control" v-model="kelas" v-on="change: fetchCourse(kelas)">
                                        <option value="0">Pilih Rombongan Belajar</option>
                                        <option 
                                            v-repeat="rombel: rombels" 
                                            value="@{{rombel.id}}">@{{rombel.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="progress" id="loading" v-if="loading">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%; background-color: #70C1B3;">
                                    Loading ...
                                </div>
                            </div>
                            <div v-show="visible">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="30%">Wali Kelas</td>
                                            <td>: @{{walas.teacher.name}}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP</td>
                                            <td>: @{{walas.teacher.nip}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table">
                                <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th width="35%">Mata Pelajaran</th>
                                    <th>Pendidik</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-repeat="course: courses" class="@{{$index}}">
                                        <td style="vertical-align: middle; text-align: center;">@{{$index + 1}}</td>
                                        <td style="vertical-align: middle;">
                                            @{{course.name}}
                                            <input type="hidden" name="course_id[]" value="@{{course.id}}">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="fa fa-briefcase"></span> </div>
                                                    <select class="form-control"
                                                        name="teacher_id[]" 
                                                        id="teacher"

                                                    >
                                                        <option
                                                            v-repeat="teacher: course.teacher" 
                                                            value="@{{teacher.id}}">@{{teacher.name}}
                                                        </option>
                                                    </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                            
                            </div>
                            
                            <hr>
                            {!!Form::submit('Save', ['class' => 'btn btn-info', 'v-attr' => 'disabled: disable'])!!}
                        </div>
                    </div>
                </div>
            </div>
            {!!Form::close()!!} 
        </div>
    </div>
@endsection

@section('script')
    {!!Html::script(asset('js/vue/section-create.js'))!!}
@endsection