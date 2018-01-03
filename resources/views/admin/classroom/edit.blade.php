<div class="modal-dialog modal-sm" role="document">
    <div class="panel panel-default">
        <div class="panel-heading">
            Update
        </div>
        {!! Form::model($cr,['action'=>['ClassroomController@updateClassroom',$cr->id],'method'=>'PATCH']) !!}
        <div class="panel-body">
            {!! Form::label('Classroom Name') !!}
            {!! Form::text('name',null,['class'=>'edit-form-control','required'=>true]) !!}

            {!! Form::label('Description')!!}
            {!! Form::text('description',null,['class'=>'edit-form-control'])!!}

            {!! Form::label('Session')!!}
            {!! Form::select('turn_id',$t,null,['class'=>'edit-form-control'])!!}

            {!! Form::label('Year')!!}
            {!! Form::select('year_id',$y,null,['class'=>'edit-form-control'])!!}
        </div>
        <div class="panel-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm']) !!}
            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>