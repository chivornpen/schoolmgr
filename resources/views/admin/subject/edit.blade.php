<div class="modal-dialog modal-sm" role="document">
    <div class="panel panel-default">
        <div class="panel-heading">
            Update
        </div>
        {!! Form::model($s,['action'=>['SubjectController@updateSubject',$s->id],'method'=>'PATCH']) !!}
        <div class="panel-body">
            {!! Form::label('Year Name') !!}
            {!! Form::text('name',null,['class'=>'edit-form-control','required'=>true]) !!}

            {!! Form::label('Description')!!}
            {!! Form::text('description',null,['class'=>'edit-form-control'])!!}

            {{--{!! Form::label('Active') !!}--}}
            {{--{!! Form::select('active',[0=>'Unactive',1=>'Active'],null,['class'=>'edit-form-control']) !!}--}}
        </div>
        <div class="panel-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm']) !!}
            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>