<button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="fa fa-trash"></span> Delete</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">Warning !!<a class="anchorjs-link" href="#mySmallModalLabel"><span class="anchorjs-icon"></span></a></h4>
            </div>
            <div class="modal-body">
                Are You Sure to Delete this record??
            </div>

            <div class="modal-footer">
                {!!Form::open(['method' => 'DELETE', 'route' => [$route, $id]])!!}
                {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                {!!Form::close()!!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
