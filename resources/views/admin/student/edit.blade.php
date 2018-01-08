
<div class="modal-dialog">
{!! Form::model($st,['action'=>['StudentController@update',$st->id],'method'=>'PATCH','files'=>true]) !!}

<!-- Modal content-->
    <div class="modal-content" style="border-radius: 5px; margin-top: 15%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Student</h4>
        </div>
        <div class="modal-body">
            <div >
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('khName','&nbsp;Khmer Name',['class'=>'edit-label']) !!}
                                {!! Form::text('khName',null,['class'=>'edit-form-control','placeholder'=>'Khmer Name', 'required'=>true ]) !!}
                                @if($errors->has('khName'))
                                    <span class="text-danger">{{$errors->first('khName')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('enName','&nbsp;English Name',['class'=>'edit-label']) !!}
                                {!! Form::text('enName',null,['class'=>'edit-form-control','placeholder'=>'English Name', 'required'=>true ]) !!}
                                @if($errors->has('enName'))
                                    <span class="text-danger">{{$errors->first('enName')}}</span>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('gender','&nbsp;Gender',['class'=>'edit-label']) !!}
                                {!! Form::select('gender',[0=>"Female",1=>"Male"],null,['class'=>'edit-form-control','placeholder'=>'Gender', 'required'=>true ]) !!}
                                @if($errors->has('gender'))
                                    <span class="text-danger">{{$errors->first('gender')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('phoneNum','&nbsp;Contact Number',['class'=>'edit-label']) !!}
                                {!! Form::text('phoneNum',null,['class'=>'edit-form-control','placeholder'=>'Contact Number', 'required'=>true ]) !!}
                                @if($errors->has('phoneNum'))
                                    <span class="text-danger">{{$errors->first('phoneNum')}}</span>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('generation','&nbsp;Generation Name',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::select('generation_id',$ge,null,['class'=>'edit-form-control','placeholder'=>'Generation name', 'required'=>true ]) !!}
                                @if($errors->has('generation'))
                                    <span class="text-danger">{{$errors->first('generation')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('classroom','&nbsp;Classrooms',['class'=>'edit-label']) !!}
                                {!! Form::select('classroom[]',$cr,null,['class'=>'edit-form-control select2-test', 'required'=>true, 'multiple' ]) !!}
                                @if($errors->has('classroom'))
                                    <span class="text-danger">{{$errors->first('classroom')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 col-xs-5 col-sm-2">
                                <div class="form-group">
                                    <img src='{{asset("/photo/students/$st->photo")}}' alt="" id="preViewEdit" style="height: 80px; width: 80px; border-radius: 50px; border: 2px solid #346895; padding: 2px;">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="imageEdit" class="btn btn-primary" style="padding: 4px 16px;">Browse</label>
                                    <input type="file" name="imageEdit" class="edit-form-control" id="imageEdit" onchange="loadFileEdit(event)" accept="image/*" style="display: none;">
                                    {{--{!! Form::file('image',['class'=>'btn display-none']) !!}--}}
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm pull-left' ]) !!}
            <a href="#" data-dismiss="modal" class="btn btn-default btn-sm pull-left">Close</a>
        </div>

    </div>
    {!! Form::close() !!}
</div>

<script type="text/javascript">
    var loadFileEdit = function(event) {
        var output = document.getElementById('preViewEdit');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

    $('.select2-test').select2();
    $('.select2-test').select2().val({{json_encode($st->classrooms()->getRelatedIds())}}).trigger('change');
</script>






