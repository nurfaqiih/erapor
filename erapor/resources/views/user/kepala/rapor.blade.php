@extends('app')

@section('content')
	<div class="page-title">
        {{--The dummy space--}}
        @include('partials.navbar.date')
    </div>
    <div id="main" class="container-fluid" style="margin: 20px">
        <div class="col-md-2">
            <ul class="list-unstyled mailbox-nav">
                @include('user.kepala.layout.menu')
            </ul>
        </div>
        <div class="col-md-10">
            <h1 class="text-center">Master Data Rapor SMA N 7 Padang</h1>
            <div class="panel">
            	<div class="panel-heading">
            		<div class="form-group col-md-4">
            			<select class="form-control" v-model="year" v-on="change: fetchRombel(year)">
            				<option selected="selected" value="0">Pilih Tahun Ajar</option>
            				<option v-repeat="ta: tahunAjar" value="@{{ta.year}}">@{{ta.year}}</option>
            			</select>
            		</div>
            		<div class="form-group col-md-4">
            			<select class="form-control" v-model="rombel" v-attr="disabled: year==0">
            				<option selected="selected" value="0">Pilih Rombongan Belajar</option>
            				<option value="@{{k.id}}" v-repeat="k: kelas">@{{k.name}}</option>
            			</select>
            		</div>
            		<button class="btn btn-info" v-attr="disabled: year==0 || rombel==0" v-on="click: hasil(rombel)"><span class="fa fa-search"></span> Cari Data</button> <br>
            	</div>
            	<div class="panel-body">
            		<br>
            		<legend>Hasil Pencarian</legend>
            		<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                            	<th>NO.</th>
                                <th>Nomor Induk Siswa Nasionam</th>
                                <th>BP</th>
                                <th>Name</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Lihat Rapor</th>
                            </tr>
                            </thead>
                            <tbody>                            
                                <tr v-repeat="student: result.student" class="@{{$index}}">
                                	<td>@{{$index+1}}</td>
                                    <td>
                                        @{{student.nis}}
                                    </td>
                                    <td>@{{student.bp}}</td>
                                    <td>@{{student.name}}</td>                                    
                                    <td v-if="student.gender==1">Laki - Laki</td>
                                    <td v-if="student.gender==2">Perempuan</td>
                                    <td>@{{student.birth}}</td>
                                    <td>@{{student.birth_place}}</td>
                                    <td>
                                        <button 
                                            class="btn btn-primary btn-xs btn-block" 
                                            v-on="click: rapor(result.id, student.id, 1)"
                                        >
                                            <span class="fa fa-file"> Semester 1</span>
                                        </button>
                                        <button 
                                            class="btn btn-primary btn-xs btn-block" 
                                            v-on="click: rapor(result.id, student.id, 2)"
                                        >
                                            <span class="fa fa-file"> Semester 2</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            	</div>
            </div>
        </div>
        @include('partials.rapor.rapor')
    </div>
@endsection

@section('script')
	{!!Html::script('js/vue/kepala/rapor.js')!!}
@endsection