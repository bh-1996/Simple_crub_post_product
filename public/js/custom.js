$(document).ready(function() {

    //image preview upload
    $('#image').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });



    // alert('gdgd');
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
                maxlength: 500
            }

        },
        messages: {
            post_name: {
                required: "Post name is required.",
            },
            post_content: {
                required: "Post content required.",
            }

        },
    });




});