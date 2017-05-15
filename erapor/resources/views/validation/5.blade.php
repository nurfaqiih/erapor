<h3>Data Pribadi</h3>
<div class="alert alert-success">ISI DATA DENGAN BENAR!</div>
<table class="table table-user-information">
    <tbody>
        <tr>
            <td width="35%">{!!Form::label('name', 'Name', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nama Lengkap', 'autofocus'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('birth_place', 'Tempat Lahir', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('birth_place', null, ['class' => 'form-control', 'required', 'placeholder' => 'Kota'])!!}</td>
        </tr>                   
        <tr>
            <td>{!!Form::label('birth', 'Tanggal Lahir', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::input('date', 'birth', null, ['class' => 'form-control', 'required'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('gender', 'Jenis Kelamin', ['class' => 'control-label'])!!}</td>
            <td>
                <label>{!!Form::radio('gender', 1, true)!!} Laki-Laki </label>
                <span>&nbsp;</span>
                <label> {!!Form::radio('gender', 2)!!} Perempuan</label>
            </td>
        </tr>
        <tr>
            <td>{!!Form::label('agama', 'Agama', ['class' => 'control-label'])!!}</td>
            <td>
                <select class="form-control" name="agama" id="agama">
                    <option selected="selected">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Budha">Budha</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>{!!Form::label('anak_ke', 'Anak ke', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('anak_ke', null, ['class' => 'form-control', 'required', 'placeholder' => 'Anak Ke'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('address', 'Alamat Peserta Didik', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::textarea('address', null, ['class' => 'form-control'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('telp', 'Nomor Telpon', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('telp', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nomor telpon'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('sekolah_asal', 'Sekolah Asal', ['class' => 'form'])!!}</td>
            <td>{!!Form::text('sekolah_asal', null, ['class' => 'form-control', 'required', 'placeholder' => 'Sekolah Asal'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('ayah', 'Nama Ayah', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('ayah', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nama Ayah'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('ibu', 'Nama Ibu', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('ibu', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nama Ibu'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('address_ortu', 'Alamat Orang Tua', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('address_ortu', null, ['class' => 'form-control', 'required', 'placeholder' => 'Alamat Orang Tua'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('telp_ortu', 'Nomor Telpon Orang Tua', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('telp_ortu', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nomor telpon Orang Tua'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('job_ayah', 'Pekerjaan Ayah', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('job_ayah', null, ['class' => 'form-control', 'required', 'placeholder' => 'Pekerjaan Ayah'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('job_ibu', 'Pekerjaan Ibu', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('job_ibu', null, ['class' => 'form-control', 'required', 'placeholder' => 'Pekerjaan Ibu'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('wali', 'Nama Wali', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('wali', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nama Wali'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('telp_ortu', 'Nomor Telpon Orang Tua', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('telp_ortu', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nomor telpon Orang Tua'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('telp_wali', 'Nomor Telpon Wali', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('telp_wali', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nomor telpon Wali'])!!}</td>
        </tr>
        <tr>
            <td>{!!Form::label('job_wali', 'Pekerjaan Wali', ['class' => 'control-label'])!!}</td>
            <td>{!!Form::text('job_wali', null, ['class' => 'form-control', 'required', 'placeholder' => 'Pekerjaan Wali'])!!}</td>
        </tr>
    </tbody>
</table>