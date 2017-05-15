<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
       aria-expanded="false"><span class="fa fa-users"></span> Users</a>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{route('admin.create')}}"><span class="fa fa-plus"></span> Buat User</a>
        </li>
        <li><a href="{{route('admin.teacher')}}"><span class="fa fa-briefcase"></span>
                Guru</a></li>
        <li><a href="{{route('admin.student')}}"><span class="fa fa-graduation-cap"></span>
                Siswa</a></li>
    </ul>
</li>
<li><a href="{{ route('admin.index') }}"><span class="fa fa-home"></span> Section</a></li>