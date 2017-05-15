<h3 class="text-center">Capaian Kompetensi Peserta Didik</h3><br>
<div class="row">
    <div class="col-md-2">
        <p>Nama Sekolah</p>
        <p>Alamat</p>
        <p>Nama</p>
        <p>Nomor Induk/NISN</p>
    </div>
    <div class="col-md-6">
        <p>: SMA Negeri 7 Padang</p>
        <p>: Jl. Bunga Tanjung Lubuk Buaya</p>
        <p>: {{Auth::user()->student->name}}</p>
        <p>: {{Auth::user()->username}}</p>
    </div>
    <div class="col-md-2">
        <p>Kelas</p>
        <p>Semester</p>
        <p>Tahun Pelajaran</p>
    </div>
    <div class="col-md-2">
        <p>:
            @foreach($sections->take(1) as $section)
                {{$section->rombel->name}}
            @endforeach
        </p>
        <p>: {{$semester}}</p>
        <p>: {{$year}}</p>
    </div>
</div>
<h4>Capaian</h4>
<div class="panel">
    <div class="panel-body">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th rowspan="3" class="text-center">Mata Pelajaran</th>
                <th rowspan="2" colspan="2">Pengetahuan (KI 3)</th>
                <th rowspan="2" colspan="2">Keterampilan (KI 4)</th>
                <th colspan="2">Sikap Spritual dan Sosial (KI 1 dan KI 2)</th>
            </tr>
            <tr>
                <th>Dalam Mapel</th>
                <th>Antar Mapel</th>
            </tr>
            <tr>
                <th>1-4</th>
                <th>Huruf</th>
                <th>1-4</th>
                <th>Huruf</th>
                <th>SB/B/C/K</th>
                <th>Deskripsi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sections->where('year', $year) as $section)
                <tr>
                    @foreach($section->rapor as $rapor)
                        <td>{{$section->teacher->course->name}} ({{$section->teacher->name}})</td>
                        <td>{{$rapor->score_knowledge}}</td>
                        <td>{{$rapor->letter_knowledge}}</td>
                        <td>{{$rapor->score_attitude}}</td>
                        <td>{{$rapor->letter_skill}}</td>
                        <td>{{$rapor->score_skill}}</td>
                        <td>{{$rapor->desc}}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="2">Ketidakhadiran</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Sakit</td>
                    <td>: {{$rombel->pivot->sakit}} hari</td>
                </tr>
                <tr>
                    <td>Izin</td>
                    <td>: {{$rombel->pivot->izin}} hari</td>
                </tr>
                <tr>
                    <td>Tanpa Keterangan</td>
                    <td>: {{$rombel->pivot->alfa}} hari</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Deskripsi Antar Mata Pelajaran</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$rombel->pivot->desc}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3 pull-right">
            <p class="text-center">Wali Kelas</p>
            <p class="text-center">Padang, {{\Carbon\Carbon::now()->format('d M Y')}}</p>
            <br><br><br>
            <p class="text-center">{{$rombel->teacher->name}}</p>
            <p class="text-center">{{$rombel->teacher->nip}}</p>
        </div>
    </div>
</div>