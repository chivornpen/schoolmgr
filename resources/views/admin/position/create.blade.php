@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Position
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['action'=>'PositionController@store','method'=>'post']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                        <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Position Name')!!}
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
                                            {!! Form::label('Display Name')!!}
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
                                            {!! Form::label('Module Select')!!}
                                            <select class="js-example-basic-multiple edit-form-control" name="module[]" multiple="multiple">
                                                @foreach($modules as $mo)
                                                    <option value="{{$mo->id}}">{{$mo->name}}</option>
                                                @endforeach
                                            </select>
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
                                        <th>Position Name</th>
                                        <th>Module</th>
                                        <th>Created By</th>
                                        <th style="width:20%; !important;" class="center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @foreach($position as $p)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>
                                                @foreach($p->modules as $mo)
                                                    <span class="label label-default">{{$mo->name}}</span>
                                                @endforeach
                                            </td>
                                            <td>{{\App\User::where('id',$p->user_id)->value('name')}}</td>
                                            <td class="center">
                                                <a href="#" onclick="updatePos('{{$p->id}}')" style="padding: 5px;" title="Edit" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit" style="color: #F8BC02;"></i></a>
                                                <a href="{{url('/admin/position/delete',[$p->id])}}" style="padding: 5px;"><i class="fa fa-trash" style="color: red;"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="updatePosition">

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
        $.fn.modal.Constructor.prototype.enforceFocus = function () {};
        function updatePos(id) {
            $.ajax({
                type:'get',
                url:"{{url('/admin/position/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#updatePosition').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('#test').select2();
        });
    </script>
@endsection