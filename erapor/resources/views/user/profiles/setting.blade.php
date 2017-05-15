@extends('app')

@section('content')
    @include('flash::message')
    <div class="full">
        <div class="page-inner">
            {{--Cover Page--}}
            <div class="profile-cover">
                <div class="row">
                    <div class="col-md-3 profile-image">
                        <div class="profile-image-container">
                            <img src="{{$user->thumbnail}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-12 profile-info">
                        <div class=" profile-info-value">
                            <h3>SMA Negeri 7 Padang</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 user-profile">
                        <h3 class="text-center">{{$user->name}}</h3>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        @include('partials.error')
                        @include('flash::message')
                        {!!Form::open(['route' => ['setting.update', $user->id]])!!}
                            <div class="profile-timeline">
                                <ul class="list-unstyled">
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <h3>Ubah Password</h3>
                                                <div class="form-group">
                                                    <label for="old_password">Password Lama</label>
                                                    {!!Form::password('old_password', ['class' => 'form-control', 'id' => 'old_password'])!!}    
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password Baru</label>
                                                    {!!Form::password('password', ['class' => 'form-control', 'id' => 'password'])!!}
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                                                    {!!Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation'])!!}
                                                </div>
                                                {!!Form::submit('Simpan', ['class' => 'btn btn-info btn-sm'])!!}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop