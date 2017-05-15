<div id="lihatNilai" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="text-center" id="loading" v-if="loading">
			<h3>Loading Data, Please Wait ...</h3>
		<i class="fa fa-refresh fa-spin fa-3x"></i>
        </div>
    	<div class="modal-header" v-if="!loading">
    		<div class="row" v-if="!loading">
			    <div class="col-xs-3">
			        Mata Pelajaran<br>
        			Nama Pendidik<br>
    			</div>
    			<div class="col-xs-4">
        			: @{{rapor.section.teacher.course.name}} <br>
        			: @{{rapor.section.teacher.name}}<br>
    			</div>
    			<div class="col-xs-2 col-xs-offset-1">
        			Semester <br>
        			Tahun Pelajaran <br> 
    			</div>
    			<div class="col-xs-2">
        			: @{{rapor.semester}}<br>
        			: @{{rapor.year}}<br>
    			</div> 
			</div>
    	</div>
    	<div class="modal-body" v-if="!loading">
    		<table class="table table-condensed">
    			<thead>
    				<tr>
    					<th colspan="2">Pengetahuan (K3)</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td>Nilai Ulangan Harian</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.NH}}"></td>
    				</tr>
    				<tr>
    					<td>Nilai Ulangan Tengah Semester</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.UTS}}"></td>
    				</tr>
    				<tr>
    					<td>Nilai Ulangan Akhir Semester</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.UAS}}"></td>
    				</tr>
    				<tr>
						<td>Deskripsi Pengetahuan</td>
						<td><textarea cols="50" rows="5" disabled="disabled">@{{rapor.desc_knowledge}}</textarea></td>
					</tr>
    			</tbody>
    			<thead>
    				<tr>
    					<th colspan="2">Keterampilan (K4)</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td>Nilai Pratikum</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.NPr}}"></td>
    				</tr>
    				<tr>
    					<td>Nilai Projek</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.NPj}}"></td>
    				</tr>
    				<tr>
    					<td>Nilai Portofolio</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.NPo}}"></td>
    				</tr>
    				<tr>
						<td>Deskripsi Keterampilan</td>
						<td><textarea cols="50" rows="5" disabled="disabled">@{{rapor.desc_skill}}</textarea></td>
					</tr>
    			</tbody>
    			<thead>
    				<tr>
    					<th>Sikap Sosial Dan Spiritual (K1 K2)</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td>Nilai Observasi</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.NO}}"></td>
    				</tr>
    				<tr>
    					<td>Nilai Diri Sendiri</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.NDs}}"></td>
    				</tr>
    				<tr>
    					<td>Nilai Antar Teman</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.NAt}}"></td>
    				</tr>
    				<tr>
    					<td>Nilai Jurnal</td>
    					<td><input type="text" disabled="disabled" value="@{{rapor.NJ}}"></td>
    				</tr>
    				<tr>
						<td>Deskripsi Sikap</td>
						<td><textarea cols="50" rows="5" disabled="disabled">@{{rapor.desc_attitude}}</textarea></td>
					</tr>
    			</tbody>
    		</table>
    	</div>
    </div>
  </div>
</div>