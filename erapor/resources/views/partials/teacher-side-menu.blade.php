<div class="col-md-2">
    <ul class="list-unstyled mailbox-nav">
        <li><a>{!!Html::image('/images/sma7.gif', 'profile', ['class' => 'img-rerponsive', 'height' => 147, 'width' => 183])!!}</a></li>
        <li><a href="{{route('teacher.akademik')}}"><i class="fa fa-institution"></i>Kelas yang Diajar</a></li>
        @if(Auth::user()->teacher->rombel != null)
            <li><a href="{{route('teacher.walas')}}"><i class="fa fa-user"></i> Wali Kelas</a> </li>
            @if(Config::get('kalender.semester') == 2 &&
				Carbon\Carbon::now()->format('Y-m-d') > Config::get('kalender.expire') &&
				Config::get('kalender.open') > Carbon\Carbon::now()->format('Y-m-d')
			)
            <li>
            	<a href="{{route('teacher.edit.kenaikan')}}"><span class="fa fa-level-up"></span> Kenaikan Kelas</a>
            </li>
            @endif
        @endif
    </ul>
</div>