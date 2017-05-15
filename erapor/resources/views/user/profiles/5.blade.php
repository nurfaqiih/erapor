<div class="profile-timeline">
    <ul class="list-unstyled">
        <li class="timeline-item">
            <div class="panel panel-white">
                <div class="panel-body">
                	<h3 class="text-center">Informasi Peserta Didik</h3>
                	<hr>
                	<h4>Data Account</h4>
                    <table class="table table-user-information">
                    	<tbody>
                      		<tr>
                        		<td>Role</td>
                        		<td>: Peserta Didik</td>
                      		</tr>
                      		<tr>
                        		<td>Tanggal Terdaftar</td>
                        		<td>: {{$user->created_at->format('d/m/Y')}}</td>
                      		</tr>                   
                      		<tr>
                        		<td>Email</td>
                        		<td>: {{$user->email}}</td>
                      		</tr>
                        		<td>Password</td>
                        		<td>: <a href="{{route('account.setting', $user->id)}}">Ganti Password??</a></td>  
                        	</tr>                   
                    	</tbody>
                  	</table>
                	<h4>Data Diri</h4>
                    <table class="table table-user-information">
	                    <tbody>
    	                    <tr>
          		            	<td>Nama Lengkap</td>
                        		<td>: {{$user->student->name}}</td>
                      		</tr>
                      		<tr>
                        		<td>Nomor Induk Siswa Nasional</td>
                        		<td>: {{$user->student->nis}}</td>
                      		</tr>                   
                      		<tr>
                        		<td>Tempat, Tanggal Lahir</td>
                        		<td>: {{$user->student->birth_place}}, {{$user->student->birth}}</td>
                      		</tr>
                      		<tr>
                      			<td>Jenis Kelamin</td>
                      			<td>: @if($user->student->gender == 1)Laki-Laki @elseif($user->student->gender == 2) Perempuan @endif</td>
                      		</tr>
                      		<tr>
                        		<td>Agama</td>
                        		<td>: {{$user->student->agama}}</td>  
                        	</tr>
                        	<tr>
                        		<td>Anak ke</td>
                        		<td>: {{$user->student->anak_ke}}</td>
                        	</tr>
                        	<tr>
                        		<td>Alamat Peserta Didik</td>
                        		<td>: {{$user->student->address}}</td>
                        	</tr>
                        	<tr>
                        		<td>Nomor Telpon</td>
                        		<td>: {{$user->student->telp}}</td>
                        	</tr>
                        	<tr>
                        		<td>Sekolah Asal</td>
                        		<td>: {{$user->student->sekolah_asal}}</td>
                        	</tr>
                        	<tr>
                        		<td>Nama Ayah</td>
                        		<td>: {{$user->student->ayah}}</td>
                        	</tr>
                        	<tr>
                        		<td>Nama Ibu</td>
                        		<td>: {{$user->student->ibu}}</td>
                        	</tr>
                        	<tr>
                        		<td>Alamat Orang tua</td>
                        		<td>: {{$user->student->address_ortu}}</td>
                        	</tr>
                        	<tr>
                        		<td>Nomor Telpon Orang tua</td>
                        		<td>: {{$user->student->telp_ortu}}</td>
                        	</tr>
                        	<tr>
                        		<td>Pekerjaan Ayah</td>
                        		<td>: {{$user->student->job_ayah}}</td>
                        	</tr>
                        	<tr>
                        		<td>Pekerjaan Ibu</td>
                        		<td>: {{$user->student->job_ibu}}</td>
                        	</tr>
                        	<tr>
                        		<td>Nama Wali</td>
                        		<td>: {{$user->student->wali}}</td>
                        	</tr>
                        	<tr>
                        		<td>Alamat Wali</td>
                        		<td>: {{$user->student->address_wali}}</td>
                        	</tr>
                        	<tr>
                        		<td>Nomor Telpon Wali</td>
                        		<td>: {{$user->student->telp_wali}}</td>
                        	</tr>
                        	<tr>
                        		<td>Pekerjaan Wali</td>
                        		<td>: {{$user->student->job_wali}}</td>
                        	</tr>
                    	</tbody>
                  	</table>
                </div>
            </div>
        </li>
    </ul>
</div>