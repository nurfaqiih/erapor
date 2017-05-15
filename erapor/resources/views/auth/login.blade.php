@extends('app')

@section('content')
<main class="page-content">
    <div class="page-inner">
        <div id="main-wrapper">
            <div class="row">
                    <div class="login-box col-md-4 col-sm-8 col-xs-8 col-md-push-4 col-sm-push-2 col-xs-push-2">
                        <a href="/" class="logo-name text-lg text-center">E-RAPOR</a>
                        <p class="text-center m-t-md">Please login into your account.</p>
                        @include('partials.error')
                        {!!Form::open(['url' => '/auth/login', 'class' => 'm-t-md'])!!}
                            <div class="form-group">
                                {!!Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required', 'autofocus'])!!}
                            </div>
                            <div class="form-group">
                                {!!Form::password('password', ['class' => 'form-control pwd', 'required', 'placeholder' => 'Password'])!!}
                            </div>
                        {!!Form::submit('Login', ['class' => 'btn btn-block btn-primary'])!!}
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                        <div class="text-center">
                            <a href="#" data-target="#pwdModal" data-toggle="modal">Forgot your password?</a>
                        </div>                            
                        {!!Form::close()!!}
                        <p class="text-center m-t-xs text-sm">2015 &copy; ERAPOR KURIKULUM 2013</p>
                    </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
    </div><!-- Page Inner -->
</main><!-- Page Content -->
@endsection

@section('footer')
    @include('auth.password')
@endsection