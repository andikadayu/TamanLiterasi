@extends('blog.master')
@section("bl-active","active")
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('blogs')}}">Article</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    
        
    
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">
            @foreach ($article as $art)
            <article class="entry entry-single">

              <div class="entry-img">
                <img src="../storage/article/{{$art->foto_artikel}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{url()->current()}}">{{$art->nama_artikel}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">{{$art->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="{{$art->upload_at}}">{{\Carbon\Carbon::parse($art->upload_at)->isoFormat('MMM DD,YYYY')}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">{{$jkomentar}} Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!! $art->isi_artikel !!}

              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Article</a></li>
                  </ul>
                </div>
              </div>

            </article><!-- End blog entry -->
            
            <div class="blog-author clearfix">
                <img src="{{$art->img}}" class="rounded-circle float-left" alt="">
                <h4>{{$art->name}}</h4>
                
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum aspernatur id nobis quisquam error ipsam aperiam. Quod fuga, vero eveniet deserunt corrupti sapiente suscipit enim commodi voluptatem eum illo fugiat.
                </p>
            </div><!-- End blog author bio -->
            @endforeach

            <div class="blog-comments">

              <h4 class="comments-count">{{$jkomentar}} Comments <i class="icofont-refresh" onclick="location.reload();"></i> </h4>
              @foreach ($komentar as $k)
              
              <div id="comment-1" class="comment clearfix">
                <img src="{{$k->img}}" class="comment-img  float-left" alt="">
                <h5><a href="#">{{$k->name}} @if($k->upload_by == $k->id_user) <i class="icofont-edit-alt" style="color: #1f9fff; font-weight: 560;">Author</i> @endif</a></h5>
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

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="{{route('blogs')}}">Article <span>({{$jArt}})</span></a></li>
                  <li><a href="{{route('novel')}}">Novel <span>({{$jNov}})</span></a></li>
                </ul>

              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                  @foreach ($recent as $rec)
                  <div class="post-item clearfix">
                    <img src="../storage/article/{{$rec->foto_artikel}}" alt="">
                    <h4><a href="{{url('article').'/'}}{{$rec->nama_artikel}}">{{$rec->nama_artikel}}</a></h4>
                    <time datetime="{{$art->upload_at}}">{{\Carbon\Carbon::parse($art->upload_at)->isoFormat('MMM DD,YYYY')}}</time>
                  </div>
                  @endforeach
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
            url: "{{route('comment_article')}}",
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