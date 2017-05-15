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
                        <li class="active">Kalender Akademik</li>
                    </ol>
                </div>
                @include('partials.navbar.date')
            </div>
            <br>
            <div class="container-fluid">        
                <div class="col-lg-12">                        
					<h2>Pengaturan Kalender Akademik</h2>
					<p>Merupakan pengaturan tahun ajar dan semester yang sedang berlangsung di sekolah.</p>
					<p class="text-danger"><span class="fa fa-warning"></span> 
						Jangan lakukan pergantian semester atau tahun ajar ketika proses 
						dalam proses pembelajaran pada semester atau tahun ajar tersebut berlangsung.
					</p>
					<div class="text-center" id="loading" v-if="loading">
                        <h3>Loading Data, Please Wait ...</h3>
                        <i class="fa fa-refresh fa-spin fa-3x"></i>
                    </div>
					<div v-if="!loading">
						<table width="500px" border="1">
							<tbody>
								<tr>
									<td>Tahun Ajar</td>
									<td>: <b>@{{kalender.year}}</b></td>
								</tr>
								<tr>
									<td>Semester</td>
									<td>: <b>@{{kalender.semester}}</b></td>
								</tr>
								<tr>
									<td>Tanggal Batas Entry Nilai</td>
									<td>: <b>@{{kalender.expire}}</b></td>
								</tr>
								<tr>
									<td>Tanggal Akses Rapor</td>
									<td>: <b>@{{kalender.open}}</b></td>
								</tr>
							</tbody>
						</table>
						<br>
						<legend>Ubah Kalender Akademik</legend>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="year">Tahun Ajar : </label>
								<select id="year" class="form-control" v-model="newKalender.year">
									<option selected="selected" value="0">Pilih Tahun Ajar</option>
									<option v-repeat="10" class="@{{$index}}" value="@{{2015 + $index}}/@{{2016 + $index}}">@{{2015 + $index}}/@{{2016 + $index}}</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="semester">Semester : </label>
								<select id="semester" class="form-control" v-model="newKalender.semester">
									<option selected="selected" value="0">Pilih Semester</option>
									<option value="1">Semester 1</option>
									<option value="2">Semester 2</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="expire">Batas Entry Nilai :</label>
								<input id="expire" type="date" class="form-control" required="required" v-model="newKalender.expire" value="">
							</div>
							<div class="form-group col-md-4">
								<label for="open">Tanggal Akses Rapor :</label>
								<input id="open" type="date" class="form-control" v-model="newKalender.open" required="required" value="">
							</div>
						</div>
							<button class="btn btn-info" 
								v-attr="disabled: newKalender.year==0 || newKalender.semester==0 || newKalender.expire==0 || newKalender.open==0"
								v-on="click: alert"
							>
								<span class="fa fa-save"></span> Simpan
							</button>
					</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
	{!!Html::script('js/vue/kalender.js')!!}
@endsection