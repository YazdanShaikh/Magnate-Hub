@include('user.attachments.header')

<div class="container-fluid">
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-General-tab" data-bs-toggle="pill"
                                    href="#v-pills-General" role="tab" aria-controls="v-pills-General"
                                    aria-selected="false">General</a>
                                {{-- <a class="nav-link mt-2" id="v-pills-Personal-tab" data-bs-toggle="pill"
                                    href="#v-pills-Personal" role="tab" aria-controls="v-pills-Personal"
                                    aria-selected="false">Personal</a> --}}
                                <a class="nav-link mt-2" id="v-pills-password-tab" data-bs-toggle="pill"
                                    href="#v-pills-password" role="tab" aria-controls="v-pills-password"
                                    aria-selected="false">Password</a>
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <div class="tab-content" id="v-pills-tab Content">
                                <div class="tab-pane fade active show" id="v-pills-General" role="tabpanel"
                                    aria-labelledby="v-pills-General-tab">
                                    <form id="generai_form" onsubmit="General(event,'generai_form')" Fields="name,phone,email">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>First Name</label>
                                                <input type="text" class="form-control mt-2" placeholder="Name"
                                                    id="name" value="{{ $user[0]->name }}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Phone</label>
                                                <input type="text" class="form-control mt-2" placeholder="Phone"
                                                    id="phone" value="{{ $user[0]->phone }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Email</label>
                                                <input type="email" class="form-control mt-2" placeholder="Email"
                                                    id="email" value="{{ $user[0]->email }}" required>
                                            </div>

                                            <div class="col-4 mt-4">
                                                <button class="btn btn-primary" type="button" onclick="Click('profile')">Choose Profile</button>
                                                <input type="file" id="profile" accept="image/png, image/jpeg, image/svg" style="display: none;">
                                            </div>

                                            <div class="col-8 mt-4">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" id="Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-2">
                                                @if($user[0]->profile == null)
                                                    <img src="/dashboard/assets/images/empty.jpg" id="profile_tag" style="width: 250px; height:250px; object-fit:contain;">
                                                @else
                                                    <img src="{{ asset('/uploads/user/profile/'. $user[0]->profile) }}" id="profile_tag" style="width: 250px; height:250px; object-fit:contain;">
                                                @endif
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                {{-- <div class="tab-pane fade" id="v-pills-Personal" role="tabpanel"
                                    aria-labelledby="v-pills-Personal-tab">
                                    <form id="Personal_form" onsubmit="Personal(event,'Personal_form')" Fields="seeking,reported_sales,run_rate_sales,ebitda_margin,industry,location_id,assets_or_collateral,interested,title,description,business_overview,product_and_service_overview,assets_overview,facilities_overview,capitalization_overview">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Seeking Investment of</label>
                                                <input type="text" class="form-control mt-2" placeholder="Add you investment for percentage of business Eg; 2.5 million for 25% stake" id="seeking" value="{{ $user[0]->seeking }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Reported Sales</label>
                                                <input type="text" class="form-control mt-2" placeholder="Add your sales / revenue and add PM for per month or PA for per annum" id="reported_sales" value="{{ $user[0]->reported_sales }}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Run Rate Sales</label>
                                                <input type="text" class="form-control mt-2" placeholder="Run Rate Sales" id="run_rate_sales" value="{{ $user[0]->run_rate_sales }}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>EBITDA Margin</label>
                                                <input type="text" class="form-control mt-2" placeholder="EBITDA Margin" id="ebitda_margin" value="{{ $user[0]->ebitda_margin }}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Industry</label>
                                                <input type="text" class="form-control mt-2" placeholder="Industry" id="industry" value="{{ $user[0]->industry }}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Location</label>
                                                <select id="location_id" class="form-control mt-2"></select>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Assets or Collateral </label>
                                                <input type="text" class="form-control mt-2" placeholder="Add the amount  of assets or collateral. EG: Includes physical assets worth 1 Million" id="assets_or_collateral" value="{{ $user[0]->assets_or_collateral }}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Interested to Connect with advisors</label>
                                                <select id="interested" class="form-control mt-2">
                                                    @if($user[0]->interested == 0)
                                                        <option value="0">---</option>
                                                    @endif
                                                    @if($user[0]->interested == 1)
                                                        <option value="1">Yes</option>
                                                    @endif
                                                    @if($user[0]->interested == 2)
                                                        <option value="2">No</option>
                                                    @endif
                                                    @if($user[0]->interested != 1)
                                                        <option value="1">Yes</option>
                                                    @endif
                                                    @if($user[0]->interested != 2)
                                                        <option value="2">No</option>
                                                    @endif                    
                                                </select>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Title</label>
                                                <input type="text" class="form-control mt-2" placeholder="Title" id="title" value="{{ $user[0]->title }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Text description</label>
                                                <input type="text" class="form-control mt-2" placeholder="Text description" id="description" value="{{ $user[0]->description }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Business Overview</label>
                                                <input type="text" class="form-control mt-2" placeholder="Business Overview" id="business_overview" value="{{ $user[0]->business_overview }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Products & Services Overview</label>
                                                <input type="text" class="form-control mt-2" placeholder="Products & Services Overview" id="product_and_service_overview" value="{{ $user[0]->product_and_service_overview }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Assets Overview</label>
                                                <input type="text" class="form-control mt-2" placeholder="Assets Overview" id="assets_overview" value="{{ $user[0]->assets_overview }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Facilities Overview</label>
                                                <input type="text" class="form-control mt-2" placeholder="Facilities Overview" id="facilities_overview" value="{{ $user[0]->facilities_overview }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Capitalization Overview</label>
                                                <input type="text" class="form-control mt-2" placeholder="Capitalization Overview" id="capitalization_overview" value="{{ $user[0]->capitalization_overview }}" required>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" id="Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div> --}}

                                <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                                    aria-labelledby="v-pills-password-tab">
                                    <form id="password_form" onsubmit="Password(event,'password_form')" Fields="current_password,new_password">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Current Password</label>
                                                <input type="password" class="form-control mt-2" placeholder="Current Password"
                                                    id="current_password" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>New Password</label>
                                                <input type="password" class="form-control mt-2" placeholder="New Password"
                                                    id="new_password" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Re-Type Password</label>
                                                <input type="password" class="form-control mt-2" placeholder="Re-Type Password"
                                                    id="confirm_password" required>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" id="Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@csrf
@include('user.attachments.footer')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#profile_tag").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile").change(function() {
        readURL(this);
    });
    Get_Location();
    function Get_Location() {
        $("#location_id").html('').attr('disabled', 'disabled');
        $.ajax({
                method: "GET",
                url: '/User/Setting/Get/Location',
            })
            .done(function(response) {
                locations = response.location;
                if (locations.length > 0) { var location_id = '<?php $user[0]->location_id ?>'; $("#location_id").removeAttr('disabled').html("");
                    locations.forEach(function(l) {
                        if (l.location_id == location_id) {$("#location_id").append(`<option value="${l.location_id}">${l.name}</option>`);}
                    });
                    locations.forEach(function(l) {
                        if (l.location_id != location_id) {$("#location_id").append(`<option value="${l.location_id}">${l.name}</option>`);}
                    });
                } else {
                    $("#location_id").html("").append(`<option value="0">No Location Found</option>`);
                }
            });
    }

    function General(event,id) {
        event.preventDefault();
        ALL = $("#"+id).attr('Fields').split(',');
        var access = 0;
        for (let i = 0; i < ALL.length; i++) {
            if ($("#"+id).find("#" + ALL[i]).val() == '' && $("#"+id).find("#" + ALL[i]).val() == 0) {
                Notification('Warning','Some Fields Are Required','danger'); access++;
            }
        }

        if (access == 0) {
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            for (let i = 0; i < ALL.length; i++) {
                fd.append(ALL[i], $("#"+id).find("#" + ALL[i]).val());
            }
            var profile = $("#profile")[0].files;
            for (var i = 0; i < profile.length; i++) {
                fd.append("profile[]", profile[i], profile[i]['name']);
            }

            $.ajax({
                method: "POST",
                url: '/User/Setting/General',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(
                        `<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) { $('#Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                if (response.error == false) {
                    Notification('General',response.message,'success');
                }
            });
        }
    }

    function Personal(event,id) {
        event.preventDefault();
        ALL = $("#"+id).attr('Fields').split(',');
        var access = 0;
        for (let i = 0; i < ALL.length; i++) {
            if ($("#"+id).find("#" + ALL[i]).val() == '' && $("#"+id).find("#" + ALL[i]).val() == 0) {
                Notification('Warning','Some Fields Are Required','danger'); access++;
            }
        }

        if (access == 0) {
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            for (let i = 0; i < ALL.length; i++) {
                fd.append(ALL[i], $("#"+id).find("#" + ALL[i]).val());
            }

            $.ajax({
                method: "POST",
                url: '/User/Setting/Personal',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(
                        `<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) { $('#Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                if (response.error == false) {
                    Notification('Personal',response.message,'success');
                }
            });
        }
    }

    function Password(event,id) {
        event.preventDefault();

        var access = 0;
        // Check Password Type And Confirm Password
        var password = $("#new_password").val();
        var confirm_password = $("#confirm_password").val();

        if (password != confirm_password) {
            Notification('Warning','Password And Confirm Pasword Is Different','danger'); access++;
        }

        if (access == 0) {
            var number = /([0-9])/;
            var Capital = /[A-Z]+/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            var password = $('#new_password').val().trim();
            if (password.length < 6) {
                Notification('Warning','Weak (should be atleast 6 characters.','warning');
                access++;
            } else {
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                    if(password.match(Capital)){

                    }else{
                        Notification('Warning','Password Must Be Contain Atleast One Capital Character','warning');
                        access++;
                    }
                } else {
                    Notification('Warning','Medium (should include alphabets, numbers and special characters.','warning');
                    access++;
                }
            }
        }


        if (access == 0) {
            let ALL = ['new_password','current_password']; var fd = new FormData(); fd.append('_token', $("input[name=_token]").val());
            for (let i = 0; i < ALL.length; i++) {fd.append(ALL[i], $("#" + ALL[i]).val());}

            $.ajax({
                method: "POST",
                url: '/User/Setting/Password',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) { $('.Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                if (response.error == true) {
                    Notification('Warning',response.message,'danger');
                }else{
                    $(".close").click();
                    Notification('Warning',response.message,'success');
                    location.assign("/logout");
                }
            });
        }
    }
</script>
