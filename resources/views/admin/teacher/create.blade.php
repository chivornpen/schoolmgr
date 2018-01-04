@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add New Teacher
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['action'=>'TeacherController@stored','method'=>'post']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('Teacher Name')!!}
                                    {!! Form::text('name',null,['class'=>'edit-form-control','placeholder'=>'Teacher Name'])!!}
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                            {{$errors->first('name')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('Gender')!!}
                                    {!! Form::select('gender',[0=>'Female',1=>'Male'],null,['class'=>'edit-form-control','placeholder'=>'Choose One Gender'])!!}
                                    @if($errors->has('gender'))
                                        <span class="text-danger">
                                            {{$errors->first('gender')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('Education')!!}
                                    {!! Form::text('education',null,['class'=>'edit-form-control','placeholder'=>'Education'])!!}
                                    @if($errors->has('education'))
                                        <span class="text-danger">
                                            {{$errors->first('education')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Contact Number')!!}
                                    {!! Form::text('phoneNum',null,['class'=>'edit-form-control','placeholder'=>'Contact Number'])!!}
                                    @if($errors->has('phoneNum'))
                                        <span class="text-danger">
                                            {{$errors->first('phoneNum')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Email')!!}
                                    {!! Form::email('email',null,['class'=>'edit-form-control','placeholder'=>'test@example.com'])!!}
                                    @if($errors->has('email'))
                                        <span class="text-danger">
                                            {{$errors->first('email')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Salary in Month')!!}
                                    {!! Form::number('salaryPerMonth',null,['class'=>'edit-form-control','placeholder'=>'Salary per month'])!!}
                                    @if($errors->has('salaryPerMonth'))
                                        <span class="text-danger">
                                            {{$errors->first('salaryPerMonth')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Salary per hour')!!}
                                    {!! Form::number('salaryPerHour',null,['class'=>'edit-form-control','placeholder'=>'Salary Per Hour'])!!}
                                    @if($errors->has('salaryPerHour'))
                                        <span class="text-danger">
                                            {{$errors->first('salaryPerHour')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Address') !!}
                                    {!! Form::textArea('address',null,['class'=>'edit-form-control','rows'=>4,'placeholder'=>'Address']) !!}
                                    @if($errors->has('address'))
                                        <span class="text-danger">
                                            {{$errors->first('address')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Subject Name')!!}
                                    {!! Form::select('subject[]',$subject,null,['class'=>'form-control select2-test','multiple'])!!}
                                    @if($errors->has('subject'))
                                        <span class="text-danger">
                                            {{$errors->first('subject')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Create',['class'=>'btn btn-primary btn-sm']) !!}
                            {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <div class="col-md-12">
                        <label for="">List views</label>
                        <div class="form-group">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Teacher Name</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Education</th>
                                    <th>Subject</th>
                                    <th style="width:20%; !important;" class="center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($teacher as $t)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$t->name}}</td>
                                        <td>{{($t->gender==0?"Female":"Male")}}</td>
                                        <td>{{$t->phoneNum}}</td>
                                        <td>{{$t->education}}</td>
                                        <td>
                                            @foreach($t->subjects as $s)
                                                <span class="label label-default">{{$s->name}}</span>
                                            @endforeach
                                        </td>
                                        <td class="center">
                                            <a href="#" onclick="updateTeacher('{{$t->id}}')" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit"></i></a>
                                            <a href="#" onclick="deleteTeacher({{$t->id}})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            <a href="#" onclick="viewTeacher({{$t->id}})" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="updateClassroom">

                    </div>
                </div>

            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function (){
           $('.select2-test').select2();
        });
        function updateTeacher(id) {
            $.ajax({
                type:'get',
                url:"{{url('/admin/teacher/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#updateClassroom').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        function deleteTeacher(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this teacher ?",
                type: "warning",
                showCancelButton:true,
                closeOnConfirm: false,
                confirmButtonText: "Yes",
                confirmButtonColor: "#ec6c62"
            }, function() {
                $.ajax({
                    url : "{{url('admin/teacher/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        return location.reload();
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }
    </script>
@endsection