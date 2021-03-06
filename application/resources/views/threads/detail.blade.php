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

.nav-li {
    padding: 5px 10px !important;
}

.tab-content-custom {
    padding: 25px 15px !important;
}

.focusedInput {
    border-color: rgba(82,168,236,.8);
    outline: 0;
    outline: thin dotted \9;
    -moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
    box-shadow: 0 0 8px rgba(82,168,236,.6) !important;
}

.well {
    padding: 0px !important;
}
.well-lg {
    padding: 6px !important;
}
#login { display: none; }
.login,
.logout { 
    position: absolute; 
    top: -3px;
    right: 0;
}
.page-header { position: relative; }
.reviews {
    color: #555;    
    font-weight: bold;
    margin: 8px auto 5px;
}
.notes {
    color: #999;
    font-size: 12px;
}
.media .media-object { width: 50px; }
.media-body { position: relative; }
.media-date { 
    position: absolute; 
    right: 25px;
    top: 8px;
}
.media-date li { padding: 0; }
.media-date li:first-child:before { content: ''; }
.media-date li:before { 
    content: '.'; 
    margin-left: -2px; 
    margin-right: 2px;
}
.media-comment { margin-bottom: 5px; }
.media-replied { margin: 0 0 20px 50px; }
.media-replied .media-heading { padding-left: 6px; }

.btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
}
.btn-circle span { padding-right: 6px; }
.embed-responsive { margin-bottom: 20px; }
.tab-content {
    padding: 50px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.custom-input-file {
    overflow: hidden;
    position: relative;
    width: 120px;
    height: 120px;
    background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');    
    background-size: 120px;
    border-radius: 120px;
}
input[type="file"]{
    z-index: 999;
    line-height: 0;
    font-size: 0;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding:0;
    left:0;
}
.uploadPhoto {
    position: absolute;
    top: 25%;
    left: 25%;
    display: none;
    width: 50%;
    height: 50%;
    color: #fff;    
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;    
    background-color: rgba(0,0,0,.3);
    border-radius: 50px;
    cursor: pointer;
}
.custom-input-file:hover .uploadPhoto { display: block; }

</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Threads</div>

                <div class="panel-body">
                    <div>
                        <img style="width: 717px;" src="{{ asset('upload/'. $thread->photo) }}" class="img-responsive">
                    </div>
                    <div class="about_details" style="color: black !important;">
                        <h2 style="word-break: break-all;">
                            <a href="{{ url('thread-detail/'.$thread->id) }}">{{ $thread->title }}</a>
                            <span class="pull-right" style="font-size: 14px; padding-top: 10px;">
                            @if(Auth::check() && (Auth::id() == $thread->user_id))
                                <div>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['threads.destroy', $thread->id], 'class' => 'delete-form', 'id' => "thread_delete_$thread->id"]) !!}
                                        <a class="text-primary" href="{{ url('threads/'.$thread->id.'/edit') }}"><i class="fa fa-pencil"></i> Edit</a>

                                        &nbsp; &nbsp;&nbsp;<span style="cursor: pointer;" class="text-danger delete-swl"><i class="fa fa-trash"></i> Delete</span>
                                    {!! Form::close() !!}
                                </div>
                            @endif
                          </span>
                        </h2>

                        <p>{{ $thread->body }}</p>
                        <hr style="margin-top: 5px !important; margin-bottom: 5px !important;">
                        <div class="icon">
                            <a href="{{ url('') }}"><i class="fa fa-user" aria-hidden="true">
                                    {{ user_info($thread->user_id, 'name') }}
                                </i></a> &nbsp; <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> {{ $thread->updated_at }}</i></a> &nbsp; <a data-toggle="collapse" href="#comments_div"><i class="fa fa-comments-o" aria-hidden="true"> {{ (count($comments) > 0) ? count($comments) : '' }} Comments</i></a>
                        </div>
                    </div>

                    <div class="col-sm-12 collapse in" id="comments_div">
                        <div class="page-header">
                            <div class="logout">
                                    @if(Auth::check())
                                        <a class="btn btn-danger btn-circle" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="fa fa-power-off"></span> Logout
                                        </a>
                                  
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>               
                                    @else
                                      <a href="{{ url('login') }}" class="btn btn-success btn-circle" type="button" onclick="">
                                        <span class="fa fa-sign-in"></span> Login                    
                                      </a>  
                                    @endif
                            </div>
                        </div>
                        <div class="comment-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a class="nav-li" href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                                @if(! Auth::check())
                                  <li><a class="nav-li" href="{{ url('register') }}"><h4 class="reviews text-capitalize" style="color: #3097d1 !important;">Registration</h4></a></li>
                                @endif
                            </ul>            
                            <div class="tab-content tab-content-custom">
                                <div class="tab-pane active" id="comments-logout">                
                                    <div class="row" style="margin-bottom: 25px;">
                                        <div class="col-sm-11 col-sm-offset-1">
                                            <form class="">
                                              <div class="form-group">
                                                <div class="input-group">
                                                  <input type="text" class="form-control input_key" id="comment_text" placeholder="Write a comment">
                                                  <div class="btn-primary input-group-addon" style="cursor: pointer" onclick="comment_submit('{{ $thread->id }}')">Submit</div>
                                                </div>
                                              </div>
                                            </form>
                                        </div>
                                    </div>

                                    <ul class="media-list">

                                    @foreach($comments as $comment_key => $comment)
                                      <?php $count_reply_comment = count_reply($comment->id, $comment->thread_id); ?>
                                      <li class="media" id="comment_li_{{ $comment->id }}">
                                        <a class="pull-left" href="#">
                                          <img class="media-object img-circle" src="{{ asset('img/user-photo4.png') }}" alt="profile">
                                        </a>
                                        <div class="media-body" id="comment_body_{{ $comment->id }}">
                                          <div class="well well-lg">
                                              <h4 class="media-heading reviews">{{ user_info($comment->user_id, 'name') }} </h4>
                                              <ul class="media-date text-uppercase reviews list-inline">
                                                <li class="dd" id="comment_date_{{ $comment->id }}">{{ $comment->updated_at }}</li>
                                              </ul>
                                              <p class="media-comment" id="comment_content_{{ $comment->id }}">
                                                {{ $comment->comment }}
                                              </p>
                                              &nbsp; <a href="#" id="reply" onclick="comment_reply(event, '{{ $comment->id }}',  '{{ $comment->thread_id }}')" class="text-muted"><span class="fa fa-share"></span> Reply</a>
                                              @if( $count_reply_comment > 0)
                                                &nbsp; &nbsp;<a onclick="load_reply(event, '{{ $comment->id }}','{{ $comment->thread_id }}')" class="text-muted" href="#"><span class="fa fa-comments-o"></span> {{ $count_reply_comment }} comments</a>
                                              @endif
                                              @if(Auth::check() && (Auth::id() == $comment->user_id))
                                                &nbsp;&nbsp;<a href="#" onclick="edit_comment(event, '{{ $comment->id }}')" class="text-muted"><i class="fa fa-pencil"></i> Edit</a>
                                                &nbsp;&nbsp;<a href="#" onclick="delete_comment(event, '{{ $comment->id }}')" class="text-muted"><i class="fa fa-trash"></i> Delete</a>
                                              @endif
                                          </div>              
                                        </div>
                                        
                                        <div class="collapse" id="edit_comment_{{ $comment->id }}">

                                        </div>

                                        @if($count_reply_comment > 0)
                                        <div class="collapse" id="reply_{{ $comment->id }}">
                                        
                                        </div>
                                        @endif
                                        <div class="collapse" id="comment_reply_{{ $comment->id }}">

                                        </div>
                                      </li>
                                    @endforeach
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
            <ul class="list-group">
                <li class="list-group-item active">Topics</li>
                  @foreach($topics as $topic)
                      <a href="{{ url('topic/'.$topic->id) }}">
                        <li class="list-group-item">
                          {{ $topic->name }}
                            <span class="pull-right badge">{{ \App\Models\Thread\Thread::count_topics($topic->id) }}</span>
                        </li>
                      </a>
                  @endforeach
            </ul>
        </div>
    </div>
</div>

<script>
    var user_img = '{{ asset("img/user-photo4.png") }}';
    var login_url = "{{ url('login') }}";
    var auth_id = '{{ Auth::id() }}';

    @if(Auth::check())
      var auth_check = 1;
    @else
      var auth_check = 0;
    @endif

    $(document).on('keyup', "input[type='text']",function () {
      var input_id = $(this).prop('id');
      if(input_id != 'search_input') {
        if(! auth_check) {
          $(this).val('');
          swal({
              title: "Warning!",
              text: 'You must have to login first to comment ot reply',
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: 'Login',
              closeOnConfirm: false
          },
          function(){
              window.location.href = login_url;
          });
        }
      }
    });

    function edit_comment(e, comment_id) {
      e.preventDefault();

      if($('#edit_comment_'+comment_id).hasClass('in')) {
        return;
      }

      var comment_content = $('#comment_content_'+comment_id).text();

      var comment_reply_input = '<form class="">'+
        '<div class="form-group">'+
          '<div class="input-group">'+
            '<input type="text" value="' + $.trim(comment_content) + '" class="form-control input_key focusedInput" id="edit_comment_content_'+ comment_id +'" placeholder="Write a comment">'+
            '<div class="btn-primary input-group-addon" style="color: #fff; cursor: pointer; background-color: #2579a9;" onclick="edit_comment_submit('+ comment_id +')">Update</div>'+
          '</div>'+
        '</div>'+
      '</form>';

      $('#edit_comment_'+comment_id).append(comment_reply_input);
      
      $('#comment_body_'+comment_id).hide();

      $('#edit_comment_'+comment_id).collapse('show');
    }

    function edit_comment_submit(comment_id) {
      var comment_text = $('#edit_comment_content_'+comment_id).val();
      
      if(comment_text) {
        var url = "{{ url('comment') }}";

        $.ajax({
          url: url + '/' + comment_id,
          method: 'post',
          dataType: 'json',
          data: {
              _method: 'PUT',
              _token: "{{ csrf_token() }}",
              comment: comment_text,
          },
          success: function (response) {

            if(! response.error) {
              $('#comment_content_'+comment_id).text(response.data.comment);
              $('#comment_date_'+comment_id).text(response.data.updated_at);

              $('#edit_comment_'+comment_id).collapse('hide');

              $('#comment_body_'+comment_id).show();
            } else {
              swal({
                  title: "Warning",
                  text: response.msg,
                  type: "warning",
                  confirmButtonText: "OK",
              },
              function (isConfirm) {
                  // location.reload();
              });
            }


          },
          error: function (data) {
            swal({
                  title: "Warning",
                  text: 'Something not right',
                  type: "warning",
                  confirmButtonText: "OK",
              },
              function (isConfirm) {
                  location.reload();
              });
          }
      });
      }
    }

    function delete_comment(e, comment_id) {
      e.preventDefault();

      var url = '{{ url("comment") }}';

      $.ajax({
          url: url+'/'+comment_id,
          method: 'post',
          dataType: 'json',
          data: {
              _token: "{{ csrf_token() }}",
              _method: 'DELETE'
          },
          success: function (response) {

            if(! response.error) {
              $('#comment_li_'+ comment_id).remove();
                          
            } else {
              swal({
                  title: "Warning",
                  text: response.msg,
                  type: "warning",
                  confirmButtonText: "OK",
              },
              function (isConfirm) {
                  location.reload();
              });
            }

          },
          error: function (data) {
            swal({
                  title: "Warning",
                  text: 'Something not right',
                  type: "warning",
                  confirmButtonText: "OK",
              },
              function (isConfirm) {
                  location.reload();
              });
          }
      });  
    }

    function comment_reply(e, comment_id, thread_id) {
      e.preventDefault();
      
      if($('#comment_reply_'+comment_id).hasClass('in')) {
        return;
      }

      var comment_reply_input = '<form class="">'+
        '<div class="form-group">'+
          '<div class="input-group">'+
            '<input type="text" class="form-control input_key" id="comment_text_'+ comment_id +'" placeholder="Write a comment">'+
            '<div class="btn-primary input-group-addon" style="cursor: pointer" onclick="reply_submit('+ comment_id +','+ thread_id +')">Submit</div>'+
          '</div>'+
        '</div>'+
      '</form>';

      if($('#reply_'+comment_id).length) {
        if(! $('#reply_'+comment_id).hasClass('in')) {
          load_reply(e, comment_id, thread_id);
        }
      }
      
      $('#comment_reply_'+comment_id).append(comment_reply_input);
      
      $('#comment_reply_'+comment_id).collapse('show');
    }

    function reply_submit(comment_id, thread_id) {
      var comment_text = $('#comment_text_'+comment_id).val();
      
      if(comment_text) {

        $.ajax({
          url: "{{ url('reply_store') }}",
          method: 'post',
          dataType: 'json',
          data: {
              _token: "{{ csrf_token() }}",
              comment: comment_text,
              thread_id: thread_id,
              comment_id: comment_id
          },
          success: function (response) {

            if(! response.error) {
              // var reply_comment_text = '<ul class="media-list" id="ul_reply_'+ comment_id +'">'+
                    var reply_comment_text = '<li class="media media-replied" id="comment_li_'+ response.data.id +'">'+
                        '<a class="pull-left" href="#">'+
                          '<img class="media-object img-circle" src="'+ user_img +'" alt="profile">'+
                        '</a>'+
                        '<div class="media-body" id="comment_body_'+ response.data.id +'">'+
                          '<div class="well well-lg">'+
                              '<h4 class="media-heading reviews"><span class="fa fa-share"></span> '+response.data.user_info.name +' </h4>'+
                              '<ul class="media-date text-uppercase reviews list-inline">'+
                                '<li class="dd" id="comment_date_'+ response.data.id +'">' + response.data.updated_at + '</li>'+
                              '</ul>'+
                              '<p class="media-comment" id="comment_content_'+ response.data.id +'">'+ response.data.comment +'</p>'+
                              '&nbsp; <a href="#" id="reply" onclick="comment_reply(event, '+ response.data.id +','+ response.data.thread_id +')" class="text-muted"><span class="fa fa-share"></span> Reply</a>';
                              if(response.data.count_reply_comment > 0) {
                                reply_comment_text += '&nbsp; &nbsp;<a onclick="load_reply(event,'+ response.data.id+ ',' + response.data.thread_id +')" class="text-muted" href=""><span class="fa fa-comments-o"></span> '+ response.data.count_reply_comment +' comments</a>';
                              }

                              if(auth_check  && auth_id == response.data.user_id) {
                                reply_comment_text += '&nbsp;&nbsp;<a href="#" onclick="edit_comment(event, '+ response.data.id +')" class="text-muted"><i class="fa fa-pencil"></i> Edit</a>'+
                                    '&nbsp;&nbsp;<a href="#" onclick="delete_comment(event, '+ response.data.id +')" class="text-muted"><i class="fa fa-trash"></i> Delete</a>';
                              }

                          reply_comment_text += '</div></div>'+

                          '<div class="collapse" id="edit_comment_'+ response.data.id +'"></div>';

                        if(response.data.count_reply_comment > 0) {
                          reply_comment_text += '<div id="reply_'+ response.data.id +'"></div>';
                        }
                    reply_comment_text += '<div class="" id="comment_reply_'+ response.data.id +'"></div>'+

                      '</li>';
                    // '</ul>';

                    console.log(reply_comment_text);
                    if($('#reply_'+comment_id).length) {
                      $('#ul_reply_'+comment_id).append(reply_comment_text);
                      $('#comment_text_'+comment_id).val('');
                      $('#comment_reply_'+comment_id).removeClass('in');
                      $('#comment_reply_'+comment_id).html('');

                    } else {
                      reply_comment_text = '<ul class="media-list" id="ul_reply_'+ response.data.id +'">'+reply_comment_text+'</ul>';
                      $('#comment_reply_'+comment_id).prop('id', 'reply_'+comment_id);
                    
                      $('#reply_'+comment_id).html('');
                      $('#reply_'+comment_id).append(reply_comment_text);
                      $('#reply_'+comment_id).collapse('show');
                    }

                    // $('#comment_text_'+comment_id).val('');
              
            }
          },
          error: function (data) {
            swal({
                  title: "Warning",
                  text: 'Something not right',
                  type: "warning",
                  confirmButtonText: "OK",
              },
              function (isConfirm) {
                  location.reload();
              });
          }
      });
      }
    }

    function load_reply(e, comment_id, thread_id) {
      e.preventDefault();
      
      if($('#reply_'+comment_id).hasClass('in')) {
        $('#reply_'+comment_id).collapse('hide');
        $('#reply_'+comment_id).html('');
      
      } else {

        if(comment_id > 0 && thread_id > 0) {

              $.ajax({
                  url: "{{ url('load_reply') }}",
                  method: 'post',
                  dataType: 'json',
                  data: {
                      _token: "{{ csrf_token() }}",
                      comment_id: comment_id,
                      thread_id: thread_id
                  },
                  success: function (response) {

                    if(! response.error) {
                      if(response.data.length > 0) {
                        var reply_comment_text = '<ul class="media-list" id="ul_reply_'+ comment_id +'">';
                            for(var i = 0; i < response.data.length; i++) {

                            reply_comment_text += '<li class="media media-replied" id="comment_li_'+ response.data[i].id +'">'+
                                '<a class="pull-left" href="#">'+
                                  '<img class="media-object img-circle" src="'+ user_img +'" alt="profile">'+
                                '</a>'+
                                '<div class="media-body" id="comment_body_'+ response.data[i].id +'">'+
                                  '<div class="well well-lg">'+
                                      '<h4 class="media-heading reviews"><span class="fa fa-share"></span> '+response.data[i].user_info.name +' </h4>'+
                                      '<ul class="media-date text-uppercase reviews list-inline">'+
                                        '<li class="dd" id="comment_date_'+ response.data[i].id +'">' + response.data[i].updated_at + '</li>'+
                                      '</ul>'+
                                      '<p class="media-comment" id="comment_content_'+ response.data[i].id +'">'+ response.data[i].comment +'</p>'+
                                      '&nbsp; <a href="#" id="reply" onclick="comment_reply(event, '+ response.data[i].id +','+ response.data[i].thread_id +')" class="text-muted"><span class="fa fa-share"></span> Reply</a>';
                                      if(response.data[i].count_reply_comment > 0) {
                                        reply_comment_text += '&nbsp; &nbsp;<a onclick="load_reply(event,'+ response.data[i].id+ ',' + response.data[i].thread_id +')" class="text-muted" href=""><span class="fa fa-comments-o"></span> '+ response.data[i].count_reply_comment +' comments</a>';
                                      }

                                      if(auth_check  && (auth_id == response.data[i].user_id)) {
                                        console.log('opp');
                                        reply_comment_text += '&nbsp;&nbsp;<a href="#" onclick="edit_comment(event, '+ response.data[i].id +')" class="text-muted"><i class="fa fa-pencil"></i> Edit</a>'+
                                            '&nbsp;&nbsp;<a href="#" onclick="delete_comment(event, '+ response.data[i].id +')" class="text-muted"><i class="fa fa-trash"></i> Delete</a>';
                                      }

                                  reply_comment_text += '</div></div>'+
                                    '<div class="collapse" id="edit_comment_'+ response.data[i].id +'"></div>';

                                if(response.data[i].count_reply_comment > 0) {
                                  reply_comment_text += '<div id="reply_'+ response.data[i].id +'"></div>';
                                }
                            reply_comment_text += '<div class="" id="comment_reply_'+ response.data[i].id +'"></div>'+

                            '</li>';

                            console.log(reply_comment_text);
                            
                            // $('#reply_'+comment_id).append(reply_comment_text);
                            
                            // reply_comment_text = '';
                          }
                          
                          reply_comment_text += '</ul>';
                          

                          $('#reply_'+comment_id).append(reply_comment_text);
                          $('#reply_'+comment_id).collapse('show');

                      }

                    }
                  },
                  error: function (data) {
                    swal({
                          title: "Warning",
                          text: 'Something not right',
                          type: "warning",
                          confirmButtonText: "OK",
                      },
                      function (isConfirm) {
                          location.reload();
                      });
                  }
              });
          }
      }
    }

    function comment_submit(thread_id) {
        var comment_text = $('#comment_text').val();

        if(comment_text && thread_id > 0) {
            
            $.ajax({
                url: "{{ url('comment') }}",
                method: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    comment: comment_text,
                    thread_id: thread_id
                },
                success: function (response) {

                  if(! response.error) {
                    var comment_insert_text = '<li class="media" id="comment_li_'+ response.data.id +'">'+
                      '<a class="pull-left" href="#">'+
                        '<img class="media-object img-circle" src="'+ user_img +'" alt="profile">'+
                      '</a>'+
                      '<div class="media-body" id="comment_body_'+ response.data.id +'">'+
                        '<div class="well well-lg">'+
                            '<h4 class="media-heading reviews">'+ response.data.user_info.name +' </h4>'+
                            '<ul class="media-date text-uppercase reviews list-inline">'+
                              '<li class="dd" id="comment_date_'+ response.data.id +'">'+ response.data.updated_at +'</li>'+
                            '</ul>'+
                            '<p class="media-comment" id="comment_content_'+ response.data.id +'">' + response.data.comment + '</p>'+
                            '&nbsp; <a href="#" id="reply" onclick="comment_reply(event, '+ response.data.id +','+ response.data.thread_id +')" class="text-muted"><span class="fa fa-share"></span> Reply</a>';

                            if(auth_check  && auth_id == response.data.user_id) {
                                comment_insert_text += '&nbsp;&nbsp;<a href="#" onclick="edit_comment(event, '+ response.data.id +')" class="text-muted"><i class="fa fa-pencil"></i> Edit</a>'+
                                    '&nbsp;&nbsp;<a href="#" onclick="delete_comment(event, '+ response.data.id +')" class="text-muted"><i class="fa fa-trash"></i> Delete</a>';
                              }

                        comment_insert_text += '</div>'+      
                      '</div>'+
                      '<div class="collapse" id="edit_comment_'+ response.data.id +'"></div>'+
                      '<div id="comment_reply_'+ response.data.id +'"></div>'+
                    '</li>';

                    $(comment_insert_text).hide().prependTo('.media-list').slideDown("slow");

                    $('#comment_text').val('');

                  }
                },
                error: function (data) {
                  swal({
                        title: "Warning",
                        text: 'Something not right',
                        type: "warning",
                        confirmButtonText: "OK",
                    },
                    function (isConfirm) {
                        location.reload();
                    });
                }
            });
        }
    }
</script>

@endsection