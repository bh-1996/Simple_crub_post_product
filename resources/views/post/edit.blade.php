@extends('layouts.form')
@section('content')
<style>
    .error{
        color:red !important;
    }
    img {
    vertical-align: middle;
    border-style: none;
    border-radius: 50%;
}
</style>
<div class="registration-form">
@if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('message') }}
                    </p>
                @endif
        <form action="{{ route('post.update') }}" method="post" id="add_post" enctype="multipart/form-data">
            @csrf
            <div class="profile-images-box" style="margin-left:35%">
                    <img src="{{ asset('addimage/' . $post->post_image) }}"
                        alt="{{ $post->post_image }}" width="100px" height="100px" class="img-circle elevation-2" id="preview-image-before-upload">
                </div><br>
            <div class="form-group">
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="text" class="form-control item" value="{{$post->post_name}}" name="post_name" placeholder="Post Name" >
            </div>
            <div class="form-group">
                <textarea class="form-control item"  name="post_content" placeholder="Post Content" >{{$post->post_content}}</textarea>
            </div>
            <div class="form-group">
                <input type="file" class="form-control item" name="post_image" accept="image/jpeg, image/jpg, image/png" id="image">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block create-account" value="Update Post">
            </div>
        </form>
        <div class="social-media">
            <a href="{{ route('index') }}">BACK</a>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#add_post").validate({
        errorElement: 'span',
        rules: {
            post_name: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            post_content: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            image: {
                required: true,
            },


        },
        messages: {
            post_name: {
                required: " Post is required",
            },
            post_content: {
                required: "Post content is required",
            }
        },
    });


    });
</script>
@endsection