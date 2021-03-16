<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Taman Literasi</h3>
              <p>
                SMK PGRI 3 MALANG <br>
                Jl Raya Tlogomas Gg.9 no.29, Tlogomas, Kec.Lowokwaru, Kota Malang, Jawa Timur 65144<br><br>
                {{-- <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br> --}}
              </p>
              {{-- Social Media Link  --}}
              {{-- <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div> --}}
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('blogs')}}">Article</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('novel')}}">Novel</a></li>
              @if (session('is_login') == true)
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('collection')}}">Collection</a></li>
              @endif
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('forums')}}">Forums</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Kelompok 3</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">SKARIGA Students</a>
      </div>
    </div>
  </footer>