<div class="modal fade" id="Delete_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are You Sure</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are You Sure You Won't To Delete This?</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">No</button>
                <button class="btn btn-success" type="button" onclick="Delete(event)">Yes</button>
            </div>
        </div>
    </div>
</div>
@include('raising.attachments.header')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<div class="card py-2 px-3 mb-3">
    <div class="row pt-2 pb-2 align-items-center">
        <div class="col-8">
            <h4 class="page-title mb-0">Projects</h4>
        </div>
        <div class="col-4">
            <div class="d-flex justify-content-end">
                <a href="/dashboard/professionals/project/">
                    <button class="btn btn-primary waves-effect waves-light m-1" title="Back"><i
                            class="fa fa-angle-left fa-2x"></i></button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card p-3 mb-1">
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-outline-success Tab" Tab="Uploaded"><i class="fa fa-list"></i>
                        Uploaded</button>
                    <button class="btn btn-outline-success Tab" Tab="Add-New"><i class="fa fa-upload"></i> Add
                        New</button>
                </div>
                <div class="col-6 text-end">
                    <button class="btn btn-danger waves-effect waves-light Delete_Button d-none" title="Delete" data-bs-toggle="modal" data-original-title="test" data-bs-target="#Delete_Model"><i aria-hidden="true" class="fa fa-trash" style="font-size: 20px;"></i></button>
                </div>
            </div>
        </div>

        <div class="card p-4">
            <div id="Tab-Uploaded" class="tab-content">
                <div class="row justify-content-center" style="height : 50vh; overflow-y : scroll;">
                    <div id="Table_Loader_Box" class="d-none">
                        <div class="Table_Loader"></div>
                    </div>
                    <div class="col-12">
                        <div class="row" id="data"></div>
                    </div>
                </div>
            </div>

            <div id="Tab-Add-New" class="tab-content d-none">
                <div class="row">
                    <div class="col-6 mt-2">
                        <button class="btn btn-primary" type="button" onclick="Click('images')">Choose Files</button>
                        <input type="file" id="images" multiple accept="image/png, image/gif, image/jpeg"
                            style="display: none;">
                    </div>
                    <div class="col-6 mt-2 text-end">
                        <button class="btn btn-success d-none" type="button" onclick="Upload()" id="Submit"><i class="fa fa-upload fa-2x mx-2"></i> Upload</button>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row" id="Demo_Images" style="height:50vh;overflow-y:scroll;"> </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@csrf
@include('raising.attachments.footer')
<input type="hidden" id="selected">
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    $(".Tab").on('click', function() {
        $(".tab-content").addClass('d-none');
        $("#Tab-" + $(this).attr('Tab')).removeClass('d-none');
    });
</script>

<script>
    Get();

    function Get() {
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        fd.append('code', '<?php echo $code; ?>');
        $.ajax({
            method: "POST",
            url: '/Project/Raising/Get/Images',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $("#Table_Loader_Box").removeClass("d-none");
                $("#data").addClass("d-none");
            },
        }).done(function(response) {
            $("#data").html("").append(response).removeClass("d-none");
            $("#Table_Loader_Box").addClass("d-none");
        });
    }

    function Upload() {
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        fd.append('code', '<?php echo $code; ?>');
        var Images = $('#images')[0].files;
        for (var i = 0; i < Images.length; i++) {
            fd.append("images[]", Images[i], Images[i]['name']);
        }
        $.ajax({
            method: "POST",
            url: '/Project/Raising/Upload/Images',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('#Submit').attr('disabled', 'disabled').html(' ').append(
                    `<div class="Button_Loader"></div>`);
            },
        })
        .done(function(response) {
            $('#Submit').removeAttr('disabled').html(' ').html('<i class="fa fa-upload fa-2x mx-2"></i> Upload');
            Notification('Project',response.message,'success');
            Get();
            $("#Demo_Images").find('div').remove();
        });
    }

    function Delete(event) {
        event.preventDefault();
        var all = $("#selected").val();
        arrayy = all.split("|");
        for (var i = arrayy.length - 1; i > -1; i--) {
            if (arrayy[i] != '') {
                (function(j) {
                    var fd = new FormData();
                    fd.append('_token', $("input[name=_token]").val());
                    fd.append('image', arrayy[i]);
                    fd.append('code', '<?php echo $code; ?>');

                    $.ajax({
                            method: "POST",
                            url: '/Project/Raising/Delete/Images',
                            processData: false,
                            contentType: false,
                            data: fd,
                        })
                        .done(function(response) {
                            if (response.error == 'logout') {
                                location.assign("/dashboard/logout");
                            }
                        });
                })(i);
            }
        }
        $(".Delete_Button").addClass('d-none');
        $('.btn-close').click();
        Get();
        $("#selected").val(null);
        Notification('Project',response.message,'success');
    }

    // Multiple Images Show
    const fileInput = document.getElementById('images');
    const images = document.getElementById('Demo_Images');

    // Listen to the change event on the <input> element
    fileInput.addEventListener('change', (event) => {
        // Get the selected image file
        const imageFiles = event.target.files;

        // Empty the images div
        images.innerHTML = '';
        if (imageFiles.length > 0) {
            // Loop through all the selected images
            for (const imageFile of imageFiles) {
                const reader = new FileReader();

                // Convert each image file to a string
                reader.readAsDataURL(imageFile);

                // FileReader will emit the load event when the data URL is ready
                // Access the string using reader.result inside the callback function
                reader.addEventListener('load', () => {
                    // Create new <img> element and add it to the DOM
                    images.innerHTML += `
                    <div class="col-lg-3 mb-4">
                        <div class="image-box">
                            <img src="${reader.result}" class="w-100 h-100" style="object-fit: contain;">
                        </div>
                    </div>
                `;
                });
            }
            if (imageFiles.length > 0) {
                $('#Submit').removeClass('d-none');
                $("#images_row").addClass('d-none');
            } else {
                $('#Submit').addClass('d-none');
                $("#images_row").removeClass('d-none');
            }
        } else {
            // Empty the images div
            images.innerHTML = '';
        }
    });
</script>
