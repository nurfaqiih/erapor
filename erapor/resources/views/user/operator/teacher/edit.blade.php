@extends('app')

@section('content')
<div id="wrapper">
    @include('partials.op-side-menu')
    <div>
        @include('partials.bread', ['link' => 'Pendidik', 'route' => 'teachers.index', 'id' => $teacher->id])
        @include('partials.error')
        <div class="container-fluid" style="margin: 20px">
            {!!Form::model($teacher, ['route' => ['teachers.update', $teacher->id], 'files' => true, 'method' => 'PATCH', 'class' => 'form-horizontal'])!!}
            <h3 class="text-center">Masukkan data Pendidik</h3>
            <div>
                <div class="panel">
                    <div class="panel-body">
                        <div class="col-sm-4">
                            <a href="{{$teacher->user->thumbnail}}" class="thumbnail">
                                <img src="{{$teacher->user->thumbnail}}" alt="profile" class="img-responsive" width="200" height="400">
                            </a>
                            {!!Form::file('thumbnail', ['class' => 'form-control'])!!}
                            <hr>
                            <button type="submit" class="btn btn-primary pull-right">
                                <span class="fa fa-floppy-o"></span> Simpan
                            </button>
                            {!!Form::button('Cancel', ['class' => 'btn btn-danger pull-left', 'type' => 'cancel'])!!}
                        </div>
                        <div class="col-sm-8">
                            <legend>Data Pendidik</legend>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i> </div>
                                    {!!Form::text('nip', null, ['class' => 'form-control', 'placeholder' => 'Nomor Induk Pegawai', 'autofocus', 'required'])!!}
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<div class="input-group">--}}
                                {{--<div class="input-group-addon"><i class="fa fa-envelope-o"></i> </div>--}}
                                    {{--{!!Form::email('email', $teacher->user->email, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required'])!!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-font"></i> </div>
                                    {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Pendidik', 'required'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>{!!Form::radio('gender', 1, null)!!} Laki-Laki </label>
                                    <span>&nbsp;</span>
                                    <label>{!!Form::radio('gender', 2, null)!!} Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i> </div>
                                {!!Form::input('date', 'birth', null, ['class' => 'form-control', 'required'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i> </div>
                                    {!!Form::text('birth_place', null, ['class' => 'form-control', 'placeholder' => 'Kota Tempat Lahir', 'required'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i> </div>
                                    {!!Form::select('course_id', $course, null, ['class' => 'form-control'])!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!!Form::hidden('user_id', $teacher->user_id)!!}
            {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection