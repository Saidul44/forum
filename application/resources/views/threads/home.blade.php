@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($threadInfo) ? 'Edit' : 'Add' }} Thread</div>

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

<div class="modal fade" id="add_topic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Topic</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => "topic",'id'=>'topic_form','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

            @include('topics._form', ['submit_btn' => 'Submit'])

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>


<script>
    function add_topic(e) {
        e.preventDefault();
        $('#add_topic').modal('show');
    }

    $('#topic_form').submit(function(e) {
        e.preventDefault();
        var name = $('#name').val();
        var description = $('#description').val();

        $.ajax({
            url: "{{ url('topic') }}",
            method: 'post',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                name: name,
                description: description
            },
            success: function (response) {
                $('#topic').append('<option value="'+ response.id +'">'+ response.name +'</option>');
                $('#topic').val(response.id);
                $('#add_topic').modal('hide');
            },
            error: function (errors) {
                $.each(errors.responseJSON, function (key, error) {
                    $('#' + key + '_error').text(error[0]);
                });
            }
        });
    });

</script>

@endsection
