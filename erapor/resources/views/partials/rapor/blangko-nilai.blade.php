<table class="table">
	<thead>
		<tr>
			<th colspan="2">Sikap Sosial dan Spiritual (K1 dan K2)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="35%">Nilai Observasi</td>
			<td>: <input number name="NO" type="text" v-model="rapor.NO" v-on="keyup: validation(rapor.NO, 'NO')">
				@include('partials.rapor.errors', ['var' => 'NO'])
			</td>
		</tr>
		<tr>
			<td>Nilai Diri Sendiri</td>
			<td>: <input number name="NDs" type="text" v-model="rapor.NDs" v-on="keyup: validation(rapor.NDs, 'NDs')">
				@include('partials.rapor.errors', ['var' => 'NDs'])
			</td>
		</tr>
		<tr>
			<td>Nilai Antar Teman</td>
			<td>: <input number name="NAt" type="text" v-model="rapor.NAt" v-on="keyup: validation(rapor.NAt, 'NAt')">
				@include('partials.rapor.errors', ['var' => 'NAt'])
			</td>
		</tr>
		<tr>
			<td>Nilai Jurnal</td>
			<td>: <input number name="NJ" type="text" v-model="rapor.NJ" v-on="keyup: validation(rapor.NJ, 'NJ')">
				@include('partials.rapor.errors', ['var' => 'NJ'])
			</td>
		</tr>
		<tr>
			<td>Deskripsi Sikap</td>
			<td>&nbsp; <textarea cols="50" rows="5" name="desc_attitude" v-model="rapor.desc_attitude"></textarea></td>
		</tr>
	</tbody>
	<thead>
		<tr>
			<th colspan="2">Pengetahuan (K3)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Nilai Ulangan Harian</td>
			<td>: <input number name="NH" type="text" v-model="rapor.NH" v-on="keyup: validation(rapor.NH, 'NH')">
				@include('partials.rapor.errors', ['var' => 'NH'])
			</td>
		</tr>
		<tr>
			<td>Nilai Ujian Tengah Semester</td>
			<td>: <input number name="UTS" type="text" v-model="rapor.UTS" v-on="keyup: validation(rapor.UTS, 'UTS')">
				@include('partials.rapor.errors', ['var' => 'UTS'])
			</td>
		</tr>
		<tr>
			<td>Nilai Ujian Akhir Semester</td>
			<td>: <input number name="UAS" type="text" v-model="rapor.UAS" v-on="keyup: validation(rapor.UAS, 'UAS')">
				@include('partials.rapor.errors', ['var' => 'UAS'])
			</td>
		</tr>
		<tr>
			<td>Deskripsi Pengetahuan</td>
			<td>&nbsp; <textarea cols="50" rows="5" name="desc_knowledge" v-model="rapor.desc_knowledge"></textarea></td>
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
			<td>: <input number name="NPr" type="text" v-model="rapor.NPr" v-on="keyup: validation(rapor.NPr, 'NPr')">
				@include('partials.rapor.errors', ['var' => 'NPr'])
			</td>
		</tr>
		<tr>
			<td>Nilai Projek</td>
			<td>: <input number name="NPj" type="text" v-model="rapor.NPj" v-on="keyup: validation(rapor.NPj, 'NPj')">
				@include('partials.rapor.errors', ['var' => 'NPj'])
			</td>
		</tr>
		<tr>
			<td>Nilai Portofolio</td>
			<td>: <input number name="NPo" type="text" v-model="rapor.NPo" v-on="keyup: validation(rapor.NPo, 'NPo')">
				@include('partials.rapor.errors', ['var' => 'NPo'])
			</td>
		</tr>
		<tr>
			<td>Deskripsi Keterampilan</td>
			<td>&nbsp; <textarea cols="50" rows="5" name="desc_skill" v-model="rapor.desc_skill"></textarea></td>
		</tr>
	</tbody>

</table>