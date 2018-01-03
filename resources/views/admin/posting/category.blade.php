@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                CREATE CATEGORY
            </div>
            <div class="panel-body">
                {!! Form::open() !!}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('categoryName','Category Name') !!}
                                {!! Form::text('categoryName',null,['class'=>'edit-form-control','placeholder'=>'Please provide category name']) !!}
                                @if($errors->has('categoryName'))
                                    <span class="text-danger">{{$errors->first('categoryName')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('parent','Parent Category') !!}
                                {!! Form::select('parent',$category,null,['class'=>'edit-form-control','placeholder'=>'choose category parent']) !!}
                            </div>
                            <div class="form-group">
                                <label for="public" style="font-family: 'Tw Cen MT Condensed Extra Bold',Serif; margin-right: 1.5%;">Public </label> {!! Form::checkbox('is_active',null,1,['id'=>'public']) !!}
                            </div>

                            <div class="form-group">

                                {!! Form::submit('Save',['class'=>'btn btn-primary btn-sm']) !!}

                            </div>


                        </div>
                        <div class="col-md-8">
                            {!! Form::label('listView','List Views') !!}

                        </div>


                    </div>



                {!! Form::close() !!}
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
@endsection

@section('script')


@endsection