@include('raising.attachments.header')


<div class="modal fade" id="Primium_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Activate Premium Listing</b></h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onclick="Premium(event)">
                <div class="modal-body">
                    <p>
                        Congratulations on your premium listing! Please confirm your premium listing badge. Please note that once it's turned on, you cannot switch it off. Your ad will be distinguished with a crown, receive dedicated support, and enjoy maximum exposure across our platform, emails, and partner networks.
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-bs-dismiss="modal">No</button>
                    <button class="btn btn-success" type="submit">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Sold_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are You Sure</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onclick="Sold(event)">
                <div class="modal-body">
                    <p>Marking your listing <b>SOLD</b> will remove your listing.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">No</button>
                    <button class="btn btn-success" type="submit">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card py-2 px-3 mb-3">
                <div class="row pt-2 pb-2 align-items-center">
                    <div class="col-8">
                        <h4 class="page-title mb-0" style="color:#4835d4;">Listing</h4>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end">
                            @if ($check != 0) 
                            <a href="/dashboard/professionals/project/create">
                                <button class="btn btn-primary waves-effect waves-light m-1" title="New">
                                    Purchase New Listing
                                </button>
                            </a>
                            @else
                            <a href="/dashboard/professionals/project/create">
                                <button class="btn btn-primary waves-effect waves-light m-1" title="New">
                                    <i class="fa fa-plus"></i> Add New Listing
                                </button>
                            </a>
                            @endif
                            <button class="btn btn-warning waves-effect waves-light m-1" title="Filter"
                                id="filter_button" onclick="Filter_Box_Toggle()">
                                <i class="fa fa-filter "></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter_Box mb-3" visibility="0" style="background: #fff;">
                <div class="card py-2 px-3 mb-0">
                    <div class="row">
                        <div class="col-lg-8 col-sm-12 my-2">
                            <label>Search In DataBase</label>
                            <input type="text" class="form-control" id="search" placeholder="Search In DataBase">
                        </div>
                        <div class="col-lg-2 col-sm-6 my-2">
                            <label>Limit</label>
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
                            <label>Listing Sort By</label>
                            <select class="form-control" id="orderby">
                                <option value="desc">Sort By</option>
                                <option value="asc">ASC</option>
                                <option value="desc">Desc</option>
                            </select>
                        </div>
                        <div class="col-4 my-2">
                            <label>Search In Table</label>
                            <input type="text" class="form-control" id="Table_Search" placeholder="Search In Table">
                        </div>
                        <div class="col-3 my-2">
                            <label>Start Date</label>
                            <input type="date" class="form-control" id="start_date">
                        </div>
                        <div class="col-3 my-2">
                            <label>End Date</label>
                            <input type="date" class="form-control" id="end_date">
                        </div>
                        <div class="col-2 my-2 d-flex justify-content-around">
                            <button class="btn btn-primary waves-effect waves-light" title="Search"
                                style="padding: 7px 0; width:47%;" onclick="Get()">
                                <i aria-hidden="true" class="fa fa-search" style="font-size: 30px;"></i>
                            </button>

                            <button class="btn btn-success waves-effect waves-light" title="Reset"
                                style="padding: 7px 0; width:47%;" onclick="Reset()">
                                <i aria-hidden="true" class="fa fa-refresh" style="font-size: 30px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="table-responsive table-fixed mt-3">
                            <div id="Table_Loader_Box" class="d-none">
                                <div class="Table_Loader"></div>
                            </div>
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Views</th>
                                        <th scope="col">Uploaded Date</th>
                                        <th scope="col" class="text-center">Action</th>
                                        <th scope="col" class="text-center">Active</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@csrf
<input type="hidden" class="code">
@include('raising.attachments.footer')
<script>
    Get();
    function Get() {
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        let All = ['take', 'orderby', 'search', 'start_date', 'end_date'];
        for (let i = 0; i < All.length; i++) {
            fd.append(All[i], $("#" + All[i]).val());
        }
        $.ajax({
            method: "POST",
            url: '/Raising/Project/Get',
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
        Get();
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

    function Premium(event){
    event.preventDefault();
    var fd = new FormData();
    fd.append('_token', $("input[name=_token]").val());
    fd.append('code', $(".code").val());
    $.ajax({method: "POST",url: '/Raising/Project/Premium',processData: false,contentType: false,data: fd})
    .done(function(response) {
        if (response.error == 'logout') {location.assign("/raising/login");}
        if (response.error == true) {$('.btn-close').click(); Notification('Warning',response.message,'danger');}
        if (response.error == false) {$('.btn-close').click(); Get(); Notification('Project',response.message,'success');}});}

    function Sold(event){
    event.preventDefault();
    var fd = new FormData();
    fd.append('_token', $("input[name=_token]").val());
    fd.append('code', $(".code").val());
    $.ajax({method: "POST",url: '/Raising/Project/Sold',processData: false,contentType: false,data: fd})
    .done(function(response) {
        if (response.error == 'logout') {location.assign("/raising/login");}
        if (response.error == true) {$('.btn-close').click(); Notification('Warning',response.message,'danger');}
        if (response.error == false) {$('.btn-close').click(); Get(); Notification('Project',response.message,'success');}});}
</script>
