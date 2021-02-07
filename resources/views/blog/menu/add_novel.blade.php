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
            <h2>Add Novel </h2><br>
            {{-- ini Input Article baru--}}
            <form id="save_novel" onsubmit="add_novel();return false;" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                    <h4>Novel Title</h4>
                    <input type="text" name="nama_novel" id="nama_novel" class="form-control" required>
                </div>
                <div class="form-group">
                    <h4>Novel Cover</h4>
                    <img id="output" height="100%" width="100%"/>
                    <input type="file" name="foto_novel" id="foto_novel" accept="image/*" class="form-control" onchange="loadFile(event)" required>
                </div>
                <div class="form-group">
                    <h4>Synopsis</h4>
                    <textarea name="sinopsis" id="summernote" class="form-control" required></textarea>
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
    function add_novel() {
        $.ajax({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('novel_proccess')}}",
            processData: false,
            contentType: false,
            data: new FormData($('#save_novel')[0]),
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