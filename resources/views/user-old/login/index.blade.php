@include('website.attachments.header')

<section class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">
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
                                    <div class="group">
                                        <label>Email</label>
                                        <input required type="email" class="input" id="email">
                                    </div>
                                    <div class="group">
                                        <label>Password</label>
                                        <input required type="password" class="input" id="password">
                                    </div>
                                    <div class="col-12 text-end">
                                        <a href="/forgot" class="forgot">Forgot Password</a>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn theme-btn2 w-100 d-flex justify-content-center align-content-lg-center" type="submit" id="Button">Login</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <p>Not a Member? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="/register" class="forgot">Register Your Self</a></p>
                                    </div>
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
