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
            <li>Collection</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">
          <h2>Article <a class="btn btn-warning icofont-plus " href="{{route('add_article')}}"> Add Article</a></h2>
        <div class="row">
        @foreach ($article as $art)
        <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">

              <div class="entry-img">
                <img src="storage/article/{{$art->foto_artikel}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{url('article').'/' }}{{$art->nama_artikel}}">{{$art->nama_artikel}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">{{$art->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="{{$art->upload_at}}">{{\Carbon\Carbon::parse($art->upload_at)->isoFormat('MMM DD,YYYY')}}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                  <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;
                  -webkit-line-clamp:5; /* number of lines to show */
                  -webkit-box-orient: vertical;">
                      {!! $art->isi_artikel !!}
                  </div>
                <div class="read-more">
                  <a href="{{url('article').'/' }}{{$art->nama_artikel}}">Read More</a>
                </div>
                <a href="" class="btn btn-info">Edit</a>
                <a href="" class="btn btn-warning">Delete</a>
              </div>

            </article><!-- End blog entry -->
          </div>
        @endforeach
        </div>

        <h2>Novel <a class="btn btn-warning icofont-plus "> Add Novel</a></h2>
        <div class="row">
        {{-- ini list novel  --}}
        </div>


      </div>
    </section><!-- End Blog Section -->

  </main>
@endsection