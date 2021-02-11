@extends('blog.master')
@section("fr-active","active")
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('forums')}}">Forums</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    
        
    
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
          <h2>Chat This Month ({{date('M , Y')}})</h2>
          <div class="col-lg-12 entries">
            <article class="entry entry-single">
              <div class="panel-body" >
                    <ul class="chat" id="chatting">
                      @foreach ($chat as $ct)
                        @if(session('id') != $ct->id_user)
                        <li class="left clearfix d-flex justify-content-start"><span class="chat-img pull-left" style="position: absolute">
                          <img src="{{$ct->img}}" alt="User Avatar" class="img-float" style="width: 50px;height: 50px; border-radius: 50%;" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                  <strong class="primary-font">{{$ct->name}}</strong> <small class="pull-right text-muted">
                                        <span class="icofont-clock-time"></span>{{\Carbon\Carbon::parse($ct->chat_time)->isoFormat('MMM DD,YYYY HH:mm')}}</small>
                                </div>
                                <p>
                                    {{$ct->chat}}
                                  </p>
                            </div>
                        </li>
                        @else
                        <li class="right clearfix d-flex justify-content-end"><span class="chat-img" style="position: absolute">
                            <img src="{{$ct->img}}" alt="User Avatar"class="img-float" style="width: 50px;height: 50px; border-radius: 50%;" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                  <strong class="pull-right primary-font">{{$ct->name}}</strong>
                                    <small class=" text-muted"><span class="icofont-clock-time"></span>{{\Carbon\Carbon::parse($ct->chat_time)->isoFormat('MMM DD,YYYY HH:mm')}}</small>
                                </div>
                                <p>
                                    {{$ct->chat}}
                                </p>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                  </div>
                </article>

            @if(session('is_login') == true)
              <div class="reply-form">
                <h4>Chat as Public</h4>
                <form id="post_comment" onsubmit="postCommment();return false;" autocomplete="off">
                  <div class="row">
                    {{ csrf_field() }}
                    <div class="col-11 form-group">
                      <input type="text" name="chat" id="txtchat" class="form-control" placeholder="Chat as {{session('name')}}" required>
                    </div>
                    <div class="col-1 form-group">
                      <button type="submit" class="btn btn-primary"> <i class="icofont-facebook-messenger" style="font-size: 20px; margin: 10px;"> </i></button>
                    </div>
                  </div>

                </form>

              </div>
              @endif

            

          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main>
@endsection
@section('js')
  <script>
    $(document).ready(function(){
      setInterval(function(){
            $.ajax({
              url: "clear-cache",
              method : "GET",
            }).done(function (data) {
              if(data == 'success'){
                $("#chatting").load(window.location.href + " #chatting" );
              }
            })
      }, 2300);
    });
  </script>
    <script>
      function postCommment() {
        $.ajax({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('chat_forums')}}",
            processData: false,
            contentType: false,
            data: new FormData($('#post_comment')[0]),
            type: 'post',
            method: 'post'
        }).done(function (data) {
            if (data == 'error') {
                Swal.fire(
                    'error',
                    'invalid form',
                    'error'
                );
            }else{
              $('#txtchat').val("");
              $('#chatting').load('forums #chatting');
            }
        })
      }
    </script>
@endsection