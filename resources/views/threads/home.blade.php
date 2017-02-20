@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Threads</div>

                <div class="panel-body">
                   {!! Form::open(['url' => "threads",'id'=>'threads','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

                        <div class="form-group required">
                              {!! Form::label('title', null,['class'=>' col-lg-3 control-label']) !!}
                            <div class="col-lg-8">
                                {!! Form::text('title',null, ['id' => 'title', 'class' =>'form-control ', 'maxlength' => '250', 'required' => 'true']) !!}
                                 <span class="text-danger">{{$errors->first('title')}}</span>
                            </div>
                        </div>

                        <div class="form-group required">
                              {!! Form::label('body', null,['class'=>' col-lg-3 control-label']) !!}
                            <div class="col-lg-8">
                                {!! Form::textarea('body',null, ['id' => 'body', 'class' =>'form-control ', 'maxlength' => '250', 'required' => 'true', 'rows' => 5]) !!}
                                 <span class="text-danger">{{$errors->first('body')}}</span>
                            </div>
                        </div>

                        <div class="form-group required">
                              {!! Form::label('image', null,['class'=>' col-lg-3 control-label']) !!}
                            <div class="col-lg-8">
                                {!! Form::file('image',['id' => 'image', 'class' =>'form-control ', 'required' => 'true']) !!}
                                 <span class="text-danger">{{$errors->first('image')}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-8 col-lg-offset-3">
                                {!! Form::submit('Submit',['class' => 'btn btn-sm btn-primary pull-right'])!!}
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
