<a href="{{route($export)}}" class="btn btn-default"><span class="fa fa-download"></span> Export to Excel</a>
<button class="btn btn-default" v-on="click: upload"><span class="fa fa-upload"></span> Import from Excel</button>
<br>
<br>

<div id="upload" 
    class="modal fade bs-example-modal-md" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="Capaian Kompetensi"
>
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        	<div class="modal-header">
        		<h3>Upload File Excel</h3>
        	</div>
        	{!!Form::open(['route' => $import, 'files' => 'true'])!!}
        	<div class="modal-body">        		
        		{!!Form::file('excel', ['class' => 'form-control btn btn-default', 'required'])!!}
        	</div>
        	<div class="modal-footer">
        		{!!Form::submit('Upload', ['class' => 'btn btn-info'])!!}
        	</div>
        	{!!Form::close()!!}
        </div>
	</div>
</div>
