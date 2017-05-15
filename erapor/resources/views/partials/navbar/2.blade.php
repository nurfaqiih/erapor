<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
       aria-expanded="false"><span class="fa fa-bookmark"></span> Akademik</a>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route('section.index') }}"><span class="fa fa-tags"></span> Seksi</a>
        </li>

        <li role="presentation" class="divider"></li>

        <li>
            <a href="{{ route('course.index') }}"><span class="fa fa-book"></span> Mata Pelajaran</a>
        </li>

        <li role="presentation" class="divider"></li>

        <li>
            <a href="{{ route('kelas.index') }}"><span class="fa fa-users"></span> Kelas</a>
        </li>

        <li role="presentation" class="divider"></li>

        <li>
            <a href="{{ route('lokal.index') }}"><span class="fa fa-columns"></span> Lokal</a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('teachers.index') }}"><span class="fa fa-briefcase"></span> Pendidik</a>
</li>

<li>
    <a href="{{ route('students.index') }}"><span class="fa fa-graduation-cap"></span> Peserta Didik</a>
</li>
<li>
    <a href="{{route('operator.kalender')}}"><span class="fa fa-cogs"></span> Setting Kalender Akademik</a>
</li>