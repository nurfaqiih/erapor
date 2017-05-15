<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#pilihan" aria-expanded="false" aria-controls="collapseExample">
                <span class="fa fa-print"></span> Cetak Rapor
            </button>
            <div class="collapse" id="pilihan">
                <div class="well">
                    <input type="checkbox" id="cover" v-model="cover">
                    <label for="cover">Cetak Halaman Depan</label>
                    <br>
                    <input type="checkbox" id="biodata" v-model="biodata">
                    <label for="biodata">Cetak Halaman Biodata</label>
                    <br>
                    <input type="checkbox" id="checkbox" checked="true" disabled="true">
                    <label for="checkbox">Cetak Rapor Semester 1</label>
                    <br>
                    <a href="/cetak/rapor/@{{rombel_id}}/@{{student_id}}/@{{semester}}?cover=@{{cover}}&biodata=@{{biodata}}" 
                        class="btn btn-info"
                        target="_blank"
                    >
                        <span class="fa fa-print"></span>    
                    </a>
                </div>
            </div>
            <hr style="border: 1px solid;">
            @include('partials.rapor.capaian-kompetensi')
            <br>
            <hr style="border: 1px solid;">
            <br>
            @include('partials.rapor.deskripsi-kompetensi')