<div class="modal fade" id="Create_Model">
    <div class="modal-dialog" style="max-width:80%;">
        <div class="modal-content animated slideInUp">
            <div class="modal-header">
                <h5 class="modal-title">Add New</h5>
                <button type="button" class=" btn btn-danger close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="Create(event)">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <select class="form-control" id="category_id"></select>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <select class="form-control" id="location_id"></select>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input type="text" class="form-control mt-2" placeholder="Name" id="name"
                                required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input type="number" class="form-control mt-2" placeholder="Price" id="price"
                                required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input type="text" class="form-control mt-2" placeholder="Year Trading"
                                id="trading" required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input type="text" class="form-control mt-2" placeholder="Earning Type"
                                id="earning_type" required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input type="text" class="form-control mt-2" placeholder="Stock Level"
                                id="stock_level" required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <textarea id="summary" placeholder="Summary" rows="5" class="form-control mt-2" required></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <textarea id="location_information" placeholder="Location Information" rows="5" class="form-control mt-2"
                                required></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <textarea id="description" placeholder="Description" rows="5" class="form-control mt-2" required></textarea>
                        </div>

                        <div class="col-12 mt-3">
                            <input type="file" class="custom-file-input" id="card" accept="image/png, image/gif, image/jpeg" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-block">
                    <div class="row">
                        <div class="col-6">
                            <div class="model_image_view">
                                <img src="/dashboard/assets/images/empty.jpg" id="card_tag" style="width: 200px; height:200px; object-fit:contain;">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger mx-2" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-success" id="Saved_Button"><i
                                        class="fa fa-check-square-o"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="Delete_Model">
    <div class="modal-dialog" style="max-width:30%;">
        <div class="modal-content animated swing" style="background-color: #000;">
            <form onsubmit="Delete(event)">
                <div class="modal-body">
                    <div class="row">
                        <div class="d-flex justify-content-center my-3"><img
                                src="/dashboard/assets/images/delete_icon.png" class="img-fluid" style="width:20%;">
                        </div>
                    </div>
                    <h5 class="text-white text-center">Are You Sure</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger no" data-dismiss="modal"><i
                            class="fa fa-times"></i> No</button>
                    <button type="submit" class="btn btn-success" id="Delete_Button"><i class="fa fa-check"></i>
                        Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('user.attachments.header')

<div class="row justify-content-end">
    <div class="col-sm-11">

        <div class="row pt-2 pb-2">
            <div class="col-8">
                <h4 class="page-title">Projects</h4>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary waves-effect waves-light m-1" title="New" data-toggle="modal"
                        data-target="#Create_Model"><i aria-hidden="true" class="fa fa-plus fa-2x"></i></button>
                    <button class="btn btn-warning waves-effect waves-light m-1" title="Filter" id="filter_button"
                        onclick="Filter_Box_Toggle()">
                        <i aria-hidden="true" class="fa fa-filter fa-2x"></i></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card p-4">
                    <div class="filter_Box" visibility="0">
                        <div class="row">
                            <div class="col-lg-8 col-sm-12 my-2">
                                <input type="text" class="form-control" id="search"
                                    placeholder="Search In DataBase">
                            </div>
                            <div class="col-lg-2 col-sm-6 my-2">
                                <select class="form-control" id="take">
                                    <option value="20">Limit</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-sm-6 my-2">
                                <select class="form-control" id="orderby">
                                    <option value="desc">Sort By</option>
                                    <option value="asc">ASC</option>
                                    <option value="desc">Desc</option>
                                </select>
                            </div>
                            <div class="col-4 my-2">
                                <input type="text" class="form-control" id="Table_Search"
                                    placeholder="Search In Table">
                            </div>
                            <div class="col-3 my-2">
                                <input type="date" class="form-control" id="start_date"
                                    placeholder="Search In Table">
                            </div>
                            <div class="col-3 my-2">
                                <input type="date" class="form-control" id="end_date"
                                    placeholder="Search In Table">
                            </div>
                            <div class="col-2 my-2 d-flex justify-content-around">
                                <button class="btn btn-warning waves-effect waves-light" title="Search"
                                    style="padding: 7px 0; width:47%;" onclick="Get()">
                                    <i aria-hidden="true" class="fa fa-search" style="font-size: 20px;"></i></button>

                                <button class="btn btn-success waves-effect waves-light" title="Reset"
                                    style="padding: 7px 0; width:47%;" onclick="Reset()">
                                    <i aria-hidden="true" class="fa fa-refresh"
                                        style="font-size: 20px;"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-fixed mt-3">
                        <div id="Table_Loader_Box" class="d-none">
                            <div class="Table_Loader"></div>
                        </div>
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Card Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Uploaded By</th>
                                    <th scope="col">Date</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@csrf
<input type="hidden" class="code">
@include('user.attachments.footer')
<script>
    Get();
    Get_Category();
    Get_Location();

    function Get() {
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        let All = ['take', 'orderby', 'search', 'start_date', 'end_date'];
        for (let i = 0; i < All.length; i++) {
            fd.append(All[i], $("#" + All[i]).val());
        }
        $.ajax({
            method: "POST",
            url: '/User/Project/Get',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $("#Table_Loader_Box").removeClass("d-none");
                $("#table").addClass("d-none");
            },
        }).done(function(response) {
            $("#tbody").html("").append(response);
            $("#Table_Loader_Box").addClass("d-none");
            $("#table").removeClass("d-none");
        });
    }

    function Get_Category() {
        $("#category_id").html('').attr('disabled', 'disabled');
        $.ajax({
            method: "GET",
            url: '/User/Project/Get/Category',
        })
        .done(function(response) {
            category = response.category;
            if (category.length > 0) {
                $("#category_id").removeAttr('disabled').html("").append(
                    `<option value="0">Select Category</option>`);
                category.forEach(function(c) {
                    $("#category_id").append(`<option value="${c.category_id}">${c.name}</option>`);
                });
            } else {
                $("#category_id").html("").append(`<option value="0">No Category Found</option>`);
            }
        });
    }

    function Get_Location() {
        $("#location_id").html('').attr('disabled', 'disabled');
        $.ajax({
                method: "GET",
                url: '/User/Project/Get/Location',
            })
            .done(function(response) {
                locations = response.location;
                if (locations.length > 0) {
                    $("#location_id").removeAttr('disabled').html("").append(
                        `<option value="0">Select Location</option>`);
                    locations.forEach(function(l) {
                        $("#location_id").append(`<option value="${l.location_id}">${l.name}</option>`);
                    });
                } else {
                    $("#location_id").html("").append(`<option value="0">No Location Found</option>`);
                }
            });
    }
    // Create Jquery
    function Create(event) {
        event.preventDefault();
        ALL = ["name", "price", "trading", "earning_type", "stock_level", "summary", "location_information",
            "location_id", "category_id", "description"
        ];
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < ALL.length; i++) {
            fd.append(ALL[i], $("#" + ALL[i]).val());
        }
        var card = $("#card")[0].files;
        for (var i = 0; i < card.length; i++) {
            fd.append("card[]", card[i], card[i]['name']);
        }

        $.ajax({
                method: "POST",
                url: '/User/Project/Insert',
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
                    Get();
                    $('.close').click();
                    // Notification('success', 'mini', 'fa fa-check', 'bottom right', response.message);
                    Sweet_Alert('Congratulation', response.message, 'success');
                    $('#Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                    for (let i = 0; i < ALL.length; i++) {
                        $("#" + ALL[i]).val('');
                    }
                    Get_Project();
                    Get_Category();
                    Get_Location();
                }
            });
    }

    function Delete(event) {
        event.preventDefault();
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        fd.append('code', $(".code").val());
        $.ajax({
            method: "POST",
            url: '/User/Project/Delete',
            processData: false,
            contentType: false,
            data: fd
        }).done(function(response) {
            if (response.error == true) {
                location.assign("/dashboard/login");
            }
            if (response.error == false) {
                $('.no').click();
                Get();
                Sweet_Alert('Congratulation', response.message, 'success');
            }
        });
    }

    function Reset() {
        $("#take").html('').append(`<option value="20">Limit</option>`).append(`<option value="50">50</option>`).append(
            `<option value="100">100</option>`).append(`<option value="200">200</option>`).append(
            `<option value="300">300</option>`).append(`<option value="400">400</option>`).append(
            `<option value="500">500</option>`);
        $("#orderby").html('').append(`<option value="desc">Sort By</option>`).append(
            `<option value="asc">ASC</option>`).append(`<option value="desc">Desc</option>`);
        $("#search").val(null);
        $("#start_date").val(null);
        $("#end_date").val(null);
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#card_tag").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#card").change(function() {
        readURL(this);
    });
</script>
