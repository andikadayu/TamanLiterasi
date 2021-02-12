@extends('blog.master')
@section("cl-active","active")
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('collection')}}">Collection</a></li>
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
                <img src="../../storage/novel/{{$nv->foto_novel}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{url()->current()}}">{{$nv->nama_novel}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">{{$nv->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="{{$nv->published_at}}">{{\Carbon\Carbon::parse($nv->published_at)->isoFormat('MMM DD,YYYY')}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">0 Comments</a></li>
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum aspernatur id nobis quisquam error ipsam aperiam. Quod fuga, vero eveniet deserunt corrupti sapiente suscipit enim commodi voluptatem eum illo fugiat.
                </p>
            </div><!-- End blog author bio -->
            
        </div><!-- End blog entries list -->
        @endforeach 
        
        <div class="col-lg-4">
            
            <div class="sidebar">
                <div class="row d-flex justify-content-between">
                    <h3 class="sidebar-title">List Episode({{$Jepisode}}) </h3>
                    <a class="btn btn-success btn-sm" href="{{url()->current().'/episode'}}" style="height: 32px;"><i class="icofont-plus"></a></i>
            </div>
              <div class="sidebar-item recent-posts">
                  @foreach ($episode as $ep)
                  <div class="post-item clearfix">
                    <img src="../../storage/novel/{{$ep->foto_novel}}" alt="">
                    <h4>{{$ep->judul_episode}}</h4>
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