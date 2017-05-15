@extends('app')

@section('content')
    <div class="page-title">
        <h3>Account Validation</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        @include('partials.navbar.date')
    </div>

    <div class="container">
        <div class="row">
            <br>
            <br>
            <legend style="text-align: center">Silahkan Lakukan Validasi Account Anda.</legend>
            @include('partials.error')
        </div>
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Account</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Data Pribadi</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Validasi</p>
                </div>
            </div>
        </div>
        {!!Form::model($user, ['route' => ['validation.update', $user->id], 'method' => 'PATCH', 'files' => true])!!}
            <div class="row setup-content" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-6 col-md-offset-3">
                        <h3>Account</h3>
                        <div class="form-group">
                            {!!Form::label('email', 'Email Address :', ['class' => 'control-label'])!!}
                            {!!Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Email Address'])!!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('password', 'Password :', ['class' => 'control-label'])!!}
                            {!!Form::password('password', ['class' => 'form-control', 'confirmed', 'placeholder' => 'New Password', 'required'])!!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label'])!!}
                            {!!Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Re-type Password', 'required'])!!}
                        </div>
                        {!!Form::button('Next', ['class' => 'btn btn-primary nextBtn pull-right'])!!}
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div id="bio" class="col-xs-12">
                    <div class="col-md-8 col-md-offset-2" id="biodata" >
                        @include('validation.'.Auth::user()->role)
                    </div>
                    <div class="col-md-offset-3 col-md-6">
                        {!!Form::button('Next', ['class' => 'btn btn-primary nextBtn pull-right'])!!}
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!Form::label('thumbnail', 'Photo Profile', ['class' => 'control-label'])!!}
                            {!!Form::file('thumbnail')!!}
                        </div>
                        <!-- <div class="form-group">
                            {!! Recaptcha::render() !!}
                        </div> -->
                        <button class="btn btn-success btn-md pull-right" type="submit">Finish!</button>
                    </div>
                </div>
            </div>
        {!!Form::close()!!}
    </div>
@endsection

@section('footer')
    <!-- Recaptcha -->
    {!!Html::script(asset('js/api.js'))!!}

    <style>
        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>

    <script>
        $(document).ready(function () {


            var navListItems = $('div.setup-panel div a'),
                    allWells = $('.setup-content'),
                    allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                        $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                        curStepBtn = curStep.attr("id"),
                        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                        curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'],input[type='password'],input[type='date']"),
                        isValid = true;

                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>
@endsection