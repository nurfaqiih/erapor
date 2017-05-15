<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href={{asset('images/favicon.ico')}}>
    <title>E-Rapor</title>
    <style type="text/css">
        .error {
  margin: 0 auto;
  text-align: center;
}

.error-code {
  bottom: 60%;
  color: #2d353c;
  font-size: 96px;
  line-height: 100px;
}

.error-desc {
  font-size: 12px;
  color: #647788;
}

.m-b-10 {
  margin-bottom: 10px!important;
}

.m-b-20 {
  margin-bottom: 20px!important;
}

.m-t-20 {
  margin-top: 20px!important;
}
    </style>
    {!!Html::style(elixir('css/app.css'))!!}
</head>
<body>
    <div class="error">
        <div class="error-code m-b-10 m-t-20"><i class="fa fa-warning"></i><br>Coming Soon</div>
        <h3 class="font-bold">Rapor untuk periode ini belum dapat diakses. <br> Lihat kembali tanggal : {{Config::get('kalender.open')}}</h3>

        <div class="error-desc">
            Sorry, but the page you are looking for was either not found or does not exist. <br/>
            Try refreshing the page or click the button below to go back to the Homepage.
        <div>
            <a class=" login-detail-panel-button btn" href="{{route('home')}}">
                <i class="fa fa-arrow-left"></i>
                Go back to Homepage                        
            </a>
        </div>
    </div>
</div>
</body>
</html>
