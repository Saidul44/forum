@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($threadInfo) ? 'Edit' : 'Add' }} Threads</div>

                <div class="panel-body">
                    @if(isset($threadInfo))
                        {!! Form::model($threadInfo,['method' =>'PUT', 'url' => ["threads",$threadInfo->id],'id'=>'thread','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files' => true]) !!}

                            @include('threads._form', ['submit_btn' => 'Submit'])

                        {!! Form::close() !!}

                    @else

                       {!! Form::open(['url' => "threads",'id'=>'threads','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

                            @include('threads._form', ['submit_btn' => 'Submit'])

                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
