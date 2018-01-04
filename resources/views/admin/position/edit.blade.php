<div class="modal-dialog modal-sm" role="document">
    <div class="panel panel-default">
        <div class="panel-heading">
            Update
        </div>
        {!! Form::model($p,['action'=>['PositionController@updatePosition',$p->id],'method'=>'PATCH']) !!}
        <div class="panel-body">
            {!! Form::label('Position Name') !!}
            {!! Form::text('name',null,['class'=>'edit-form-control','required'=>true]) !!}

            {!! Form::label('Display Name')!!}
            {!! Form::text('description',null,['class'=>'edit-form-control'])!!}
            {!! Form::label('Module')!!}
            {!! Form::select('module[]',$moduleA,null,['class'=>'edit-form-control','multiple','id'=>'test'])!!}

        </div>
        <div class="panel-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm']) !!}
            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
        </div>

        {!! Form::close() !!}
    </div>
</div>
<script>
    $('#test').select2();
    $('#test').select2().val({{json_encode($p->modules()->getRelatedIds())}}).trigger('change');
</script>