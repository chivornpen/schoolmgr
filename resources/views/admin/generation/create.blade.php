@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Turn
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['action'=>'GenerationController@stored','method'=>'post']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Generation Name')!!}
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
                                    <th>Generation</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th style="width:20%; !important;" class="center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($generation as $g)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$g->name}}</td>
                                        <td>{{$g->description}}</td>
                                        <td>{{\App\User::where('id',$g->user_id)->value('name')}}</td>
                                        <td class="center">
                                            <a href="#" onclick="updateGeneration('{{$g->id}}')" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit"></i></a>
                                            <a href="#" onclick="deleteGeneration({{$g->id}})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="updateGeneration">

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
        function updateGeneration(id) {
            $.ajax({
                type:'get',
                url:"{{url('/admin/generation/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#updateGeneration').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        function deleteGeneration(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this Generation ?",
                type: "warning",
                showCancelButton:true,
                closeOnConfirm: false,
                confirmButtonText: "Yes",
                confirmButtonColor: "#ec6c62"
            }, function() {
                $.ajax({
                    url : "{{url('admin/generation/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        //swal("Deleted!", "Your file was successfully deleted!", "success");
                        return location.reload();

                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }
    </script>
@endsection