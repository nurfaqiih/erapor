<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Erapor</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @unless(Auth::guest())
                    <li><a href="{{ url('/') }}"><span class="fa fa-home"></span> Home</a></li>
                @endunless

                @if(Auth::check())
                    @include('partials.navbar.'.\Auth::user()->role)
                @endif


            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                                {{Auth::user()->name}}
                                {!!Html::image(Auth::user()->thumbnail, null, ['height' =>23, 'width' => 23, 'class' => 'img-circle'])!!}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('account.profiles', Auth::user()->id) }}"><span class="fa fa-user"></span> Profile</a>
                            </li>
                            <li>
                                <a href="{{route('account.setting', Auth::user()->id)}}"><span class="fa fa-wrench"></span> Change Password</a>
                            </li>
                            <li role="presentation" class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}"><span class="fa fa-sign-out"></span> Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>