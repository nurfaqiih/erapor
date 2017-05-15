@extends('app')
@section('content')
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
                            <h3>1020</h3>
                            <p>Seksi</p>
                        </div>
                        <div class=" profile-info-value">
                            <h3>1780</h3>
                            <p>Kelas</p>
                        </div>
                        <div class=" profile-info-value">
                            <h3>260</h3>
                            <p>Photos</p>
                        </div>
                    </div>
                </div>
            </div>

            {{--Main Page--}}
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 user-profile">
                        <h3 class="text-center">{{$user->teacher->name}}</h3>
                        <p class="text-center">{{$user->username}}</p>
                        <hr>
                        <ul class="list-unstyled text-center">
                            <li>
                                <p>
                                    @if($user->teacher->gender == 1)
                                        <i class="fa fa-map-mars" style="margin-right: 10px"></i>Laki-laki
                                    @elseif($user->teacher->gender == 2)
                                        <i class="fa fa-venus" style="margin-right: 10px;"></i>Perempuan
                                    @endif
                                </p>
                            </li>
                            <li><p><i class="fa fa-envelope" style="margin-right: 10px"></i><a href="">{{$user->email}}</a></p></li>
                        </ul>
                        <hr>\
                        <a href="" class="btn btn-primary"><span class="fa fa-pencil"></span> Edit Profile</a>
                        <a href="" class="btn btn-primary"><span class="fa fa-wrench"></span> Setting</a>
                    </div>
                    <div class="col-md-6 m-t-lg">
                        <div class="profile-timeline">
                            <ul class="list-unstyled">
                                <li class="timeline-item">
                                    <div class="panel panel-white">
                                        <div class="panel-body">
                                            <div class="timeline-item-header">
                                                <img src="{{asset('assets/images/avatar3.png')}}" alt="">
                                                <p>Christopher palmer <span>Posted a Status</span></p>
                                                <small>5 hours ago</small>
                                            </div>
                                            <div class="timeline-item-post">
                                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                                <div class="timeline-options">
                                                    <a href="#"><i class="icon-like"></i> Like (7)</a>
                                                    <a href="#"><i class="icon-bubble"></i> Comment (2)</a>
                                                </div>
                                                <div class="timeline-comment">
                                                    <div class="timeline-comment-header">
                                                        <img src="{{asset('assets/images/avatar5.png')}}" alt="">
                                                        <p>Nick Doe <small>1 hour ago</small></p>
                                                    </div>
                                                    <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                                                </div>
                                                <div class="timeline-comment">
                                                    <div class="timeline-comment-header">
                                                        <img src="{{asset('assets/images/avatar2.png')}}" alt="">
                                                        <p>Sandra Smith <small>3 hours ago</small></p>
                                                    </div>
                                                    <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                </div>
                                                <textarea class="form-control" placeholder="Replay"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 m-t-lg">
                        {{--Team Info--}}
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <div class="panel-title">Team</div>
                            </div>
                            <div class="panel-body">
                                <div class="team">
                                    <div class="team-member">
                                        <div class="online on"></div>
                                        <img src="{{asset('assets/images/avatar1.png')}}" alt="">
                                    </div>
                                    <div class="team-member">
                                        <div class="online off"></div>
                                        <img src="{{asset('modern')}}" alt="">
                                    </div>
                                    <div class="team-member">
                                        <div class="online on"></div>
                                        <img src="{{asset('assets/images/avatar3.png')}}" alt="">
                                    </div>
                                    <div class="team-member">
                                        <div class="online on"></div>
                                        <img src="{{asset('assets/images/avatar5.png')}}" alt="">
                                    </div>
                                    <p class="more-members"><a href="#">+5 more...</a></p>
                                </div>
                            </div>
                        </div>

                        {{--Some Info--}}
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <div class="panel-title">Some Info</div>
                            </div>
                            <div class="panel-body">
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                            </div>
                        </div>

                        {{--Skill--}}
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <div class="panel-title">Skills</div>
                            </div>
                            <div class="panel-body">
                                <p>HTML5</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    </div>
                                </div>
                                <p>PHP</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    </div>
                                </div>
                                <p>Javascript</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    {{--<div class="row">--}}
        {{--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 toppad" >--}}
            {{--<div class="panel panel-info">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">User Profile</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-3 col-lg-3 " align="center">--}}
                            {{--{!!Html::image(Auth::user()->thumbnail, null, ['height' => 100, 'width' => 100, 'class' => 'img-circle'])!!}--}}
                        {{--</div>--}}
                        {{--<div class=" col-md-9 col-lg-9 ">--}}
                            {{--<table class="table table-user-information">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>Nama </td>--}}
                                    {{--<td>--}}
                                        {{--@if(Auth::user()->role == 1)--}}
                                            {{--: Administrator--}}
                                        {{--@elseif(Auth::user()->role == 2)--}}
                                            {{--: Operator--}}
                                        {{--@elseif(Auth::user()->role == 3)--}}
                                            {{--: Kepala Sekolah--}}
                                        {{--@elseif(Auth::user()->role == 4)--}}
                                            {{--: {{$user->teacher->name}}--}}
                                        {{--@elseif(Auth::user()->role == 5)--}}
                                            {{--: {{$user->student->name}}--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--@if(Auth::user()->role == 4)--}}
                                        {{--<td>Date of date:</td>--}}
                                        {{--<td>: {{$user->teacher->birth}}</td>--}}
                                    {{--@elseif(Auth::user()->role == 5)--}}
                                        {{--<td>Date of date:</td>--}}
                                        {{--<td>: {{$user->student->birth}}</td>--}}
                                    {{--@endif--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--@if(Auth::user()->role == 4)--}}
                                        {{--<td>Gender</td>--}}
                                        {{--<td>: {{$user->teacher->gender}}</td>--}}
                                    {{--@elseif(Auth::user()->role == 5)--}}
                                        {{--<td>Gender</td>--}}
                                        {{--<td>: {{$user->student->gender}}</td>--}}
                                    {{--@else--}}
                                        {{--<td>Gender</td>--}}
                                        {{--<td>: Male</td>--}}
                                    {{--@endif--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Home Address</td>--}}
                                    {{--<td>Metro Manila,Philippines</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Email</td>--}}
                                    {{--<td>--}}
                                        {{--@if(Auth::user()->role == 1)--}}
                                            {{--: {{$user->email}}--}}
                                        {{--@elseif(Auth::user()->role == 2)--}}
                                            {{--: {{$user->email}}--}}
                                        {{--@elseif(Auth::user()->role == 3)--}}
                                            {{--: {{$user->email}}--}}
                                        {{--@elseif(Auth::user()->role == 4)--}}
                                            {{--: {{$user->email}}--}}
                                        {{--@elseif(Auth::user()->role == 5)--}}
                                            {{--: {{$user->email}}--}}
                                        {{--@endif--}}
                                {{--</tr>--}}
                                {{--<td>Phone Number</td>--}}
                                {{--<td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)--}}
                                {{--</td>--}}

                                {{--</tr>--}}

                                {{--</tbody>--}}
                            {{--</table>--}}

                            {{--<a href="#" class="btn btn-primary">My Sales Performance</a>--}}
                            {{--<a href="#" class="btn btn-primary">Team Sales Performance</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel-footer">--}}
                        {{--<span class="pull-right">--}}
                            {{--<a href="" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>--}}
                            {{--<a href="/" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>--}}
                        {{--</span>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 toppad" >--}}
            {{--@include('partials.time_line')--}}
        {{--</div>--}}
    {{--</div>--}}


    </div>
@stop