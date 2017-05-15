@extends('app')

@section('content')
    <div class="page-title">
        @include('partials.navbar.date')
    </div>
    <div class="container-fluid" style="margin-top: 20px">
        <div class="col-md-2" style="">
            <ul class="list-unstyled mailbox-nav">
                @include('user.admin.layout.menu')
            </ul>
            <img src="/images/sma7.gif" class="img-responsive hidden-sm hidden-xs" alt="Responsive image">
        </div>
        <div class="col-md-10">
            <div class="jumbotron">
                <h1>Hello, Admin!</h1>
                <p>Welcome back</p>
            </div>            
        </div>
    </div>
@stop

@section('footer')
    <div id="rapor" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Reset Database</h4>
                </div>
                <div class="modal-body text-center">
                    {{--{!!Form::open(['route' => 'delete.database'])!!}--}}
                    Are You Sure to Delete this all record??
                    {!! Recaptcha::render() !!}
                </div>
                <div class="modal-footer">
                    {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 3000
            });
        });
        $('div.jumbotron').delay(2000).fadeIn(300);
    </script>
@endsection