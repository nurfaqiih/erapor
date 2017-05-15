@extends('partials.profile.layout')

@section('main')
    <div class="profile-timeline">
        <ul class="list-unstyled">
            <li class="timeline-item">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="timeline-item-header">
                            <img src="{{asset('assets/images/avatar3.png')}}" alt="">
                            <p>Christopher palmer <span>Posted a Status</span></p>
                            <small>5 hours ago</small>
                        </div>
                        <div class="timeline-item-post">
                            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                            <div class="timeline-options">
                                <a href="#"><i class="icon-like"></i> Like (7)</a>
                                <a href="#"><i class="icon-bubble"></i> Comment (2)</a>
                            </div>
                            <div class="timeline-comment">
                                <div class="timeline-comment-header">
                                    <img src="{{asset('assets/images/avatar5.png')}}" alt="">
                                    <p>Nick Doe <small>1 hour ago</small></p>
                                </div>
                                <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                            </div>
                            <div class="timeline-comment">
                                <div class="timeline-comment-header">
                                    <img src="{{asset('assets/images/avatar2.png')}}" alt="">
                                    <p>Sandra Smith <small>3 hours ago</small></p>
                                </div>
                                <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div>
                            <textarea class="form-control" placeholder="Replay"></textarea>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection