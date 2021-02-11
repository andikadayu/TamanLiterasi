<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="google-signin-client_id" content="742020242615-uud1d7vm0vbu9demu992tdlbq88rhp17.apps.googleusercontent.com">
  <meta name="google-signin-cookiepolicy" content="single_host_origin">
  <meta name="google-signin-scope" content="profile email"> 
  <title>Taman Literasi @yield('title')</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <meta content="{{ csrf_token() }}" name="csrf-token">

  <!-- Favicons -->
  <link href="{{asset('blog/img/favicon.png')}}" rel="icon">
  <link href="{{asset('blog/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('blog/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('blog/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('blog/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('blog/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('blog/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('blog/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('blog/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('blog/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('blog/css/chat.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('blog/summernote/summernote-bs4.min.css')}}">

</head>

<body>

  <!-- ======= Header ======= -->
  @include('blog.component.navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @yield('content')

  <!-- ======= Footer ======= -->
  @include('blog.component.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <!-- Vendor JS Files -->
  <script src="{{asset('blog/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('blog/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('blog/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('blog/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('blog/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('blog/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('blog/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('blog/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('blog/js/main.js')}}"></script>

  <script src="{{asset('blog/js/firebase-config.js')}}"></script>

  <script src="{{asset('blog/summernote/summernote-bs4.min.js')}}"></script>

<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-firestore.js"></script>

<script>
  var firebaseConfig = {
    apiKey: "{{config('services.firebase.apiKey')}}",
    authDomain: "{{config('services.firebase.authDomain')}}",
    projectId: "{{config('services.firebase.projectId')}}",
    storageBucket: "{{config('services.firebase.storageBucket')}}",
    messagingSenderId: "{{config('services.firebase.messagingSenderId')}}",
    appId: "{{config('services.firebase.appId')}}",
    measurementId: "{{config('services.firebase.measurementId')}}"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();
</script>

<script>
function onSignIn(googleUser) {
    console.log('Google Auth Response', googleUser);
  // We need to register an Observer on Firebase Auth to make sure auth is initialized.
  var unsubscribe = firebase.auth().onAuthStateChanged(function(firebaseUser) {
    unsubscribe();
    // Check if we are already signed-in Firebase with the correct user.
    if (!isUserEqual(googleUser, firebaseUser)) {
      // Build Firebase credential with the Google ID token.
      var credential = firebase.auth.GoogleAuthProvider.credential(
        googleUser.getAuthResponse().id_token);
      // Sign in with credential from the Google user.
      firebase.auth().signInWithCredential(credential).then(function (response) {
        var profile = googleUser.getBasicProfile();
        login_oauth(profile.getId(),profile.getName(),profile.getImageUrl(),profile.getEmail());        
      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // ...
      });
    } else {
      console.log('User already signed-in Firebase.');
      var profile = googleUser.getBasicProfile();
      login_oauth(profile.getId(),profile.getName(),profile.getImageUrl(),profile.getEmail());

    }
  });
}
function isUserEqual(googleUser, firebaseUser) {
  if (firebaseUser) {
    var providerData = firebaseUser.providerData;
    for (var i = 0; i < providerData.length; i++) {
      if (providerData[i].providerId === firebase.auth.GoogleAuthProvider.PROVIDER_ID &&
        providerData[i].uid === googleUser.getBasicProfile().getId()) {
        return true;
    }
  }
}
return false;
}

function login_oauth(id,name,img,email) {
 $.ajax({
  url : "{{route('login')}}",
  method : "get",
  data : {
    id : id,
    name : name,
    img : img,
    email : email
  },
  success:function (data) {
    console.log(data);
    location.reload();
  }
})
}
</script>
<script>
  function signOut() {
    firebase.auth().signOut().then(() => {
      console.log('User signed out.');
      $.ajax({
        url : "{{route('logout')}}",
        method : "GET",
      }).done(function (data) {
        if(data == 'success'){
          location.href = 'home';
        }
      })
      
    }).catch((error) => {
      console.log(error);
    });
  }
</script>

<script>
  $('#summernote').summernote({
      toolbar: [
        ['font', ['bold', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      height:200,
      popover: {
        air: [
          ['color', ['color']],
          ['font', ['bold', 'underline', 'clear']]
        ]
      }
    });

</script>

@yield('js')

</body>

</html>