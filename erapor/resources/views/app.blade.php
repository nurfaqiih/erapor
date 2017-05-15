<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href={{asset('images/favicon.ico')}}>
    <title>Erapor</title>

    <!-- Styles -->
    {!!Html::style(elixir('css/app.css'))!!}
    {!!Html::style(elixir('css/e-rapor.css'))!!}
    {!!Html::style('//fonts.googleapis.com/css?family=Roboto:400,300')!!}

</head>
<body id="body" style="padding-top: 40px">

@include('partials.navbar')

@yield('content')

<!-- Scripts -->

{!!Html::script(asset('js/vue.min.js'))!!}
{!!Html::script(asset('js/vue-resource.min.js'))!!}
{!!Html::script(asset('js/vue-validator.js'))!!}
{!!Html::script(elixir('js/app.js'))!!}
{!!Html::script(asset('js/jquery.slimscroll.min.js'))!!}

<script type="text/javascript">
    $('div.alert').not('.important').delay(1000).fadeIn(300).delay(5000).fadeOut(300);
    $('div.flash').delay(1000).fadeIn(300).delay(5000).fadeOut(300);
</script>

@yield('footer')

@yield('script')
</body>
</html>
