        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <blockquote style="color: #ffffff; padding: initial">E-RAPOR SMK YWKA MEDAN 7</blockquote>
                </li>
                <li>
                    <a href="{{ route('section.index') }}"><span class="fa fa-tags"></span> Seksi</a>
                </li>
                <li>
                    <a href="{{ route('course.index') }}"><span class="fa fa-book"></span> Mata Pelajaran</a>
                </li>
                <li>
                    <a href="{{ route('kelas.index') }}"><span class="fa fa-users"></span> Kelas</a>
                </li>
                <li>
                    <a href="{{ route('lokal.index')}}"><span class="fa fa-columns"></span> Lokal</a>
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
                <li>
                  .
                </li>
                <li>
                    <a href="{{ route('account.profiles', Auth::user()->id) }}"><span class="fa fa-user"></span>Profile</a>
                </li>
                <li>
                    <a href="{{ url('/auth/logout') }}"><span class="fa fa-sign-out"></span> Logout</a>
                </li>
            </ul>
        </div>