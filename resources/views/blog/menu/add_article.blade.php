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
         <div class="reply-form">
            <h2>Article </h2><br>
            {{-- ini Input Article baru--}}
            <form id="save_article" onsubmit="add_article();return false;" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                    <h4>Article Title</h4>
                    <input type="text" name="nama_artikel" id="nama_artikel" class="form-control" required>
                </div>
                <div class="form-group">
                    <h4>Article Image</h4>
                    <img id="output" height="100%" width="100%"/>
                    <input type="file" name="foto_artikel" id="foto_artikel" accept="image/*" class="form-control" onchange="loadFile(event)" required>
                </div>
                <div class="form-group">
                    <h4>Article Content</h4>
                    <textarea name="isi_artikel" id="summernote" class="form-control" required></textarea>
                </div>

                <input type="submit" value="Upload" class="btn btn-success btn-lg">
            </form>

        </div> 

      </div>
    </section><!-- End Blog Section -->

  </main>
@endsection
@section('js')
<script>
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<script>
    function add_article() {
        $.ajax({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('add_article_proccess')}}",
            processData: false,
            contentType: false,
            data: new FormData($('#save_article')[0]),
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
                location.href = '../';
            }
        })
    }
</script>
@endsection