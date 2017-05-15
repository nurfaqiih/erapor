<!DOCTYPE html>
<html>
    <head>        
        <!-- Title -->
        <title>E-Rapor | Welcome Page</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href={{asset('images/favicon.ico')}}>

        <!-- Styles -->
        {!!Html::style(elixir('css/app.css'))!!}
        {!!Html::style(elixir('css/welcome.min.css'))!!}
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500,400,300' rel='stylesheet' type='text/css'>
    </head>
    <body data-spy="scroll" data-target="#header">
        <div class="home" id="home">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="home-text col-md-8">
                        <h1 class="wow fadeInDown" data-wow-delay="1.5s" data-wow-duration="1.5s" data-wow-offset="10">Selamat Datang di Aplikasi E-Rapor SMK YWKA Medan.</h1>
                        <p class="lead wow fadeInDown" data-wow-delay="2s" data-wow-duration="1.5s" data-wow-offset="10">Jl.Lampu no.7 Pulo Brayan.<br>Medan Timur.</p>
                        <a href="{{route('auth.login')}}" class="btn btn-success btn-rounded btn-lg wow fadeInUp" data-wow-delay="2.5s" data-wow-duration="1.5s" data-wow-offset="10"><span class="fa fa-sign-in"></span> Sign In</a>
                    </div>
                    <div class="scroller">
                        <div class="mouse"><div class="wheel"></div></div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <p class="text-center no-s">2017 &copy; E-Rapor by KHZ Techno.</p>
            </div>
        </footer>
        {!!Html::script(elixir('js/app.js'))!!}
        {!!Html::script(elixir('js/welcome.min.js'))!!}
    </body>
</html>