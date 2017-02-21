<div class="form-group required">
      {!! Form::label('name', 'Name',['class'=>' col-lg-3 control-label']) !!}
    <div class="col-lg-8">
        {!! Form::text('name',null, ['id' => 'name', 'class' =>'form-control ', 'maxlength' => '250', 'required' => 'true']) !!}
         <span class="text-danger">{{$errors->first('name')}}</span>
    </div>
</div>

<div class="form-group required">
      {!! Form::label('description', 'Description',['class'=>' col-lg-3 control-label']) !!}
    <div class="col-lg-8">
        {!! Form::textarea('description',null, ['id' => 'description', 'class' =>'form-control ', 'maxlength' => '250', 'rows' => 2]) !!}
         <span class="text-danger">{{$errors->first('description')}}</span>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-8 col-lg-offset-3">
        {!! Form::submit($submit_btn,['class' => 'btn btn-sm btn-primary pull-right'])!!}
    </div>
</div>