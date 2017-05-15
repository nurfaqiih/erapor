<img src="{{Auth::user()->thumbnail}}" class="img-rounded" width="100" height="100">
<ul class="list-unstyled mailbox-nav">
    <li><a href="{{route('student.course')}}"><i class="fa fa-database"></i>Daftar Mata Pelajaran</a></li>
    <li><a href="{{route('student.rapor')}}"><i class="fa fa-file"></i> Rapor</a></li>
	<li><a href="{{route('student.historis')}}" ><i class="fa fa-clock-o"></i> Historis Rapor</a></li>
</ul>