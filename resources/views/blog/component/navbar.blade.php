<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a href="index.html">Taman Literasi</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
            <li class="@yield('hm-active')">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="@yield('bl-active')">
                <a href="{{route('blogs')}}">Article</a>
            </li>
            <li class="@yield('nv-active')">
              <a href="{{route('blogs')}}">Novel</a>
            </li>
            <li class="@yield('cl-active')">
                <a href="{{route('collection')}}">Collection</a>
            </li>
            <li class="@yield('fr-active')">
              <a href="portfolio.html">Forums</a>
          </li>
        </ul>

      </nav><!-- .nav-menu -->
      
      @if (session('is_login')==false)
      <div data-onsuccess="onSignIn" class="ml-auto g-signin2" ></div>
      @else
      <div class="ml-auto">
        <img src="{{session('img')}}" class="rounded-circle float-left" style="width: 10%;height: 10%;" alt="">
        {{session('name')}}
        <a class="get-started-btn" onclick="signOut()" href="{{route('logout')}}">Logout</a>
      </div>
      @endif
    </div>
  </header>