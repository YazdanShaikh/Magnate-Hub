@include('dashboard.attachments.header')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link rel="stylesheet" href="/dashboard/assets/plugins/summernote/dist/summernote-bs4.css" />

<div class="row pt-2 pb-2">
    <div class="col-8">
        <h4 class="page-title">Blogs</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard/login">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/blog">Blogs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Write</li>
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
                    <div class="col-12">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper" id="swiper-wrapper"></div>
                        </div>

                    </div>
                    <div class="row w-100">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="button-row">
                                <button type="button"
                                    class="btn btn-outline-primary waves-effect waves-light m-1 Prev_Button">
                                    <i class="fa fa-arrow-left fa-2x"></i>
                                </button>
                                <button type="button"
                                    class="btn btn-outline-primary waves-effect waves-light m-1 Next_Button">
                                    <i class="fa fa-arrow-right fa-2x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Link" id="link">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="copy-button"><i class="fa fa-copy"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <textarea id="blog">{{ $Edit[0]->blog }}</textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" id="Saved_Button"><i
                                    class="fa fa-check-square-o"></i> Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard.attachments.footer')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="/dashboard/assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
@csrf
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".Next_Button",
            prevEl: ".Prev_Button",
        },
        autoplay: {
            delay: 2000,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 4,
                spaceBetween: 40
            }
        }
    });

    $('#copy-button').click(function() {
        $("#link").select();
        document.execCommand("copy");
        Notification('success', 'mini', 'fa fa-check', 'bottom right', 'Link Copied');
    });
</script>
<script>
    $('#blog').summernote({
        height: 500,
        tabsize: 2
    });
    // Image
    Get();

    function Get() {
        $.ajax({
            method: "GET",
            url: '/Blog/Get/Image',
            beforeSend: function() {

            },
        }).done(function(response) {
            $("#swiper-wrapper").html("").append(response);
            $("#swiper-wrapper").removeClass("d-none");
        });
    }
    // Create Jquery
    function Edit(event) {
        event.preventDefault();
        ALL = ['blog'];
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < ALL.length; i++) {
            fd.append(ALL[i], $("#" + ALL[i]).val());
        }
        fd.append('code', '<?php echo $code; ?>');

        $.ajax({
                method: "POST",
                url: '/Blog/Save',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(
                        `<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) {
                if (response.error == true) {
                    location.assign("/dashboard/login");
                }
                if (response.error == false) {
                    Notification('success', 'mini', 'fa fa-check', 'bottom right', response.message);
                    $('#Saved_Button').removeAttr('disabled').html(
                        '<i class="fa fa-check-square-o"></i> Save Changes');
                }
            });
    }
</script>
