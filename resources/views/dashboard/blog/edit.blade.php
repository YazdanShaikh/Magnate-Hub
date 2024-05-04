@include('dashboard.attachments.header')
<div class="row pt-2 pb-2">
    <div class="col-8">
        <h4 class="page-title">Blogs</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard/login">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/blog">Blogs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-end">
            <a href="/dashboard/blog"><button class="btn btn-primary waves-effect waves-light m-1"
                    title="Back To Listing"><i aria-hidden="true"
                        class="fa fa-arrow-circle-o-left fa-2x"></i></button></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <form onsubmit="Edit(event)">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <input type="text" class="form-control" placeholder="Write Blog Title" id="name" value="{{ $Edit[0]->name }}" required>
                    </div>
                    <div class="col-lg-12 col-md-12 mt-2">
                        <textarea id="description" rows="5" class="form-control" placeholder="Write Card Description">{{ $Edit[0]->description }}</textarea>
                    </div>
                    <div class="col-lg-6 col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Write Writter Name" id="writter_name" value="{{ $Edit[0]->writter_name }}" required>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="height:32px;">
                                <span class="input-group-text">Writter Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="writter_image"
                                    accept="image/png, image/gif, image/jpeg">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="height:32px;">
                                <span class="input-group-text">Card Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="card"
                                    accept="image/png, image/gif, image/jpeg">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="col-6">
                            <div class="d-flex justify-content-center">
                                <div class="model_image_view">
                                    <img src="{{ asset('/uploads/blog/writter_image/'. $Edit[0]->writter_image) }}" id="writter_tag">
                                </div>
                                <div class="model_image_view">
                                    <img src="{{ asset('/uploads/blog/card/'. $Edit[0]->card) }}" id="card_tag">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" id="Saved_Button"><i class="fa fa-check-square-o"></i> Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard.attachments.footer')
@csrf
<script>
    // Create Jquery
    function Edit(event) {
        event.preventDefault(); ALL = ['name','description','writter_name']; var fd = new FormData(); fd.append('_token', $("input[name=_token]").val()); fd.append('id', '<?php echo $Edit[0]->id ?>');
        for (let i = 0; i < ALL.length; i++) {fd.append(ALL[i], $("#" + ALL[i]).val());} fd.append('code', '<?php echo $code ?>');
        var card = $("#card")[0].files; for (var i = 0; i < card.length; i++) {fd.append("card[]", card[i], card[i]['name']);}
        var writter_image = $("#writter_image")[0].files; for (var i = 0; i < writter_image.length; i++) {fd.append("writter_image[]", writter_image[i], writter_image[i]['name']);}

        $.ajax({
            method: "POST",
            url: '/Blog/Update',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
            },
        })
        .done(function(response) {
            if (response.error == true) {
                location.assign("/dashboard/login");
            }
            if (response.error == false) {
                Notification('success', 'mini', 'fa fa-check', 'bottom right', response.message);
                $('#Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Save Changes');
            }
        });
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#card_tag").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#card").change(function(){readURL(this);});

    function readURL_2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#writter_tag").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#writter_image").change(function(){readURL_2(this);});
</script>
