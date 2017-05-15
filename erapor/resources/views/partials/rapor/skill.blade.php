
<div id="skill" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Entry Nilai Keterampilan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!!Form::model($rapor, ['route' => ['rapor.skill', $rapor->student_id, $rapor->section_id], 'method' => 'PATCH', 'data-remote', 'class' => 'form-horizontal'])!!}
                    <div class="form-group">
                        {!!Form::label('NPr', 'Nilai Pratikum :', ['class' => 'control-label col-sm-4'])!!}
                        <div class="col-sm-4">
                            {!!Form::text('NPr', null, ['class' => 'form-control', 'placeholder' => '0 > 100'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('NPj', 'Nilai Projek :', ['class' => 'control-label col-sm-4'])!!}
                        <div class="col-sm-4">
                            {!!Form::text('NPj', null, ['class' => 'form-control', 'placeholder' => '0 > 100'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('NPo', 'Nilai Portofolio :', ['class' => 'control-label col-sm-4'])!!}
                        <div class="col-sm-4">
                            {!!Form::text('NPo', null, ['class' => 'form-control', 'placeholder' => '0 > 100'])!!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!!Form::submit('Save Change', ['class' => 'btn btn-primary'])!!}
                    </div>

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>