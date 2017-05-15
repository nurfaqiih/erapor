<h3>Data Pribadi</h3>
<div class="alert alert-success" style="display: block;">ISI DATA DENGAN BENAR!</div>
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
    </tbody>
</table>