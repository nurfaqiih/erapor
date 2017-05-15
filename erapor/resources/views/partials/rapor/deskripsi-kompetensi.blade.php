<div class="row" v-if="!loading">
    <div class="col-xs-3">
        Nama Sekolah<br>
        Alamat <br>
        Nama Peserta Didik<br>
        Nomor Induk/ NISN <br>
    </div>
    <div class="col-xs-4">
        : SMK YWKA MEDAN <br>
        : Jalan Lampu No.7<br>
        : @{{murid.name}}<br>
        : @{{murid.nis}}<br>
    </div>
    <div class="col-xs-2 col-xs-offset-1">
        Kelas <br>
        Semester <br>
        Tahun Pelajaran <br> 
    </div>
    <div class="col-xs-2">
        : @{{rombel.name}}<br>
        : <span v-repeat="rapor: rapors | limit 1">@{{rapor.semester}}</span><br>
        : @{{rombel.year}}<br>
    </div>
</div>
<br>
    <h5 v-if="! loading">DESKRIPSI KOMPETENSI</h5>
<div class="row" v-if="! loading" style="margin: auto;">
    <table class="table table-bordered">
        <tr>
            <td colspan="2">MATA PELAJARAN</td>
            <td style="width: 150px;">KOMPETENSI</td>
            <td>CATATAN</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left;">Kelompok A</td>	
        </tr>
        <tbody v-repeat="rapors | type 'Kelompok A (wajib)' " class="@{{$index}}">
            <tr>
                <td rowspan="3"
                    style="width: 30px;" 
                >@{{$index + 1}}</td>
                <td rowspan="3"
                    style="width: 300px; text-align: left;" 
                >@{{section.teacher.course.name}} <br>
                Nama Guru (@{{section.teacher.name}})
                </td>
                <td style="text-align: left;">Pengetahuan</td>
                <td style="text-align: left;">@{{desc_knowledge}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Ketarampilan</td>
                <td style="text-align: left;">@{{desc_skill}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Sikap dan Spiritual</td>
                <td style="text-align: left;">@{{desc_attitude}}</td>
            </tr>    
        </tbody>
        
        <tr>
            <td colspan="4" style="text-align: left;">Kelompok B</td>	
        </tr>

        <tbody v-repeat="rapors | type 'Kelompok B (wajib)' " class="@{{$index}}">
            <tr>
                <td rowspan="3">@{{$index + 1}}</td>
                <td rowspan="3" 
                    style="text-align: left;"
                >@{{section.teacher.course.name}} <br>
                Nama Guru (@{{section.teacher.name}})
                </td>
                <td style="text-align: left;">Pengetahuan</td>
                <td style="text-align: left;">@{{desc_knowledge}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Ketarampilan</td>
                <td style="text-align: left;">@{{desc_skill}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Sikap dan Spiritual</td>
                <td style="text-align: left;">@{{desc_attitude}}</td>
            </tr>    
        </tbody>

        <tr>
            <td colspan="4" style="text-align: left;">Kelompok C</td>	
        </tr>

        <tbody v-repeat="rapors | type 'Kelompok C (peminatan)' " class="@{{$index}}">
            <tr>
                <td rowspan="3">@{{$index + 1}}</td>
                <td rowspan="3"
                    style="text-align: left;"
                >@{{section.teacher.course.name}} <br>
                Nama Guru (@{{section.teacher.name}})
                </td>
                <td style="text-align: left;">Pengetahuan</td>
                <td style="text-align: left;">@{{desc_knowledge}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Ketarampilan</td>
                <td style="text-align: left;">@{{desc_skill}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Sikap dan Spiritual</td>
                <td style="text-align: left;">@{{desc_attitude}}</td>
            </tr>    
        </tbody>
    </table>

    <div id="semester 1" v-show="!naik">
        <br>
        <p class="col-xs-3">
            Mengetahui, <br>
            Orang tua/ Wali<br>
            <br>
            <br>
            <br>
            .......................

        </p>
        <p class="col-xs-3 col-xs-offset-6" v-if="!loading">
            Padang, {{\Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('d-M-Y')}}<br>
            Wali Kelas
            <br>
            <br>
            <br>
            <br>
            @{{rombel.teacher.name}}<br>
            NIP. @{{rombel.teacher.nip}}
        </p>        
    </div>

    <div id="semester 2" v-if="naik">
        <div class="col-xs-4 col-xs-offset-1">
            <p>
            Wali Kelas
            <br>
            <br>
            <br>
            <br>
            @{{rombel.teacher.name}}<br>
            NIP. @{{rombel.teacher.nip}} <br>
            <br>
            <br>
            <br>
            Mengetahui, <br>
            Orang tua/ Wali<br>
            <br>
            <br>
            <br>
            .......................
        </p>
        </div>

        <div class="col-xs-6">
            <table class="table table-bordered">
                <input type="hidden" value="@{{rombel.kelas.tingkat}} @{{rombel.kelas.jurusan}}" v-model="kelas">
                <tr>
                    <td style="text-align: left;">
                        <p style="margin-left: 30px;">Keputusan: <br>
                        Berdasarkan hasil yang dicapai pada semester 1 dan 2, peserta didik ditetapkan:<br></p>
                        <p style="margin-left: 30px;" v-if="murid.kelas != kelas">naik ke kelas (<b>@{{murid.kelas}}</b>)</p>
                        <p style="margin-left: 30px;" v-if="murid.kelas == kelas">tinggal di kelas (<b>@{{murid.kelas}}</b>)</p>
                        <br>
                        <p style="margin-left: 30px;">
                        Medan, {{\Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('d-M-Y')}}<br>
                        Kepala Sekolah <br>
                        <br>
                        <br>
                        <br>
                        <u>Drs. JELTA MASRIL, M.M</u><br>
                        NIP. 106010151982031011
                        </p>
                    </td>
                </tr>
            </table>
        </div>        
    </div>
</div>
<footer></footer>