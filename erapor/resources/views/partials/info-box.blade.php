<div class="row">
    <div class="col-lg-3 col-md-6 col-xs-6">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p class="counter">{{$user}}</p>
                    <span class="info-box-title">Total User</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$user/$user*100}}" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-6">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p class="counter">{{$student}}</p>
                    <span class="info-box-title">Students</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$student/$user*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$student/$user*100}}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-6">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p><span class="counter">{{$teacher}}</span></p>
                    <span class="info-box-title">Teacher</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-briefcase"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{$teacher/$user*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$teacher/$user*100}}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-6">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p class="counter">{{$activity}}</p>
                    <span class="info-box-title">Aktifitas User</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>