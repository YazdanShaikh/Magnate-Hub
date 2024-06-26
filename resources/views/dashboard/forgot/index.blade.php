<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name') }} | Recover Account</title>
    <!--favicon-->
    <link rel="icon" href="/dashboard/assets/images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="/dashboard/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="/dashboard/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="/dashboard/assets/css/app-style.css" rel="stylesheet" />
    <link rel="stylesheet" href="/dashboard/assets/plugins/notifications/css/lobibox.min.css"/>
</head>

<body>
    <style>
        .custom-loader {
            width:50px;
            height:16px;
            background:
                radial-gradient(circle closest-side,#ffffff 90%,#0000) 0%   50%,
                radial-gradient(circle closest-side,#ffffff 90%,#0000) 50%  50%,
                radial-gradient(circle closest-side,#ffffff 90%,#0000) 100% 50%;
            background-size:calc(100%/4) 100%;
            background-repeat: no-repeat;
            animation:d7 0.8s infinite linear;
        }
        @keyframes d7 {
            33%{background-size:calc(100%/4) 0%  ,calc(100%/4) 100%,calc(100%/4) 100%}
            50%{background-size:calc(100%/4) 100%,calc(100%/4) 0%  ,calc(100%/4) 100%}
            66%{background-size:calc(100%/4) 100%,calc(100%/4) 100%,calc(100%/4) 0%  }
        }
    </style>
    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="/dashboard/assets/images/logo-icon.png" style="width:31%;">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Find Your Account</div>
                    <form onsubmit="Find(event)">
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Email</label>
                            <div class="position-relative has-icon-right">
                                <input type="email" id="email" class="form-control input-shadow"
                                    placeholder="Enter Email" required>
                                <div class="form-control-position">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block d-flex justify-content-center" id="button">
                            Find
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->



    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="/dashboard/assets/js/jquery.min.js"></script>
    <script src="/dashboard/assets/js/popper.min.js"></script>
    <script src="/dashboard/assets/js/bootstrap.min.js"></script>

    <!-- sidebar-menu js -->
    <script src="/dashboard/assets/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="/dashboard/assets/js/app-script.js"></script>
    <script src="/dashboard/assets/plugins/notifications/js/lobibox.min.js"></script>
</body>
@csrf
</html>
<script>
    function Find(event){
        event.preventDefault();
        let All = ['email'];
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < All.length; i++) {fd.append(All[i], $("#"+All[i]).val());}
        $.ajax({
            method: "POST",
            url: '/dashboard/Find',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('#button').attr('disabled','disabled').html(' ').append(`<div class="custom-loader"></div>`);
            },
        })
        .done(function(response) { $('#button').removeAttr('disabled','disabled').html('FIND');
            if (response.error == true) {
                Notification('error','mini','fa fa-times-circle','bottom right',response.message);
            }
            if (response.error == false) { location.assign("/dashboard/email/verification/" + response.code); }
        });
    }
    function Notification(type,size,icon,position,message){
        Lobibox.notify(type, {
            pauseDelayOnHover: true,
            size: size,
            rounded: true,
            delayIndicator: true,
            icon: icon,
            continueDelayOnInactiveTab: false,
            position: position,
            msg: message
        });
    }
</script>
