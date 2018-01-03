@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Classroom
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['action'=>'ClassroomController@stored','method'=>'post']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Classroom Name')!!}
                                    {!! Form::text('name',null,['class'=>'edit-form-control'])!!}
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                            {{$errors->first('name')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Description')!!}
                                    {!! Form::text('description',null,['class'=>'edit-form-control'])!!}
                                    @if($errors->has('description'))
                                        <span class="text-danger">
                                            {{$errors->first('description')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Session Name')!!}
                                    {!! Form::select('turn_id',$turn,null,['class'=>'edit-form-control','placeholder'=>'please choose one'])!!}
                                    @if($errors->has('turn_id'))
                                        <span class="text-danger">
                                            {{$errors->first('turn_id')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Year Name')!!}
                                    {!! Form::select('year_id',$year,null,['class'=>'edit-form-control','placeholder'=>'please choose one'])!!}
                                    @if($errors->has('year_id'))
                                        <span class="text-danger">
                                            {{$errors->first('year_id')}}
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
                    <div class="col-md-8">
                        <label for="">List views</label>
                        <div class="form-group">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Classroom</th>
                                    <th>Description</th>
                                    <th>Session</th>
                                    <th>Year</th>
                                    <th>Created By</th>
                                    <th style="width:20%; !important;" class="center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($classroom as $cr)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$cr->name}}</td>
                                        <td>{{$cr->description}}</td>
                                        <td>{{\App\Turn::where('id',$cr->turn_id)->value('name')}}</td>
                                        <td>{{\App\Year::where('id',$cr->year_id)->value('name')}}</td>
                                        <td>{{\App\User::where('id',$cr->user_id)->value('name')}}</td>
                                        <td class="center">
                                            <a href="#" onclick="updateClassroom('{{$cr->id}}')" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit"></i></a>
                                            <a href="#" onclick="deleteClassroom({{$cr->id}})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>

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
        //$.fn.modal.Constructor.prototype.enforceFocus = function () {};
        function updateClassroom(id) {
            $.ajax({
                type:'get',
                url:"{{url('/admin/classroom/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#updateClassroom').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        function deleteClassroom(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this Classroom ?",
                type: "warning",
                showCancelButton:true,
                closeOnConfirm: false,
                confirmButtonText: "Yes",
                confirmButtonColor: "#ec6c62"
            }, function() {
                $.ajax({
                    url : "{{url('admin/classroom/delete')}}"+"/"+id,
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