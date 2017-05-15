@extends('app')

@section('content')
    <div class="page-title">
        {{--The dummy space--}}
        @include('partials.navbar.date')
    </div>
    <div class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                @include('user.kepala.layout.menu')
            </ul>
        </div>
        <div class="col-md-10">
            <div class="jumbotron">
                <h1>Selamat Datang, {{Auth::user()->name}}</h1>
                <p>Silahkan ginakan aplikasi ini dengan sebaiknya, dan jaga kerahasiaan email, username, dan password Anda!!!</p>
            </div>
            @include('partials.info-box')
        </div>
    </div>
@stop