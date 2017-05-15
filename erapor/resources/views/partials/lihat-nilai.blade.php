<div id="lihat-nilai" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Nilai Peserta didik</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading" v-if="visible">
                        <i class="fa fa-refresh fa-spin fa-5x"></i>
                    </div>
                    <ul class="list-unstyled" v-if="!visible">
                        <li>Nama Peserta Didik <strong class="col-md-offset-1">: @{{nilai.student.name}}</strong></li>
                        <li>Nomor Induk Siswa <strong class="col-md-offset-1">: @{{nilai.student.nis}}</strong></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <table class="table table-striped table-bordered" v-if="!visible">
                        <thead>
                            <tr>
                                <th rowspan=2></th>
                                <th colspan="3" class="text-center">Nilai Pengetahuan</th>
                                <th colspan="3" class="text-center">Nilai Keterampilan</th>
                                <th colspan="4" class="text-center">Nilai Sikap</th>
                            </tr>
                            <tr>
                                <td class="text-center">UH</td>
                                <td class="text-center">UTS</td>
                                <td class="text-center">UAS</td>
                                <td class="text-center">Pratikum</td>
                                <td class="text-center">Projek</td>
                                <td class="text-center">Portofolio</td>
                                <td class="text-center">Observasi</td>
                                <td class="text-center">Diri Sendiri</td>
                                <td class="text-center">Antar Teman</td>
                                <td class="text-center">Jurnal</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td class="text-center">@{{nilai.NH}}</td>
                                <td class="text-center">@{{nilai.UTS}}</td>
                                <td class="text-center">@{{nilai.UAS}}</td>
                                <td class="text-center">@{{nilai.NPr}}</td>
                                <td class="text-center">@{{nilai.NPj}}</td>
                                <td class="text-center">@{{nilai.NPo}}</td>
                                <td class="text-center">@{{nilai.NO}}</td>
                                <td class="text-center">@{{nilai.NDs}}</td>
                                <td class="text-center">@{{nilai.NAt}}</td>
                                <td class="text-center">@{{nilai.NJ}}</td>
                            </tr>
                            <tr>
                                <td>Nilai</td>
                                <td colspan="3">@{{nilai.score_knowledge}}</td>
                                <td colspan="3">@{{nilai.score_skill}}</td>
                                <td colspan="4">@{{nilai.score_attitude}}</td>
                            </tr>
                            <tr>
                                <td>Huruf</td>
                                <td colspan="3">@{{nilai.letter_knowledge}}</td>
                                <td colspan="3">@{{nilai.letter_skill}}</td>
                                <td colspan="4">@{{nilai.letter_attitude}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group pull-left">
                        Catatan Wali Kelas : @{{nilai.desc}}
                    </div>
                </div>
            </div>
        </div>
    </div>