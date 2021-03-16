@extends('blog.master')
@section("nv-active","active")
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Novel</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    
        
    
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">
            @foreach ($novel as $nv)
            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{asset('storage/novel/')}}{{'/'.$nv->foto_novel}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{url()->current()}}">{{$nv->nama_novel}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">{{$nv->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="{{$nv->published_at}}">{{\Carbon\Carbon::parse($nv->published_at)->isoFormat('MMM DD,YYYY')}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">{{$jkomentar}} Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!! $nv->sinopsis !!}

              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Novel</a></li>
                  </ul>
                </div>
              </div>

            </article><!-- End blog entry -->
            
            <div class="blog-author clearfix">
                <img src="{{$nv->img}}" class="rounded-circle float-left" alt="">
                <h4>{{$nv->name}}</h4>
                
                <p>
                    {{$nv->description}}
                </p>
            </div><!-- End blog author bio -->
        @endforeach 
        <div class="blog-comments">

            <h4 class="comments-count">{{$jkomentar}} Comments <i class="icofont-refresh" onclick="location.reload();"></i> </h4>
            @foreach ($komentar as $k)
            
            <div id="comment-1" class="comment clearfix">
              <img src="{{$k->img}}" class="comment-img  float-left" alt="">
              <h5><a href="#">{{$k->name}} @if($k->author == $k->id_user) <i class="icofont-edit-alt" style="color: #1f9fff; font-weight: 560;">Author</i> @endif</a></h5>
              <time datetime="{{$k->tanggal}}">{{\Carbon\Carbon::parse($k->tanggal)->isoFormat('MMM DD,YYYY HH:mm')}}</time>
              <p>
                {{$k->isi_chat}}
              </p>
              
            </div><!-- End comment #1 -->
            @endforeach

            {{ $komentar->links() }}

            @if(session('is_login') == true)
            <div class="reply-form">
              <h4>Leave a Reply</h4>
              <form id="post_comment" onsubmit="postCommment();return false;">
                <div class="row">
                  {{ csrf_field() }}
                  @foreach ($getId as $g)
                  <input type="hidden" name="id_detail" value="{{$g->id}}" required>
                  @endforeach
                  <div class="col form-group">
                    <textarea name="komentar" class="form-control" placeholder="Your Comment*" required></textarea>
                  </div>
                </div>
                <input type="submit" value="Post Comment" class="btn btn-primary">

              </form>

            </div>
            @endif
          </div><!-- End blog comments -->
        </div>
        
        <div class="col-lg-4">
            
            <div class="sidebar">
                <div class="row d-flex justify-content-between">
                    <h3 class="sidebar-title">List Episode({{$Jepisode}}) </h3>
            </div>
              <div class="sidebar-item recent-posts">
                  @foreach ($episode as $ep)
                  <div class="post-item clearfix">
                    <img src="../../storage/novel/{{$ep->foto_novel}}" alt="">
                    <h4><a href="{{url()->current().'/'.base64_encode($ep->ide)}}">{{$ep->judul_episode}}</a></h4>
                    
                    <time datetime="{{$ep->tanggal}}">{{\Carbon\Carbon::parse($ep->tanggal)->isoFormat('MMM DD,YYYY')}}</time>
                  </div>
                  @endforeach
                  {{ $episode->links() }}
              </div>

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>


      </div>
    </section><!-- End Blog Section -->

  </main>
@endsection
@section('js')
<script>
    function postCommment() {
      $.ajax({
          headers: {
              'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{route('comment_novel')}}",
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
              location.reload();
          }
      })
    }
</script>
@endsection