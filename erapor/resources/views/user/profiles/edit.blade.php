@extends('partials.profile.layout')

@section('main')
    <div class="profile-timeline">
        <ul class="list-unstyled">
            <li class="timeline-item">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="timeline-item-header">
                            <legend>Edit User Profile</legend>
                            @include('partials.error')
                        </div>
                        {!!Form::model($user, ['route' => ['profiles.update', $user->id], 'method' => 'PATCH'])!!}
                        <div class="timeline-item-post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-envelope-o"></span></div>
                                    {!!Form::email('email', null,  ['class' => 'form-control', 'placeholder' => 'Email Address'])!!}
                                </div>
                            </div>
                            <div class="timeline-options"></div>
                            <div class="timeline-comment">
                                <div class="timeline-comment-header">
                                    {!!Form::submit('Save', ['class' => 'btn btn-primary pull-right'])!!}
                                </div>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection