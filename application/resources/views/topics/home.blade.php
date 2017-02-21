@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ (isset($topicInfo) ? 'Edit' : 'Add') }} Topic</div>

                <div class="panel-body">
                    @if(isset($topicInfo))
                        {!! Form::model($topicInfo,['method' =>'PUT', 'url' => ["topic",$topicInfo->id],'id'=>'topic','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files' => true]) !!}

                            @include('topics._form', ['submit_btn' => 'Update'])

                        {!! Form::close() !!}

                    @else
                       {!! Form::open(['url' => "topic",'id'=>'topic','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

                            @include('topics._form', ['submit_btn' => 'Submit'])

                        {!! Form::close() !!}
                    @endif
                    <hr>
                        <h4><i class="fa fa-arrow-circle-o-right"></i> Topic list</h4>
                    <hr>

                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Topic</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($topics as $key => $topic)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>{{ $topic->description }}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['topic.destroy', $topic->id], 'class' => 'delete-form']) !!}
                                            {!! btn_edit("topic/$topic->id/edit") !!}
                                            {!! btn_delete_submit() !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
