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
                <div class="panel-heading">Threads</div>

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
                                                <h2>
                                                    <a href="{{ url('thread-detail/'.$thread->id) }}">{{ $thread->title }}</a>
                                                </h2>
                                                <div class="icon">
                                                    <a href="{{ url('') }}"><i class="fa fa-user" aria-hidden="true">
                                                            {{ user_info($thread->user_id, 'name') }}
                                                        </i></a> &nbsp; <a href="#"><i class="fa fa-clock-o" aria-hidden="true">{{ $thread->updated_at }}</i></a> &nbsp; <a href="{{ url('thread-detail/'.$thread->id) }}"><i class="fa fa-comments-o" aria-hidden="true">
                                                            Comments</i></a>
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
                                        <span class="badge">{{ \App\Models\Thread\Thread::count_topics($topic->id) }}</span>
                                        {{ $topic->name }}
                                    </li>
                           @endforeach
                </ul>
        </div>
        
    </div>
</div>
@endsection