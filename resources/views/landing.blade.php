@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Threads</div>

                <div class="panel-body">
                    @foreach($threads as $thread)
                        <div class="col-md-6">
                            <div>
                                <img src="{{ asset('upload/'. $thread->photo) }}" class="img-responsive">
                            </div>
                            <div>
                                {{ $thread->title }}
                            </div>
                            <div>
                                {{ $thread->body }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection