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
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">12 Comments</a></li>
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

              <h4 class="comments-count">8 Comments</h4>

              <div id="comment-1" class="comment clearfix">
                <img src="assets/img/comments-1.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                  Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                </p>

              </div><!-- End comment #1 -->

              <div id="comment-2" class="comment clearfix">
                <img src="assets/img/comments-2.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                </p>

                <div id="comment-reply-1" class="comment comment-reply clearfix">
                  <img src="assets/img/comments-3.jpg" class="comment-img  float-left" alt="">
                  <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                  <time datetime="2020-01-01">01 Jan, 2020</time>
                  <p>
                    Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                    Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                    Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                  </p>

                  <div id="comment-reply-2" class="comment comment-reply clearfix">
                    <img src="assets/img/comments-4.jpg" class="comment-img  float-left" alt="">
                    <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>
                      Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                    </p>

                  </div><!-- End comment reply #2-->

                </div><!-- End comment reply #1-->

              </div><!-- End comment #2-->

              <div id="comment-3" class="comment clearfix">
                <img src="assets/img/comments-5.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                  Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                </p>

              </div><!-- End comment #3 -->

              <div id="comment-4" class="comment clearfix">
                <img src="assets/img/comments-6.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                </p>

              </div><!-- End comment #4 -->

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Your Website">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">Article <span>({{$jArt}})</span></a></li>
                  <li><a href="#">Novel <span>({{$jNov}})</span></a></li>
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