<div class="row" v-if="!loading">
    <div class="col-xs-3">
        Nama Sekolah<br>
        Alamat <br>
        Nama Peserta Didik<br>
        Nomor Induk/ NISN <br>
    </div>
    <div class="col-xs-4">
        : SMA Negeri 7 Padang <br>
        : Jalan Bunga Tanjung<br>
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
    <h5 v-if="!loading">CAPAIAN KOMPETENSI</h5>    
                                    
<div class="row" v-if="! loading" style="margin: auto;">    
    <table class="table table-bordered">             
        <tr>
            <td rowspan="3" colspan="2">Mata Pelajaran</td>
            <td rowspan="2" colspan="2">Pengetahuan (K3)</td>
            <td rowspan="2" colspan="2">Keterampilan (K4)</td>
            <td colspan="2">Sikap, Spiritual dan Sosial (K1 dan K2)</td>
        </tr>
        <tr>
            <td>Mapel</td>
            <td>Antar Mapel</td>
        </tr>
        <tr>
            <td style="width: 50px;">Angka</td>
            <td style="width: 50px;">Huruf</td>
            <td style="width: 50px;">Angka</td>
            <td style="width: 50px;">Huruf</td>
            <td style="width: 90px;">S/B/C/K</td>
            <td>Deskripsi</td>                            
        </tr>
        <tr>
            <td colspan="7" style="text-align: left;">Kelompok A (Wajib)</td>
            <td rowspan="15" style="text-align: left; vertical-align: top;" v-repeat="hadir: kehadiran | limit 1">@{{hadir.desc}}</td>
        </tr>
        <tr v-repeat="rapors | type 'Kelompok A (wajib)'" class="@{{$index}}">
            <td>@{{$index + 1}}</td>
            <td style="width: 300px; text-align: left;">
                @{{section.teacher.course.name}} <br> 
                Nama Guru (@{{section.teacher.name}})
            </td>
            <td>@{{score_knowledge}}</td>
            <td>@{{letter_knowledge}}</td>
            <td>@{{score_skill}}</td>
            <td>@{{letter_skill}}</td>
            <td>@{{letter_attitude}}</td>                
        </tr>
        <tr>
            <td colspan="7" style="text-align: left;">Kelompok B (Wajib)</td>
        </tr>
        <tr v-repeat="rapors | type 'Kelompok B (wajib)' " class="@{{$index}}">
            <td>@{{$index+1}}</td>
            <td style="width: 300px; text-align: left;">
                @{{section.teacher.course.name}} <br> 
                Nama Guru (@{{section.teacher.name}})
            </td>
            <td>@{{score_knowledge}}</td>
            <td>@{{letter_knowledge}}</td>
            <td>@{{score_skill}}</td>
            <td>@{{letter_skill}}</td>
            <td>@{{letter_attitude}}</td>
        </tr>
        <tr>
            <td colspan="7" style="text-align: left;">Kelompok C (Peminatan)</td>
        </tr>
        <tr v-repeat="rapors | type 'Kelompok C (peminatan)' " class="@{{$index}}">
            <td style="width: 3%">@{{$index + 1}}</td>
            <td style="width: 300px; text-align: left;">
                @{{section.teacher.course.name}} <br> 
                Nama Guru (@{{section.teacher.name}})
            </td>
            <td>@{{score_knowledge}}</td>
            <td>@{{letter_knowledge}}</td>
            <td>@{{score_skill}}</td>
            <td>@{{letter_skill}}</td>
            <td>@{{letter_attitude}}</td>
        </tr>
    </table>
    <footer></footer>

    <table class="table table-bordered" style="width: 600px;">
        <tr>
            <td style="text-align: left; width: 250px;">Kegiatan Ekstrakurikuler</td>
            <td style="">Keikutsertaan dalam Kegiatan</td>
        </tr>
        <tr>
            <td style="text-align: left;">1. Praja Muda Karana (Pramuka)</td>
            <td style="text-align: left" v-repeat="hadir: kehadiran | limit 1">: @{{hadir.pramuka}}</td>
        </tr>
        <tr>
            <td style="text-align: left;">2. Usaha Kesehatan Sekolah (UKS)</td>
            <td style="text-align: left" v-repeat="hadir: kehadiran | limit 1">: @{{hadir.uks}}</td>
        </tr>
        <tr>                            
            <td style="text-align: left;">3. ................</td>
            <td></td>
        </tr>
    </table>
    <table class="table table-bordered" style="width: 300px">
        <tr>
            <td colspan="2">Ketidakhadiran</td>
        </tr>
        <tr>
            <td style="width: 70%; text-align: left;">Sakit</td>
            <td style="text-align: left" v-repeat="hadir: kehadiran | limit 1">: @{{hadir.sakit}}</td>
        </tr>
        <tr>
            <td style="text-align: left;">Izin</td>
            <td style="text-align: left" v-repeat="hadir: kehadiran | limit 1">: @{{hadir.izin}}</td>
        </tr>
        <tr>
            <td style="text-align: left;">Tanpa Keterangan</td>
            <td style="text-align: left" v-repeat="hadir: kehadiran | limit 1">: @{{hadir.alfa}}</td>
        </tr>
    </table>
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

<footer></footer>