@extends('app')

@section('content') 
        <div id="wrapper">

        @include('partials.op-side-menu')

        <!-- Page Content -->
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Operator</li>
                    </ol>
                </div>
                @include('partials.navbar.date')                
            </div>
            <br>
            <div class="container-fluid">        
                <div class="col-lg-12">                        
                    @include('partials.info-box')
                    <div class="jumbotron">
                        <h1>Selamat Datang, Operator</h1>
                        <p>Silahkan manfaatkan aplikasi ini dengan sebaiknya. Jaga kerahasian username dan password anda.</p>
                    </div>
                    <div>
                        <a href="{{route('new_semester')}}" class="btn btn-primary btn-lg"><li class="fa fa-plus"></li> Semester/Tahun Ajaran Baru</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection

@section('script')
    <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 3000
            });
        });
        $("#menu-toggle").click(function(e) {
             e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    {!!Html::script(asset('js/vue/operator-index.js'))!!}
@endsection