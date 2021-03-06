@extends('blog.master')
@section("hm-active","active")
@section('content')
    <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('blog/img/slide/slide-1.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Taman Literasi</span></h2>
              <p class="animate__animated animate__fadeInUp">Selamat Datang di Taman Literasi Kelas 12 RPA Kelompok 2, di Website ini di harapkan siapa saja bisa menemukan artikel yang di butuhkan. Mulai dari Berita, Kisah-kisah, cerpen, Puisi dan lain sebagainya di harapkan di Website ini bisa untuk mengisi waktu kosong pengunjung yang menggunakan Website ini.</p>
              <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{asset('blog/img/slide/slide-2.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Selamat Datang di Taman Literasi</h2>
              <p class="animate__animated animate__fadeInUp">Selamat Datang di Taman Literasi Kelas 12 RPA Kelompok 2, di Website ini di harapkan siapa saja bisa menemukan artikel yang di butuhkan. Mulai dari Berita, Kisah-kisah, cerpen, Puisi dan lain sebagainya di harapkan di Website ini bisa untuk mengisi waktu kosong pengunjung yang menggunakan Website ini.</p>
              <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{asset('blog/img/slide/slide-3.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Selamat Datang di Taman Literasi</h2>
              <p class="animate__animated animate__fadeInUp">Selamat Datang di Taman Literasi Kelas 12 RPA Kelompok 2, di Website ini di harapkan siapa saja bisa menemukan artikel yang di butuhkan. Mulai dari Berita, Kisah-kisah, cerpen, Puisi dan lain sebagainya di harapkan di Website ini bisa untuk mengisi waktu kosong pengunjung yang menggunakan Website ini.</p>
              <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    {{-- <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <h2>Eum ipsam laborum deleniti velitena</h2>
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
            </ul>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section --> --}}

    <!-- ======= Clients Section ======= -->
    {{-- <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section --> --}}

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Service</h2>
          <p>The Services We Offer</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="icofont-web"></i>
              <h4><a href="#">Flexibility</a></h4>
              <p>Bisa di akses dimanapun dan kapanpun karena berbentuk Website</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-gears"></i>
              <h4><a href="#">Easy to Use</a></h4>
              <p>Tampilan yang simple membuat aplikasi ini lebih mudah digunakan</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-speech-comments"></i>
              <h4><a href="#">Interactive</a></h4>
              <p>Dilengkapi fitur komentar serta fitur forums untuk berinteraksi dengan user lainnya</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-learn"></i>
              <h4><a href="#">Learn Togother</a></h4>
              <p>Latih kreativiasmu dengan membuat karya sendiri dan mengunggahnya</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->
@endsection