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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Threads</div>

                <div class="panel-body">
                    <div>
                        <img style="width: 717px;" src="{{ asset('upload/'. $thread->photo) }}" class="img-responsive">
                    </div>
                    <div class="about_details" style="color: black !important;">
                        <h2>
                            <a href="{{ url('thread-detail/'.$thread->id) }}">{{ $thread->title }}</a>
                        </h2>
                        <p>{{ $thread->body }}</p>
                        <hr style="margin-top: 5px !important; margin-bottom: 5px !important;">
                        <div class="icon">
                            <a href="{{ url('') }}"><i class="fa fa-user" aria-hidden="true">
                                    {{ user_info($thread->user_id, 'name') }}
                                </i></a> &nbsp; <a href="#"><i class="fa fa-clock-o" aria-hidden="true">{{ $thread->updated_at }}</i></a> &nbsp; <a href="{{ url('thread-detail/'.$thread->id) }}"><i class="fa fa-comments-o" aria-hidden="true">
                                    Comments</i></a>
                        </div>
                    </div>

                        <div class="col-sm-12" id="logout">
                            <div class="page-header">
                                <div class="logout">
                                    <button class="btn btn-default btn-circle text-uppercase" type="button" onclick="$('#logout').hide(); $('#login').show()">
                                        <span class="fa fa-power-off"></span> Logout                    
                                    </button>                
                                </div>
                            </div>
                            <div class="comment-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a class="nav-li" href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                                    <!-- <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li> -->
                                </ul>            
                                <div class="tab-content tab-content-custom">
                                    <div class="tab-pane active" id="comments-logout">                
                                        <div class="row" style="margin-bottom: 25px;">
                                            <div class="col-sm-11 col-sm-offset-1">
                                                <form class="">
                                                  <div class="form-group">
                                                    <div class="input-group">
                                                      <input type="text" class="form-control" id="comment_text" placeholder="Write a comment">
                                                      <div class="btn-primary input-group-addon" style="cursor: pointer" onclick="comment_submit('{{ $thread->id }}')">Submit</div>
                                                    </div>
                                                  </div>
                                                </form>
                                            </div>
                                        </div>

                                        <ul class="media-list">

                                        @foreach($comments as $comment_key => $comment)
                                          <?php $reply_comments = get_reply($comment->id, $comment->thread_id); ?>
                                          <li class="media">
                                            <a class="pull-left" href="#">
                                              <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                                            </a>
                                            <div class="media-body">
                                              <div class="well well-lg">
                                                  <h4 class="media-heading reviews">{{ user_info($comment->user_id, 'name') }} </h4>
                                                  <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">{{ $comment->updated_at }}</li>
                                                  </ul>
                                                  <p class="media-comment">
                                                    {{ $comment->comment }}
                                                  </p>
                                                  &nbsp; <a href="#" id="reply" class="text-muted"><span class="fa fa-share"></span> Reply</a>
                                                  @if(count($reply_comments) > 0)
                                                    &nbsp; &nbsp;<a onclick="load_reply('{{ $comment->id }}','{{ $comment->thread_id }}')" class="text-muted" href=""><span class="fa fa-comments-o"></span> {{ count($reply_comments) }} comments</a>
                                                  @endif
                                              </div>              
                                            </div>
                                            @if(count($reply_comments) > 0)
                                            <div class="collapse" id="reply_{{ $comment->id }}">
                                            
                                            </div>
                                            @endif
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
    </div>
</div>

<script>
    function load_reply(comment_id, thread_id) {
      
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
                    // console.log(response.data.length);
                    if(response.data.length > 0) {
                      var reply_comment_text = '<ul class="media-list">';
                          // $.each(response.data, function (key, reply_comment) {
                          for(var i = 0; i < response.data.length; i++) {
                            console.log('aa');
                          reply_comment_text += '<li class="media media-replied">'+
                              '<a class="pull-left" href="#">'+
                                '<img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/ManikRathee/128.jpg" alt="profile">'+
                              '</a>'+
                              '<div class="media-body">'+
                                '<div class="well well-lg">'+
                                    '<h4 class="media-heading reviews"><span class="fa fa-share"></span> '+response.data[i].user_id +' </h4>'+
                                    '<ul class="media-date text-uppercase reviews list-inline">'+
                                      '<li class="dd">' + response.data[i].updated_at + '</li>'+
                                    '</ul>'+
                                    '<p class="media-comment">'+ response.data[i].comment +'</p>'+
                                    '&nbsp; <a href="#" id="reply" class="text-muted"><span class="fa fa-share"></span> Reply</a>'+
                        '&nbsp; &nbsp;<a data-toggle="collapse" class="text-muted" href="#replyOne"><span class="fa fa-comments-o"></span> 2 comments</a>'+
                                '</div>'+              
                              '</div>'+
                          '</li>';
                        }
                          reply_comment_text += '</ul>';
                          console.log(reply_comment_text);

                          $('#reply_'+comment_id).append(reply_comment_text);
                          $('#reply_'+comment_id).collapse('show');

                      // $(comment_insert_text).hide().prependTo('.media-list').slideDown("slow");

                      // $('#comment_text').val('');
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
                    var comment_insert_text = '<li class="media">'+
                      '<a class="pull-left" href="#">'+
                        '<img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">'+
                      '</a>'+
                      '<div class="media-body">'+
                        '<div class="well well-lg">'+
                            '<h4 class="media-heading reviews">'+ response.data.user_info.name +' </h4>'+
                            '<ul class="media-date text-uppercase reviews list-inline">'+
                              '<li class="dd">'+ response.data.updated_at +'</li>'+
                            '</ul>'+
                            '<p class="media-comment">' + response.data.comment + '</p>'+
                            '&nbsp; <a href="#" id="reply" class="text-muted"><span class="fa fa-share"></span> Reply</a>'+
                            '&nbsp; &nbsp;<a data-toggle="collapse" class="text-muted" href="#replyOne"><span class="fa fa-comments-o"></span> 2 comments</a>'+
                        '</div>'+      
                      '</div>'+
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