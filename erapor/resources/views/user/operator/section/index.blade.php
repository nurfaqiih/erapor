@extends('app')

@section('content')
    <div id="wrapper">
        @include('partials.op-side-menu')    
        <div>        
            @include('flash::message')
            <div class="page-title">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{route('operator.index')}}">Home</a></li>
                        <li class="active">Operator</li>
                        <li class="active">Section</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            <h3 style="text-align: center">Master Data Seksi</h3>
            <a href="{{route('section.create')}}" class="btn btn-default"><span class="fa fa-plus"></span> New Seksi</a>
            <button class="btn btn-danger" v-on="click: show = !show"><span class="fa fa-trash"></span> Multiple Delete</button>
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('partials.rapor.upload', ['export' => 'export.section', 'import' => 'import.section'])
                    {!!Form::open(['url' => 'section-delete'])!!}
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Kode Seksi</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Pendidik</th>
                            <th>Tahun Ajar</th>
                            <th>Upadate Terakhir</th>
                            <th v-show="!show">Action</th>
                            <th v-show="show">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>
                                    {!!link_to_route('section.show', $section->kode, ['id' => $section->id], ['class' => 'text-capitalize'])!!}
                                </td>
                                <td>{{$section->kelas->tingkat.' '.$section->kelas->jurusan.' '.$section->kelas->no}}</td>
                                <td>{{$section->course->name}}</td>
                                <td>{{$section->teacher->name}}</td>
                                <td>{{$section->year}}</td>
                                <td>{{$section->updated_at}}</td>
                                <td class="text-center" v-show="!show">
                                    @include('partials.pilihan-table', [
                                        'route' => 'section',
                                        'id' => $section->id
                                    ])                                    
                                </td>
                                <td v-show="show" class="text-center">
                                    <input type="checkbox" name="checked[]" value="{{$section->id}}">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-danger btn-block" v-show="show"> Hapus data</button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('script')
    {!!Html::script(asset('js/vue/section-index.js'))!!}
@endsection