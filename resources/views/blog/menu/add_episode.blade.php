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
            <h2>Add Episode </h2><br>
            {{-- ini Input Article baru--}}
            <form id="save_episode" onsubmit="add_episode();return false;" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <input type="hidden" name="id_novel" value="{{$id}}" required>
                <div class="form-group">
                    <h4>Episode Title</h4>
                    <input type="text" name="judul_episode" id="judul_episode" class="form-control" required>
                </div>
                <div class="form-group">
                    <h4>Episode Content</h4>
                    <textarea name="isi_episode" id="summernote" class="form-control" required></textarea>
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
    function add_episode() {
        $.ajax({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('add_episode_proccess')}}",
            processData: false,
            contentType: false,
            data: new FormData($('#save_episode')[0]),
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
                location.href = '../../';
            }
        })
    }
</script>
@endsection