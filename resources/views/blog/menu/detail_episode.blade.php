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
            @foreach ($episode as $ep)
            <article class="entry entry-single">
              <h2 class="entry-title">
                <a href="#">{{$ep->judul_episode}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="{{$ep->tanggal}}">{{\Carbon\Carbon::parse($ep->tanggal)->isoFormat('MMM DD,YYYY')}}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!! $ep->isi_episode !!}

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
        @endforeach 
        </div>
        <div class="col-lg-4">
            
            <div class="sidebar">
                <div class="row d-flex justify-content-between">
                    <h3 class="sidebar-title">List Next Episode </h3>
            </div>
              <div class="sidebar-item recent-posts">
                  @foreach ($next as $nx)
                  <div class="post-item clearfix">
                    <img src="../../storage/novel/" alt="">
                    <h4><a href="{{url()->current().'/../'.base64_encode($nx->ide)}}">{{$nx->judul_episode}}</a></h4>
                    
                    <time datetime="{{$nx->tanggal}}">{{\Carbon\Carbon::parse($nx->tanggal)->isoFormat('MMM DD,YYYY')}}</time>
                  </div>
                  @endforeach
                  {{ $next->links() }}
              </div>

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>


    </section><!-- End Blog Section -->

  </main>
@endsection
@section('js')
<script>

</script>
@endsection