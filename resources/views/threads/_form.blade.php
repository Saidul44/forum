<div class="form-group required">
      {!! Form::label('topic', 'Select Topic',['class'=>' col-lg-3 control-label']) !!}
    <div class="col-lg-8">
        {!! Form::select('topic',$topics,null, ['id' => 'topic', 'class' =>'form-control ', 'required' => 'true', 'placeholder' => 'Select Topic']) !!}
         <span class="text-danger">{{$errors->first('topic')}}</span>
    </div>
</div>

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
        <div class="form-control-static">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 210px;">
                    @if (isset($threadInfo->photo) && ($threadInfo->photo != ''))
                      {!! Html::image('upload/'.$threadInfo->photo) !!}
                    @else
                        <img src="{{ url('img/default.png') }}"
                             alt="No Photo">
                    @endif
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"
                     style="width: 210px;"></div>
                <div>
                <span class="btn btn-default btn-file">
                    <span class="fileinput-new">
                        <input type="file" name="image" value="upload"
                               data-buttonText="<?= trans('choose_file') ?>"
                               id="myImg"/>
                        <span class="fileinput-exists">Change</span>
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists"
                       data-dismiss="fileinput">Remove</a>
                </span>
                </div>
                <span class="text-danger">{{ $errors->first('image') }}</span>
            </div>
        </div>  
    </div>
</div>

<div class="form-group">
    <div class="col-lg-8 col-lg-offset-3">
        {!! Form::submit('Submit',['class' => 'btn btn-sm btn-primary pull-right'])!!}
    </div>
</div>