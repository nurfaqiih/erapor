<div class="text-center">
	<h3><b>KETERANGAN TENTANG DIRI PESERTA DIDIK</b></h3>
</div>
<br>
<div
style="font-size: larger;
	text-align: justify;
    text-justify: inter-word;
    margin: 2em;
">
	<ol>
		<li>Nama Peserta Didik (Lengkap) <b v-repeat="5+10">&nbsp;</b>: @{{murid.name}}</li>
		<li>Nomor Induk Siswa Nasional   <b v-repeat="8+10">&nbsp;</b>: @{{murid.nis}}</li>
		<li>Tempat, Tanggal Lahir         <b v-repeat="18+10">&nbsp;</b>: @{{murid.birth_place}}, @{{murid.birth}}</li>
		<li>Jenis Kelamin 				 <b v-repeat="32+10">&nbsp;</b>: <span v-if="murid.gender == 1">Laki-Laki</span> <span v-if="murid.gender == 2">Perempuan</span></li>
		<li>Agama 						 <b v-repeat="43+10">&nbsp;</b>: @{{murid.agama}}</li>
		<li>Anak ke 					 <b v-repeat="41+10">&nbsp;</b>: @{{murid.anak_ke}}</li>
		<li>Alamat Peserta Didik 		 <b v-repeat="21+10">&nbsp;</b>: @{{murid.address}}</li>
		<li>Nomor Telepon Rumah          <b v-repeat="17+10">&nbsp;</b>: @{{murid.telp}}</li>
		<li>Sekolah Asal				 <b v-repeat="33+10">&nbsp;</b>: @{{murid.sekolah_asal}}</li>
		<li>
			Nama Orang Tua
				<ol type="a">
					<li>Ayah			 <b v-repeat="38+10">&nbsp;</b>: @{{murid.ayah}}</li>
					<li>Ibu              <b v-repeat="41+10">&nbsp;</b>: @{{murid.ibu}}</li>
				</ol>
		</li>
		<li>Alamat Orang Tua 			 <b v-repeat="25+10">&nbsp;</b>: @{{murid.address_ortu}}</li>
		<li>Nomor Telepon Rumah 		 <b v-repeat="17+10">&nbsp;</b>: @{{murid.telp_ortu}}</li>
		<li>
			Pekerjaan Orang Tua
				<ol type="a">
					<li>Ayah 			 <b v-repeat="38+10">&nbsp;</b>: @{{murid.job_ayah}}</li>
					<li>Ibu 			 <b v-repeat="41+10">&nbsp;</b>: @{{murid.job_ibu}}</li>
				</ol>
		</li>
		<li>Nama Wali Peserta Didik 	 <b v-repeat="14+10">&nbsp;</b>: @{{murid.wali}}</li>
		<li>Alamat Wali Peserta Didik 	 <b v-repeat="13+10">&nbsp;</b>: @{{murid.address_wali}}</li>
		<li>Nomor Telepon Rumah 		 <b v-repeat="17+10">&nbsp;</b>: @{{murid.telp_wali}}</li>
		<li>Pekerjaan Wali Peserta Didik <b v-repeat="8+10">&nbsp;</b>: @{{murid.job_wali}}</li>

	</ol>
</div>
<div style="margin: 2em">
	
	<p class="col-xs-3">
            <img src="@{{murid.user.thumbnail}}" width="113.385826772" height="151.181102362">
        </p>
        <p class="col-xs-4 col-xs-offset-5" v-if="!loading">
            Padang, {{\Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('d-M-Y')}}<br>
            Kepala Sekolah,
            <br>
            <br>
            <br>
            <br>
        <u>Drs. JELTA MASRIL, M.M</u><br>
        NIP. 106010151982031011
    </p>    
</div>
<footer></footer>