@extends('layouts.app')

@section('content')
<style>
a {
    color:#000;
}
a:hover{
    text-decoration: none;
}
.about_details h5{
    margin: 15px 0 0 0;
}.about_details p{
    text-align: justify;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(isset($topic)) 
                        {{ $topic->name }}
                    @else
                        Threads
                    @endif
                </div>

                <div class="panel-body">
                    <div class="row">
                    <div class="col-md-12">
                               @foreach($threads as $key => $thread)
                                    @if( $key % 2 == 0)
                                        <div class="row">
                                    @endif
                                        <div class="col-md-6">
                                            <div>
                                                <img style="height: 230px;" src="{{ asset('upload/'. $thread->photo) }}" class="img-responsive">
                                            </div>
                                            <div class="about_details" style="color: black !important;">
                                                <h2 style="word-break: break-all;">
                                                    <a href="{{ url('thread-detail/'.$thread->id) }}">{{ $thread->title }}</a>
                                                </h2>
                                                @if(Auth::check() && (Auth::id() == $thread->user_id))
                                                    <div>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['threads.destroy', $thread->id], 'class' => 'delete-form', 'id' => "thread_delete_$thread->id"]) !!}
                                                            <a class="text-primary" href="{{ url('threads/'.$thread->id.'/edit') }}"><i class="fa fa-pencil"></i> Edit</a>

                                                            &nbsp; &nbsp;&nbsp;<span style="cursor: pointer;" class="text-danger delete-swl"><i class="fa fa-trash"></i> Delete</span>
                                                        {!! Form::close() !!}
                                                    </div>
                                                @endif
                                                <div class="icon">
                                                    <a href="{{ url('') }}"><i class="fa fa-user" aria-hidden="true">
                                                            {{ user_info($thread->user_id, 'name') }}
                                                        </i></a> &nbsp; <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> {{ $thread->updated_at }}</i></a> &nbsp; <a href="{{ url('thread-detail/'.$thread->id) }}"><i class="fa fa-comments-o" aria-hidden="true">
                                                             {{ (count_comment($thread->id) > 0) ? count_comment($thread->id) : '' }} Comments</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @if($key % 2 == 1)
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                        </div>
                        </div>
                </div>
            </div>
        </div>
         <div class="col-md-4">
                <ul class="list-group">
                        <li class="list-group-item active">Topics</li>
                           @foreach($topics as $topic)
                                   <li class="list-group-item">
                                        <a href="{{ url('topic/'.$topic->id) }}">
                                        {{ $topic->name }}
                                        <span class="pull-right badge">{{ \App\Models\Thread\Thread::count_topics($topic->id) }}</span>
                                        </a>
                                    </li>
                           @endforeach
                </ul>
        </div>
        
    </div>
</div>
@endsection