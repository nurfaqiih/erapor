@extends('app')

@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{route('admin.index')}}">Home</a></li>
                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>

    <div id="dashboard" class="container-fluid" style="margin-top: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                @include('user.admin.layout.menu')
            </ul>
            <img src="/images/sma7.gif" class="img-responsive hidden-xs hidden-sm" alt="Responsive image">
        </div>
        <div class="col-md-10">
            @include('partials.info-box')
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="panel">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Data Pendidik dan Peserta Didik</h4>
                                </div>
                                <div class="panel-body">
                                    <canvas id="user-report" class="col-sm-12 col-xs-12"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stats-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Users Stats</h4>
                                    </div>
                                    <div class="panel-body">
                                        <ul class="list-unstyled">
                                            <li>Peserta Didik<div id="student" class="text-success pull-right">{{$chart['student']}} Orang</div></li><br>
                                            <input type="hidden" v-model="student" value="{{$chart['student']}}">
                                            <li>Pendidik<div class="text-success pull-right">{{$chart['teacher']}} Orang</div></li><br>
                                            <input type="hidden" v-model="teacher" value="{{$chart['teacher']}}">
                                            <li>Kepala Sekolah<div class="text-success pull-right">{{$chart['kepala']}} Orang</div></li><br>
                                            <input type="hidden" v-model="kepala" value="{{$chart['kepala']}}">
                                            <li>Operator<div class="text-success pull-right">{{$chart['op']}} Orang</div></li><br>
                                            <input type="hidden" v-model="op" value="{{$chart['op']}}">
                                            <li>Administrator<div class="text-success pull-right">{{$chart['admin']}} Orang</div></li>
                                            <input type="hidden" v-model="admin" value="{{$chart['admin']}}">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4>User Activity</h4>
                        </div>
                        <div class="panel-body">
                            <div class="inbox-widget slimscroll">
                                @include('partials.activity.list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
    
@endsection

@section('script')
    {!!Html::script(asset('js/dashboard.js'))!!}
@endsection