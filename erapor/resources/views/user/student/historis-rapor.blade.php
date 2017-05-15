@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('student.index')}}">Home</a></li>
                <li><a href="{{route('student.historis')}}">Historis Rapor</a></li>
            </ol>
            @include('partials.navbar.date')
        </div>
    </div>

    <div id="historis" class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            @include('user.student.layout.menu')
        </div>
        <div class="col-md-10">
            {!!Form::hidden('student_id', \Auth::user()->student->id, ['v-model' => 'student_id'])!!}
            <div class="panel">
                <div class="panel-header text-center">
                    <h3>Historis Rapor</h3>
                </div>
                <div class="panel-body">
                    <label>Tahun Ajar : </label>
                    <select class="form-control" v-model="TA" v-on="change: visible=true">
                        <option value="0">Pilih Tahun Ajar</option>
                        <option value="@{{ta.rombel_id}}" v-repeat="ta: tahun">@{{ta.year}}</option>
                    </select>
                    <div class="form-group" v-if="visible && TA != 0">
                        <label>Semester : </label>
                        <select class="form-control" v-model="semester" v-on="change: fetchRapor(TA, student_id, semester)">
                            <option value="0">Pilih Semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                        </select>    
                    </div>
                    <div class="text-center" id="loading" v-if="loading">
                        <h3>Loading Data, Please Wait ...</h3>
                        <i class="fa fa-refresh fa-spin fa-3x"></i>
                    </div>
                    <div v-if="show">
                        @include('partials.rapor.student-rapor')    
                    </div>
                    <div v-if="TA == null && semester == 0" class="alert alert-warning" role="alert">
                        <span class="fa fa-warning"> Warning !! Data tidak ditemukan.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!!Html::script('js/vue/student/historis.js')!!}
@endsection
