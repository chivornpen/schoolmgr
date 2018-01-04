@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="panel panel-default">
            {{--Create Users--}}
            <div class="panel-heading">Create Student</div>
            <div class="panel-body">
                {!! Form::open(['action'=>'StudentController@stored','method'=>'POST','files'=>true]) !!}
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-lg-3">
                                {!! Form::label('khName','&nbsp;Khmer Name',['class'=>'edit-label']) !!}
                                {!! Form::text('khName',null,['class'=>'edit-form-control','placeholder'=>'Khmer Name', 'required'=>true ]) !!}
                                @if($errors->has('khName'))
                                    <span class="text-danger">{{$errors->first('khName')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('enName','&nbsp;English Name',['class'=>'edit-label']) !!}
                                {!! Form::text('enName',null,['class'=>'edit-form-control','placeholder'=>'English Name', 'required'=>true ]) !!}
                                @if($errors->has('enName'))
                                    <span class="text-danger">{{$errors->first('enName')}}</span>
                                @endif

                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('gender','&nbsp;Gender',['class'=>'edit-label']) !!}
                                {!! Form::select('gender',[0=>'Female',1=>'Male'],null,['class'=>'edit-form-control','placeholder'=>'Please choose gender', 'required'=>true ]) !!}
                                @if($errors->has('gender'))
                                    <span class="text-danger">{{$errors->first('gender')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('dob','&nbsp;Date Of Birth',['class'=>'edit-label']) !!}
                                {!! Form::date('dob',null,['class'=>'edit-form-control','placeholder'=>'Date of Birth', 'required'=>true ]) !!}
                                @if($errors->has('dob'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                {!! Form::label('ssid','&nbsp;SSID',['class'=>'edit-label']) !!}
                                {!! Form::text('ssid',null,['class'=>'edit-form-control','placeholder'=>'Society Security Identification']) !!}
                                @if($errors->has('ssid'))
                                    <span class="text-danger">{{$errors->first('ssid')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('phoneNum','&nbsp;Phone Number',['class'=>'edit-label']) !!}
                                {!! Form::text('phoneNum',null,['class'=>'edit-form-control','placeholder'=>'Phone Number', 'required'=>true]) !!}
                                @if($errors->has('phoneNum'))
                                    <span class="text-danger">{{$errors->first('phoneNum')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('email','&nbsp;Email',['class'=>'edit-label']) !!}
                                {!! Form::email('email',null,['class'=>'edit-form-control','placeholder'=>'test@example.com']) !!}
                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('perantNum','&nbsp;Parent Number',['class'=>'edit-label']) !!}
                                {!! Form::text('perantNum',null,['class'=>'edit-form-control','placeholder'=>'Parent Number', 'required'=>true ]) !!}
                                @if($errors->has('perantNum'))
                                    <span class="text-danger">{{$errors->first('perantNum')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('lob','&nbsp;Location Of Birth',['class'=>'edit-label']) !!}
                                {!! Form::textArea('lob',null,['class'=>'edit-form-control','placeholder'=>'Location of Birth', 'required'=>true,'rows'=>2]) !!}
                                @if($errors->has('lob'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('address','&nbsp;Address',['class'=>'edit-label']) !!}
                                {!! Form::textArea('address',null,['class'=>'edit-form-control','placeholder'=>'Address', 'required'=>true,'rows'=>2]) !!}
                                @if($errors->has('address'))
                                    <span class="text-danger">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('generation','&nbsp;Generation',['class'=>'edit-label']) !!}
                                {!! Form::select('generation',$generation,null,['class'=>'edit-form-control','placeholder'=>'Please Choose Generation', 'required'=>true]) !!}
                                @if($errors->has('generation'))
                                    <span class="text-danger">{{$errors->first('generation')}}</span>
                                @endif
                            </div>

                                <div class="col-lg-6">
                                    {!! Form::label('classroom[]','&nbsp;Classroom',['class'=>'edit-label']) !!}
                                    {!! Form::select('classroom[]',$classroom,null,['class'=>'select2-test edit-form-control', 'required'=>true,'multiple']) !!}
                                    @if($errors->has('classroom[]'))
                                        <span class="text-danger">{{$errors->first('classroom')}}</span>
                                    @endif
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 col-xs-5 col-sm-2">
                                <div class="form-group">
                                    <img src="{{asset('/photo/default_user.png')}}" alt="" id="preView" style="height: 80px; width: 80px; border-radius: 50px; border: 2px solid #346895; padding: 2px;">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="image" class="btn btn-primary" style="padding: 4px 16px;">Browse</label>
                                    <input type="file" class="edit-form-control" id="image" onchange="loadFile(event)" accept="image/*" name="image" style="display: none;">
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
                <div class="row">
                    <div class="col-lg-12">

                        {!! Form::submit('Create',['class'=>'btn btn-success btn-sm' ]) !!}
                        {!! Form::reset('Clear',['class'=>'btn btn-warning btn-sm' ]) !!}
                        <a href="{{URL::to('/')}}" class="btn btn-default btn-sm">Close</a>

                    </div>
                </div>

                {!! Form::close() !!}
            </div>

            <hr>
            {{--End Create Users--}}

            {{--Users Views--}}
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Views</div>
                    <div class="panel-body">
                        <!-- /.box-header -->
                        <div class="" id="box-body">

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div id="editUser">

                        </div>
                    </div>
                    <!-- Modal -->

                    {{--reset password--}}

                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div id="resetPassword">

                        </div>
                    </div>

                </div>
            </div>
            {{--End User Views--}}
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">

        function getTableStudent() {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/student')}}",
                dataType: 'html',
                success: function (data) {
                    $('#box-body').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        $(document).ready(function () {
            getTableStudent();
            $('.select2-test').select2();
        });


        var loadFile = function(event) {
            var output = document.getElementById('preView');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileEdit = function(event) {
            var output = document.getElementById('preViewEdit');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        function editStudent(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/student/edit')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#editUser').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }
        function viewUser(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/user/view')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#viewUser').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }

        function deleteStudent(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this Student ?",
                type: "warning",
                showCancelButton:true,
                closeOnConfirm: false,
                confirmButtonText: "Yes",
                confirmButtonColor: "#ec6c62"
            }, function() {
                $.ajax({
                    url : "{{url('admin/student/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            getTableStudent();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }
    </script>

@endsection


