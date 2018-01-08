<div class="modal-dialog">
{!! Form::model($t,['action'=>['TeacherController@updateTeacher',$t->id],'method'=>'PATCH','files'=>true]) !!}

<!-- Modal content-->
    <div class="modal-content" style="border-radius: 5px; margin-top: 15%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Teacher</h4>
        </div>
        <div class="modal-body">
            <div >
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-4">
                                {!! Form::label('name','&nbsp;Teacher\'s Name',['class'=>'edit-label']) !!}
                                {!! Form::text('name',null,['class'=>'edit-form-control','placeholder'=>'Name', 'required'=>true ]) !!}
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('gender','&nbsp;Teacher\'s Name',['class'=>'edit-label']) !!}
                                {!! Form::select('gender',[0=>'Female',1=>'Male'],null,['class'=>'edit-form-control','placeholder'=>'Gender', 'required'=>true ]) !!}
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('education','&nbsp;Education',['class'=>'edit-label']) !!}
                                {!! Form::text('education',null,['class'=>'edit-form-control','placeholder'=>'Education', 'required'=>true ]) !!}
                                @if($errors->has('education'))
                                    <span class="text-danger">{{$errors->first('education')}}</span>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                {!! Form::label('phoneNum','&nbsp;Contact Number',['class'=>'edit-label']) !!}
                                {!! Form::text('phoneNum',null,['class'=>'edit-form-control','placeholder'=>'Contact Number', 'required'=>true ]) !!}
                                @if($errors->has('phoneNum'))
                                    <span class="text-danger">{{$errors->first('phoneNum')}}</span>
                                @endif

                            </div>
                            <div class="col-lg-5">
                                {!! Form::label('email','&nbsp;Email',['class'=>'edit-label']) !!}
                                {!! Form::text('email',null,['class'=>'edit-form-control','placeholder'=>'Email']) !!}
                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif

                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('salaryPerMonth','&nbsp;Salary/Month',['class'=>'edit-label']) !!}
                                {!! Form::text('salaryPerMonth',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('salaryPerMonth'))
                                    <span class="text-danger">{{$errors->first('salaryPerMonth')}}</span>
                                @endif

                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('salaryPerHour','&nbsp;Salary/Hour',['class'=>'edit-label']) !!}
                                {!! Form::text('salaryPerHour',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('salaryPerHour'))
                                    <span class="text-danger">{{$errors->first('salaryPerHour')}}</span>
                                @endif

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('address','&nbsp;Address',['class'=>'edit-label']) !!}
                                {!! Form::textArea('address',null,['class'=>'edit-form-control','placeholder'=>'Address', 'required'=>true,'rows'=>3]) !!}
                                @if($errors->has('address'))
                                    <span class="text-danger">{{$errors->first('address')}}</span>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('subject','&nbsp;Subject\'s name',['class'=>'edit-label']) !!}
                                {!! Form::select('subject[]',$sub,null,['class'=>'edit-form-control select2-test', 'required'=>true, 'multiple' ]) !!}
                                @if($errors->has('subject'))
                                    <span class="text-danger">{{$errors->first('subject')}}</span>
                                @endif

                            </div>
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
    $(document).ready(function () {
        $('.select2-test').select2();
        $('.select2-test').select2().val({{json_encode($t->subjects()->getRelatedIds())}}).trigger('change');
    });

</script>
