@extends('app')

@section('content') 
        <div id="wrapper">

        @include('partials.op-side-menu')

        <!-- Page Content -->
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Semester/Tahun Ajar Baru</li>
                    </ol>
                </div>
                @include('partials.navbar.date')                
            </div>
            <br>
            <div class="container-fluid">        
                <div class="col-lg-12">                        
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                                <li class="active">
                                    <a href="#step-1">
                                        <h4 class="list-group-item-heading">Step 1</h4>
                                        <p class="list-group-item-text">Setting Kalender Akademik</p>
                                    </a>
                                </li>
                                <li class="disabled">
                                    <a href="#step-2">
                                        <h4 class="list-group-item-heading">Step 2</h4>
                                        <p class="list-group-item-text">Peserta Didik Baru</p>
                                    </a>
                                </li>
                                <li class="disabled">
                                    <a href="#step-3">
                                        <h4 class="list-group-item-heading">Step 3</h4>
                                        <p class="list-group-item-text">Setting Kelas Baru</p>
                                    </a>
                                </li>
                                <li class="disabled">
                                    <a href="#step-4">
                                        <h4 class="list-group-item-heading">Final Step</h4>
                                        <p class="list-group-item-text">Setting Seksi Baru</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12 well text-center">
                                <h1>Setting Kalender Akademik</h1>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="year">Tahun Ajar : </label>
                                        <select id="year" class="form-control" v-model="newKalender.year">
                                            <option selected="selected" value="0">Pilih Tahun Ajar</option>
                                            <option v-repeat="10" class="@{{$index}}" value="@{{2015 + $index}}/@{{2016 + $index}}">@{{2015 + $index}}/@{{2016 + $index}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="semester">Semester : </label>
                                        <select id="semester" class="form-control" v-model="newKalender.semester">
                                            <option selected="selected" value="0">Pilih Semester</option>
                                            <option value="1">Semester 1</option>
                                            <option value="2">Semester 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="expire">Batas Entry Nilai :</label>
                                        <input id="expire" type="date" class="form-control" required="required" v-model="newKalender.expire" value="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="open">Tanggal Akses Rapor :</label>
                                        <input id="open" type="date" class="form-control" v-model="newKalender.open" required="required" value="">
                                    </div>
                                    <div class="form-group col-md-4">

                                    </div>
                                </div>

                                <button
                                    v-attr="disabled: newKalender.year==0 || newKalender.semester==0 || newKalender.expire==0 || newKalender.open==0"
                                        v-on="click: alert"
                                 id="simpan" class="btn btn-primary btn-lg">Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12 well">
                                <h1 class="text-center">Peserta Didik Baru</h1>                                
                                    <div class="container-fluid" style="margin: 20px">
                                        <div class="text-center" id="loading" v-if="loading">
                                            <h3>Loading Data, Please Wait ...</h3>
                                            <i class="fa fa-refresh fa-spin fa-3x"></i>
                                        </div>
                                        <div class="panel" v-if="!loading">
                                            <div class="panel-body">
                                                <div class="col-sm-8">
                                                    <legend>Silahkan Masukkan Data Peserta Didik</legend>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-key"></i> </div>
                                                            {!!Form::text('nis', null, ['class' => 'form-control', 'placeholder' => 'Nomor Induk Siswa Nasional', 'required', 'v-model' => 'newStudent.nis'])!!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-font"></i> </div>
                                                            {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama', 'required', 'v-model' => 'newStudent.name'])!!}
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="form-group">
                                                        <div class="radio" v-model>
                                                            <input type="radio" id="1" value="1" v-model="newStudent.gender"><label for="one">Laki-Laki</label>  
                                                            <span>&nbsp;</span>
                                                            <label> {!!Form::radio('gender', '2')!!} Perempuan</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i> </div>
                                                            {!!Form::input('date', 'birth', date('YYYY-M-D'), ['class' => 'form-control', 'placehoder' => 'Tanggal Lahir', 'required', 'v-model' => 'newStudent.date'])!!}
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-building"></i> </div>
                                                            {!!Form::text('birth_place', null, ['class' => 'form-control', 'placeholder' => 'Kota Tempat Lahir', 'required', 'v-model' => 'newStudent.birth_place'])!!}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-list"></i> </div>
                                                            {!!Form::selectRange('bp', 2011, 2040, \Carbon\Carbon::now()->year, ['class' => 'form-control', 'placeholder' => 'Pilih BP', 'required', 'v-model' => 'newStudent.bp'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                    {!!Form::submit('Simpan', ['class' => 'btn btn-primary', 'v-on' => 'click: newUser'])!!}
                                </div>
                                <button v-on="click: next3" class="btn btn-primary btn-lg pull-right">Next Step</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12 well">
                                <input type="hidden" name="year" value="@{{kalender.year}}">
                                <div class="container-fluid" style="margin: 20px">                                    
                                        <legend>Silahkan Masukan Data Kelas</legend>
                                        <div class="panel" v-if="!loading">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    {!!Form::label('kelas', 'Kode Rombongan Belajar :')!!}
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-code"></span> </div>
                                                        {!!Form::text('kode', \Carbon\Carbon::now()->year.'-'.rand(100,999), ['class' => 'form-control', 'v-model' => 'newKelas.kode'])!!}
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
                                                        {!!Form::select('teacher', $teacher, null, ['class' => 'form-control', 'v-model' => 'newKelas.teacher'])!!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!!Form::label('student', 'Peserta Didik :')!!}
                                                    <select id="list_student" class="form-control" multiple="multiple" name="student[]" v-model="newKelas.student">
                                                        <option v-repeat="student: students" value="@{{student.id}}">@{{student.name}}</option>
                                                    </select>
                                                </div>
                                                <div class="progress" id="loading" v-if="loading">
                                                    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%; background-color: #70C1B3;">
                                                        Loading ...
                                                    </div>
                                                </div>
                                                {!!Form::button('Save', ['class' => 'btn btn-info', 'v-on' => 'click: newRombel'])!!}
                                            </div>
                                        </div>  
                                    </div>
                                <button v-on="click: next4" class="btn btn-primary btn-lg pull-right">Next Step</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-4">
                        <div class="col-xs-12">
                            <div class="col-md-12 well">
                                <h3 class="text-center">Setting Seksi Baru</h3>
                                {!!Form::hidden('semester', Config::get('kalender.semester'))!!}
                                <div class="row" style="margin: 20px">
                                    <div class="col-md-12">
                                        <legend>Silahkan Masukkan Data Seksi</legend>
                                        <div class="panel">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    {!!Form::label('year', 'Tahun Ajar :', ['class' => 'control-label'])!!}
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-tag"></span> </div>
                                                        {!!Form::text('tahun', Config::get('kalender.year'), ['class' => 'form-control', 'disabled'])!!}
                                                        {!!Form::hidden('year', Config::get('kalender.year'), ['v-model' => 'newSection.year'])!!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!!Form::label('kode', 'Kode Seksi :', ['class' => 'control-label'])!!}
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-code"></span> </div>
                                                        {!!Form::text('kode', $kode.'-'.Config::get('kalender.semester'), ['class' => 'form-control', 'disabled'])!!}
                                                        {!!Form::hidden('kode', $kode.'-'.Config::get('kalender.semester'), ['v-model' => 'newSection.kode'])!!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!!Form::label('rombel_id', 'Kelas / Rombongan Belajar :', ['class' => 'control-label'])!!}
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-users"></span> </div>
                                                        <!-- {!!Form::select('rombel_id', $rombel, null, ['class' => 'form-control', 'v-model' => 'kelas'])!!} -->
                                                        <select id="rombel_id" name="rombel_id" class="form-control" v-model="rombel_id" v-on="change: fetchCourse(rombel_id)">
                                                            <option value="0">Pilih Rombongan Belajar</option>
                                                            <option 
                                                                v-repeat="rombel: rombels" 
                                                                value="@{{rombel.id}}">@{{rombel.name}}
                                                            </option>
                                                        </select>
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
                                                <div class="progress" id="loading" v-if="loading">
                                                    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%; background-color: #70C1B3;">
                                                        Loading ...
                                                    </div>
                                                </div>
                                                <hr>
                                                {!!Form::submit('Save', ['class' => 'btn btn-info', 'v-attr' => 'disabled: disable', 'v-on' => 'click: newSeksi'])!!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button v-on="click: finish" class="btn btn-primary btn-lg pull-right">Finish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection

@section('script')
    {!!Html::script('js/vue/new_semester.js')!!}
    <script type="text/javascript">
        $(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    // $('#activate-step-2').on('click', function(e) {
    //     $('ul.setup-panel li:eq(1)').removeClass('disabled');
    //     $('ul.setup-panel li a[href="#step-2"]').trigger('click');
    //     $(this).remove();
    // })    
});


    </script>
@endsection