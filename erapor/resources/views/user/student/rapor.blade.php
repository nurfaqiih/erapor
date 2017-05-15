@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('student.index')}}">Home</a></li>
                <li><a href="{{route('student.course')}}"></a> Rapor</li>
            </ol>
            @include('partials.navbar.date')
        </div>
    </div>

    <div id="rapor" class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            @include('user.student.layout.menu')
        </div>
        <div class="col-md-10">
            {!!Form::hidden('rombel_id', $rombel->id, ['v-model' => 'rombel_id'])!!}
            {!!Form::hidden('student_id', \Auth::user()->student->id, ['v-model' => 'student_id'])!!}
            {!!Form::hidden('semester', Config::get('kalender.semester'), ['v-model' => 'semester'])!!}
            @include('partials.rapor.student-rapor')
        </div>
    </div>

@endsection

@section('script')
    {!!Html::script('js/vue/student/rapor.js')!!}
@endsection