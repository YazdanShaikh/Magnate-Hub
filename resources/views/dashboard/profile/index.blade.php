<div class="modal fade" id="Name_Model">
    <div class="modal-dialog" style="max-width:50%;">
        <div class="modal-content animated slideInUp">
            <div class="modal-header">
                <h5 class="modal-title">Change Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="Change_Name(event)">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-3">
                            <input type="text" class="form-control" placeholder="FullName" id="name" value="{{ session()->get("name") }}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger mx-2" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-success Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="Email_Model">
    <div class="modal-dialog" style="max-width:50%;">
        <div class="modal-content animated slideInUp">
            <div class="modal-header">
                <h5 class="modal-title">Change Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="Change_Email(event)">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-3">
                            <input type="email" class="form-control" placeholder="Email" id="email" value="{{ session()->get("email") }}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger mx-2" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-success Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="Password_Model">
    <div class="modal-dialog" style="max-width:70%;">
        <div class="modal-content animated slideInUp">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="Change_Password(event)">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-3">
                            <div class="position-relative has-icon-right">
                                <input type="password" id="current_password" class="form-control" placeholder="Current Password" required>
                                <div class="form-control-position" style="top:10px;">
                                    <i class="icon-lock" onclick="Type_Fuction_1()"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-3">
                            <div class="position-relative has-icon-right">
                                <input type="password" id="password" class="form-control" placeholder="New Password" required>
                                <div class="form-control-position" style="top:10px;">
                                    <i class="icon-lock" onclick="Type_Fuction_2()"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-3">
                            <div class="position-relative has-icon-right">
                                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                <div class="form-control-position" style="top:10px;">
                                    <i class="icon-lock" onclick="Type_Fuction_3()"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger mx-2" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-success Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('dashboard.attachments.header')
<div class="row pt-2 pb-2">
    <div class="col-8">
        <h4 class="page-title">Profile</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard/home">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary waves-effect waves-light m-1" title="Edit Name" data-toggle="modal"
            data-target="#Name_Model"><i aria-hidden="true" class="fa fa-edit fa-2x"></i></button>
            <button class="btn btn-success waves-effect waves-light m-1" title="Edit Email" data-toggle="modal"
            data-target="#Email_Model"><i aria-hidden="true" class="fa fa-envelope fa-2x"></i></button>
            <button class="btn btn-danger waves-effect waves-light m-1" title="Change Password" data-toggle="modal"
            data-target="#Password_Model"><i aria-hidden="true" class="fa fa-lock fa-2x"></i></button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div style="height:60vh;text-align:center">
                        <img src="/dashboard/assets/images/profile.png" class="img-fluid h-100" style="object-fit:contain;">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="profile pt-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="box">
                                    <h6>Full Name:</h6>
                                    <p>M.Bilal Nazim Ajmery</p>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="box">
                                    <h6>Email:</h6>
                                    <p>Bilalajmery2122@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="box">
                                    <h6>Password:</h6>
                                    <p>........</p>
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
<input type="hidden" id="code">
@include('dashboard.attachments.footer')
<script>
    function Change_Name(event) {
        event.preventDefault();
        let ALL = ['name']; var fd = new FormData(); fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < ALL.length; i++) {fd.append(ALL[i], $("#" + ALL[i]).val());}

        $.ajax({
            method: "POST",
            url: '/Profile/Update/Name',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('.Saved_Button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
            },
        })
        .done(function(response) {
            if (response.error == true) {Notification('error', 'mini', 'fa fa-check', 'bottom right', response.message); location.assign("/dashboard/logout");}
            if (response.error == false) {$(".close").click(); Notification('success', 'mini', 'fa fa-check', 'bottom right', response.message);$('.Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');}
        });
    }
    function Change_Email(event) {
        event.preventDefault();
        let ALL = ['email']; var fd = new FormData(); fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < ALL.length; i++) {fd.append(ALL[i], $("#" + ALL[i]).val());}

        $.ajax({
            method: "POST",
            url: '/Profile/Update/Email',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('.Saved_Button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
            },
        })
        .done(function(response) {
            if (response.error == true) {Notification('error', 'mini', 'fa fa-check', 'bottom right', response.message);}
            if (response.error == false) {$(".close").click(); Notification('success', 'mini', 'fa fa-check', 'bottom right', response.message);$('.Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');}
            if (response.reload == true) {location.assign("/dashboard/logout");}
        });
    }
    function Change_Password(event) {
        event.preventDefault();

        var access = 0;
        // Check Password Type And Confirm Password
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        if (password != confirm_password) {
            Notification('error', 'mini', 'fa fa-times-circle', 'bottom right', 'Password And Confirm Pasword Is Different');
            access++;
        }

        if (access == 0) {
            var number = /([0-9])/;
            var Capital = /[A-Z]+/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            var password = $('#password').val().trim();
            if (password.length < 6) {
                Notification('error', 'mini', 'fa fa-times-circle', 'bottom right', 'Weak (should be atleast 6 characters.');
                access++;
            } else {
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                    if(password.match(Capital)){

                    }else{
                        Notification('warning', 'mini', 'fa fa-warning', 'bottom right', 'Password Must Be Contain Atleast One Capital Character');
                        access++;
                    }
                } else {
                    Notification('warning', 'mini', 'fa fa-warning', 'bottom right', 'Medium (should include alphabets, numbers and special characters.');
                    access++;
                }
            }
        }


        if (access == 0) {
            let ALL = ['password','current_password']; var fd = new FormData(); fd.append('_token', $("input[name=_token]").val());
            for (let i = 0; i < ALL.length; i++) {fd.append(ALL[i], $("#" + ALL[i]).val());}

            $.ajax({
                method: "POST",
                url: '/Profile/Update/Password',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('.Saved_Button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) { $('.Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                if (response.error == true) {
                    Notification('error', 'mini', 'fa fa-check', 'bottom right', response.message);
                }else{
                    $(".close").click(); Notification('success', 'mini', 'fa fa-check', 'bottom right', response.message);
                    location.assign("/dashboard/logout");
                }
            });
        }
    }

    function Type_Fuction_1() {
    var x = document.getElementById("current_password");
    if (x.type === "password") {x.type = "text";
    } else {x.type = "password";}}

    function Type_Fuction_2() {
    var x = document.getElementById("password");
    if (x.type === "password") {x.type = "text";
    } else {x.type = "password";}}

    function Type_Fuction_3() {
    var x = document.getElementById("confirm_password");
    if (x.type === "password") {x.type = "text";
    } else {x.type = "password";}}
</script>
