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

          @foreach ($novel as $nv)
          <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
              <article class="entry">
  
                <div class="entry-img">
                  <img src="storage/novel/{{$nv->foto_novel}}" alt="" class="img-fluid">
                </div>
  
                <h2 class="entry-title">
                  <a href="{{url()->current().'/' }}{{$nv->nama_novel}}">{{$nv->nama_novel}}</a>
                </h2>
  
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">{{$nv->name}}</a></li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="{{$nv->published_at}}">{{\Carbon\Carbon::parse($nv->published_at)->isoFormat('MMM DD,YYYY')}}</time></a></li>
                  </ul>
                </div>
  
                <div class="entry-content">
                    <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;
                    -webkit-line-clamp:5; /* number of lines to show */
                    -webkit-box-orient: vertical;">
                        {!! $nv->sinopsis !!}
                    </div>
                  <div class="read-more">
                    <a href="{{url()->current().'/' }}{{$nv->nama_novel}}">Read More</a>
                  </div>
                </div>
  
              </article><!-- End blog entry -->
            </div>
            @endforeach
            
          </div>
          <div class="blog-pagination" data-aos="fade-up">
            <ul class="justify-content-center">
              {{$novel->links()}}
            </ul>
          </div>
          
      
      </div>
    </section><!-- End Blog Section -->

  </main>
@endsection