<li>
    <a href="{{route('teacher.akademik')}}"><span class="fa fa-institution"></span> Kelas yang Diajar</a>
@if(Auth::user()->teacher->rombel != null)
</li>
	<li>
        <a href="{{route('teacher.walas')}}"><span class="fa fa-database"></span> Wali Kelas</a>
	</li>
	@if(Config::get('kalender.semester') == 2 &&
		Carbon\Carbon::now()->format('Y-m-d') > Config::get('kalender.expire') &&
		Config::get('kalender.open') > Carbon\Carbon::now()->format('Y-m-d')
	)
	<li>
   		<a href="{{route('teacher.edit.kenaikan')}}"><span class="fa fa-level-up"></span> Kenaikan Kelas</a>
	</li>
	@endif
@endif