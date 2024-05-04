@include('website.attachments.header')

<section class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-11">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <div class="img-div">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <form onsubmit="Check(event)">
                            <div class="login-form">
                                <div class="w-100">
                                    <h2>Login</h2>
                                    <div class="row mt-3">
                                        <div class="col-sm-3 col-6 my-2 px-1">
                                            <a href="/login/professionals/"><button type="button" style="padding: 5px 0 !important;" class="btn theme-btn2 w-100">Browser</button></a>
                                        </div>
                                        <div class="col-sm-3 col-6 my-2 px-1">
                                            <a href="/login/professionals/"><button type="button" style="padding: 5px 0 !important;" class="btn theme-btn2 w-100">Seller</button></a>
                                        </div>
                                        <div class="col-sm-3 col-6 my-2 px-1">
                                            <a href="/login/professionals/"><button type="button" style="padding: 5px 0 !important;" class="btn theme-btn2 w-100">Raiser</button></a>
                                        </div>
                                        <div class="col-sm-3 col-6 my-2 px-1">
                                            <a href="/login/professionals/"><button type="button" style="padding: 5px 0 !important;" class="btn theme-btn2 w-100">Enterprise</button></a>
                                        </div>
                                    </div>
                                    <div class="group my-2">
                                        <label>Email</label>
                                        <input required type="email" class="input" id="email">
                                    </div>
                                    <div class="group my-2">
                                        <label>Password</label>
                                        <input required type="password" class="input" id="password">
                                    </div>
                                    <div class="col-12 text-end">
                                        <a href="/forgot" style="color:#4835d4;">Forgot Password</a>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn theme-btn2 w-100 d-flex justify-content-center align-content-lg-center" type="submit" id="Button">Login</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <p>Not a Member? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="/register" class="forgot">Register Here</a></p>
                                    </div>
                                    <!-- <div class="col-12 text-center mt-0">
                                        <p>Login As &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="/login/professionals/" class="forgot">Capital Raiser / Seller</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('website.attachments.footer')
@csrf
<script>
    function Check(event) {
        event.preventDefault();
        let All = ['email', 'password'];
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < All.length; i++) {
            fd.append(All[i], $("#" + All[i]).val());
        }
        $.ajax({
            method: "POST",
            url: '/login',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('#button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
            },
        })
        .done(function(response) {
            $('#button').removeAttr('disabled', 'disabled').html('SignIn');
            if (response.error == true) { Notification(response.message, 'error');
                if (response.message == 'Account Not Verified') {location.assign("/verification/" + response.code);}
            }else{location.assign("/dashboard/user");}
        });
    }
</script>
