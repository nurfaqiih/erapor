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
                            <h3>SMK YWKA Medan</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 user-profile">
                        <h3 class="text-center">{{$name}}</h3>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        @include('flash::message')
                        @include('user.profiles.'.Auth::user()->role)
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop