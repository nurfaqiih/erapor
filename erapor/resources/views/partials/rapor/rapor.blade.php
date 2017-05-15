<div id="rapor" 
    class="modal fade bs-example-modal-lg" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="Capaian Kompetensi"
>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <button class="btn btn-primary" 
                        type="button" 
                        data-toggle="collapse" 
                        data-target="#collapseExample" 
                        aria-expanded="false" 
                        aria-controls="collapseExample"
                        v-attr="disabled: {{Config::get('kalender.open')}} < {{Carbon\Carbon::now()->format('Y-m-d')}} && !loading"
                    ><span class="fa fa-print"> Cetak rapor</span></button>
                    <div class="collapse" id="collapseExample">
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
                            <a href="/cetak/rapor/@{{printRombel}}/@{{printStudent}}/@{{printSemester}}?cover=@{{cover}}&biodata=@{{biodata}}" 
                                class="btn btn-info"
                                target="_blank"
                            >
                                <span class="fa fa-print"></span>    
                            </a>
                        </div>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading" v-if="loading">
                        <h3>Loading Data, Please Wait ...</h3>
                        <i class="fa fa-refresh fa-spin fa-3x"></i>
                    </div>
                    <div v-show="{{Config::get('kalender.open')}} > {{Carbon\Carbon::now()->format('Y-m-d')}}">
                        @include('partials.rapor.capaian-kompetensi')
                        <hr v-if="!loading">
                        @include('partials.rapor.deskripsi-kompetensi')    
                    </div>
                    <div  class="text-center" v-show="{{Config::get('kalender.open')}} < {{Carbon\Carbon::now()->format('Y-m-d')}} && !loading">
                        <span class="fa fa-warning fa-5x"></span><br>
                        <h1>Coming Soon</h1>
                        <p>Rapor untuk periode ini belum dapat diakses.<br> Lihat kembali tanggal : {{Config::get('kalender.open')}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>