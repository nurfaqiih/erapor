
<table class="table">
	<thead>
		<tr>
			<th colspan="2">Kehadiran Peserta Didik</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="35%">Sakit</td>
			<td>
				: <input name="sakit" type="text" number v-model="kehadiran.sakit" v-on="keyup: validation(kehadiran.sakit, 'sakit')">
				@include('partials.rapor.errors', ['var' => 'sakit'])
			</td>
		</tr>
		<tr>
			<td>Izin</td>
			<td>
				: <input name="izin" type="text" number v-model="kehadiran.izin" v-on="keyup: validation(kehadiran.izin, 'izin')">
				@include('partials.rapor.errors', ['var' => 'izin'])
			</td>
		</tr>
		<tr>
			<td>Tanpa Keterangan</td>
			<td>
				: <input name="alfa" type="text" number v-model="kehadiran.alfa" v-on="keyup: validation(kehadiran.alfa, 'alfa')">
				@include('partials.rapor.errors', ['var' => 'alfa'])
			</td>
		</tr>
	</tbody>

	<thead>
		<tr>
			<th colspan="2">Kegiatan Ekstrakurikuler</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Praja Muda Karana (Pramuka)</td>
			<td>
				&nbsp; <textarea cols="50" rows="5" name="pramuka" v-model="kehadiran.pramuka"></textarea>
			</td>
		</tr>
		<tr>
			<td>Unit Kesehatan Sekolah (UKS)</td>
			<td>
				&nbsp; <textarea cols="50" rows="5" name="uks" v-model="kehadiran.uks"></textarea>
			</td>
		</tr>
	</tbody>

	<thead>
		<tr>
			<th colspan="2">Deskripsi Antar Mata Pelajaran</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<tr>
				<td>Deskripsi</td>
				<td>&nbsp; <textarea cols="50" rows="5" name="desc" v-model="kehadiran.desc"></textarea></td>
			</tr>
		</tr>
	</tbody>
</table>
