<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
       aria-expanded="false"><span class="fa fa-tags"></span> Section</a>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route('section.index') }}"><span class="fa fa-bars"></span> Lihat Section</a>
        </li>
        <li>
            <a href="{{ route('section.create') }}"><span class="fa fa-plus"></span>Buat Section</a>
        </li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
       aria-expanded="false"><span class="fa fa-tasks"></span> Kelas</a>
    <ul class="dropdown-menu" role="menu">
        <li role="presentation" class="dropdown-header">Lihat Kelas</li>
        <li>
            <a href="{{ route('kelas.tingkat', ['tingkat' => 'X']) }}"> Kelas X</a>
        </li>
        <li>
            <a href="{{ route('kelas.tingkat', ['tingkat' => 'XI']) }}"> Kelas XI</a>
        </li>
        <li>
            <a href="{{ route('kelas.tingkat', ['tingkat' => 'XII']) }}"> Kelas XII</a>
        </li>

        <li role="presentation" class="divider"></li>
        <li>
            <a href="{{route('kelas.create')}}"><span class="fa fa-plus"></span> Create Kelas</a>
        </li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
       aria-expanded="false"><span class="fa fa-users"></span> Rombongan Belajar</a>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route('rombel.index') }}"><span class="fa fa-bars"></span> Lihat Rombongan Belajar</a>
        </li>
        <li>
            <a href="{{ route('rombel.create') }}"><span class="fa fa-plus"></span> Buat Rombongan</a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('course.index') }}"><span class="fa fa-book"></span> Mata Pelajaran</a>
</li>

<li>
    <a href="{{ route('kelas.index') }}"><span class="fa fa-briefcase"></span> Pendidik</a>
</li>

<li>
    <a href="{{ route('students.index') }}"><span class="fa fa-graduation-cap"></span> Peserta Didik</a>
</li>