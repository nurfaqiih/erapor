<div class="profile-timeline">
    <ul class="list-unstyled">
        <li class="timeline-item">
            <div class="panel panel-white">
                <div class="panel-body">
                	<h3 class="text-center">Informasi Pendidik/Guru</h3>
                	<hr>
                	<h4>Data Account</h4>
                    <table class="table table-user-information">
                    	<tbody>
                      		<tr>
                        		<td>Role</td>
                        		<td>: Pendidik</td>
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
                        		<td>: {{$user->teacher->name}}</td>
                      		</tr>
                      		<tr>
                        		<td>Nomor Induk Pegawai</td>
                        		<td>: {{$user->teacher->nip}}</td>
                      		</tr>                   
                      		<tr>
                        		<td>Tempat, Tanggal Lahir</td>
                        		<td>: {{$user->teacher->birth_place}}, {{$user->teacher->birth}}</td>
                      		</tr>
                      		<tr>
                      			<td>Jenis Kelamin</td>
                      			<td>: @if($user->teacher->gender == 1)Laki-Laki @elseif($user->teacher->gender == 2) Perempuan @endif</td>
                      		</tr>
                      		<tr>
                        		<td>Agama</td>
                        		<td>: Islam</td>  
                        	</tr>
                        	<tr>
                        		<td>Mata Pelajaran</td>
                        		<td>: {{$user->teacher->course->name}}</td>
                        	</tr>
                    	</tbody>
                  	</table>
                </div>
            </div>
        </li>
    </ul>
</div>