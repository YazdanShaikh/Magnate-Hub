@include('dashboard.attachments.header')
<div class="row pt-2 pb-2">
    <div class="col-8">
        <h4 class="page-title">Projects</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard/login">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/project">Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-end">
            <a href="/dashboard/project"><button class="btn btn-primary waves-effect waves-light m-1"
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
                    <div class="col-lg-6 col-md-12">
                        <select class="form-control" id="category_id"></select>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <select class="form-control" id="location_id"></select>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <input type="text" class="form-control mt-2" placeholder="Name" id="name" value="{{ $Edit[0]->name }}" required>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <input type="number" class="form-control mt-2" placeholder="Price" id="price" value="{{ $Edit[0]->price }}" required>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <input type="text" class="form-control mt-2" placeholder="Year Trading" id="trading" value="{{ $Edit[0]->trading }}" required>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <input type="text" class="form-control mt-2" placeholder="Earning Type" id="earning_type" value="{{ $Edit[0]->earning_type }}" required>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <input type="text" class="form-control mt-2" placeholder="Stock Level" id="stock_level" value="{{ $Edit[0]->stock_level }}" required>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <textarea id="summary" placeholder="Summary" rows="5" class="form-control mt-2" required>{{ $Edit[0]->summary }}</textarea>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <textarea id="location_information" placeholder="Location Information" rows="5" class="form-control mt-2" required>{{ $Edit[0]->location_information }}</textarea>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="height:32px;">
                                <span class="input-group-text">Card Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="card" accept="image/png, image/gif, image/jpeg">
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
                                    <img src="{{ asset('/uploads/project/card/'. $Edit[0]->card) }}" id="card_tag">
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
<script> Get_Category(); Get_Location();
    function Get_Category() {
        $("#category_id").html('').attr('disabled', 'disabled');
        $.ajax({
            method: "GET",
            url: '/Project/Get/Category',
        })
        .done(function(response) {
            category = response.category; var category_id = '<?php echo $Edit[0]->category_id ?>';
            if (category.length > 0) {
                $("#category_id").removeAttr('disabled').html("");
                category.forEach(function(c) {if (category_id == c.category_id) {$("#category_id").append(`<option value="${c.category_id}">${c.name}</option>`);}});
                category.forEach(function(c) {if (category_id != c.category_id) {$("#category_id").append(`<option value="${c.category_id}">${c.name}</option>`);}});
            } else {
                $("#category_id").html("").append(`<option value="0">No Category Found</option>`);
            }
        });
    }
    function Get_Location() {
        $("#location_id").html('').attr('disabled', 'disabled');
        $.ajax({
            method: "GET",
            url: '/Project/Get/Location',
        })
        .done(function(response) {
            locations = response.location; var location_id = '<?php echo $Edit[0]->location_id ?>';
            if (locations.length > 0) {
                $("#location_id").removeAttr('disabled').html("");
                locations.forEach(function(l) {if (location_id == l.location_id) {$("#location_id").append(`<option value="${l.location_id}">${l.name}</option>`);}});
                locations.forEach(function(l) {if (location_id != l.location_id) {$("#location_id").append(`<option value="${l.location_id}">${l.name}</option>`);}});
            } else {
                $("#location_id").html("").append(`<option value="0">No Location Found</option>`);
            }
        });
    }
    // Create Jquery
    function Edit(event) {
        event.preventDefault();
        ALL = ["name", "price", "trading", "earning_type", "stock_level", "summary", "location_information","location_id","category_id"];
        var fd = new FormData(); fd.append('_token', $("input[name=_token]").val()); fd.append('id', '<?php echo $Edit[0]->id ?>');
        for (let i = 0; i < ALL.length; i++) {fd.append(ALL[i], $("#" + ALL[i]).val());} fd.append('code', '<?php echo $code ?>');
        var card = $("#card")[0].files; for (var i = 0; i < card.length; i++) {fd.append("card[]", card[i], card[i]['name']);}


        $.ajax({
            method: "POST",
            url: '/Project/Update',
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

</script>
