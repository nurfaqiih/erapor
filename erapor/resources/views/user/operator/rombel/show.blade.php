@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')
        <div>
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Operator</li>
                        <li><a href="{{route('kelas.index')}}">Kelas</a></li>
                        <li class="active">{{$rombel->id}}</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div> 
            <div class="container-fluid" style="margin: 20px">
                <legend>Kelas : {{$rombel->name}}</legend>
                <div>
                    <ul class="list-unstyled mailbox-nav">
                        <li><a>Wali Kelas : {{$rombel->teacher->name}}</a></li>
                        <li><a>Jumlah Siswa : {{$rombel->student->count()}} Orang</a></li>
                        <!-- <li> -->
                            <a href="{{route('kelas.edit', ['id' => $rombel->id])}}"
                                class="btn btn-primary btn-md" 
                            >
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                    </ul>
                </div>
                <div>
                    <div class="panel-body">
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>NISN</th>
                                <th>BP</th>
                                <th>Name</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Lihat Rapor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rombel->student as $student)
                                <tr>
                                    <td>
                                        {!!link_to_route('students.show', $student->nis, ['id' => $student->id])!!}
                                    </td>
                                    <td>{{$student->bp}}</td>
                                    <td>{{$student->name}}</td>
                                    @if($student->gender == 1)
                                        <td>Laki - Laki</td>
                                    @elseif($student->gender == 2)
                                        <td>Perempuan</td>
                                    @endif
                                    <td>{{$student->birth}}</td>
                                    <td>{{$student->birth_place}}</td>
                                    <td>
                                        <button 
                                            class="btn btn-primary btn-xs" 
                                            v-on="click: rapor({{$rombel->id}}, {{$student->id}}, {{1}})"
                                        >
                                            <span class="fa fa-file"> Semester 1</span>
                                        </button>
                                        <button 
                                            class="btn btn-primary btn-xs" 
                                            v-on="click: rapor({{$rombel->id}}, {{$student->id}}, {{2}})"
                                        >
                                            <span class="fa fa-file"> Semester 2</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                         @include('partials.delete', ['route' => 'kelas.destroy', 'id' => $rombel->id])
                    </div>
                </div>
            </div>
        </div>
        @include('partials.rapor.rapor')
    </div>
@endsection

@section('script')
    {!!Html::script(asset('js/vue/rombel-show.js'))!!}
@endsection