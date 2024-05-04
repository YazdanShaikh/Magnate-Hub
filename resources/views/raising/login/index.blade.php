@include('website.attachments.header')
<link rel="stylesheet" href="/website/css/registration.css" />

<section class="login signup become_register py-0">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <div class="form-v10-content w-100">
                    <form class="form-detail" id="myform" onsubmit="Check(event)">
                        <div class="form-right px-5">
                            <h2 class="px-0">Login</h2>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <input type="email" id="email" class="input-text"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-12">
                                    <input type="password" id="password" class="input-text" placeholder="Password"
                                        required>
                                </div>
                                <div class="col-12 mt-1">
                                    <p class="text-white"><a class="text-white" href="/raising/forgot">Forgot
                                            Password</a></p>
                                </div>
                                <div class="col-12 mt-2 text-center">
                                    <input type="submit" class="register mt-2 mb-2" value="Login">
                                </div>
                                <div class="col-12 text-center">
                                    <p class="text-white">If you does'nt have an Acount <a
                                            style=" font-wight:600; background: #fff; color:#4835d4; padding: 1px 4px; border-radius: 3px; font-size: 15px;" href="/register/raising">Register</a>
                                        your self</p>
                                </div>
                                <div class="col-12 text-center mb-5">
                                    <a style=" font-wight:600; background: #fff; color:#4835d4; padding: 1px 4px; border-radius: 3px; font-size: 15px;" href="/login">Login As User</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
                url: '/Raising/Login',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#button').attr('disabled', 'disabled').html(' ').append(
                        `<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) {
                $('#button').removeAttr('disabled', 'disabled').html('SignIn');
                if (response.error == true) {
                    Notification(response.message, 'error');
                    if (response.message == 'Account Not Verified') {
                        location.assign("/verification/raising/" + response.code);
                    }
                } else {
                    location.assign("/dashboard/professionals/");
                }
            });
    }
</script>
