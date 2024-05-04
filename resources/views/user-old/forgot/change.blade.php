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
                        <form onsubmit="Change(event)">
                            <div class="login-form">
                                <div class="w-100">
                                    <h2>Reset Password</h2>
                                    <div class="group">
                                        <label>Password</label>
                                        <input required type="password" class="input" id="password">
                                    </div>
                                    <div class="group">
                                        <label>Confirm Password</label>
                                        <input required type="password" class="input" id="confirm_password">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn theme-btn2 w-100 d-flex justify-content-center align-content-lg-center" type="submit" id="Button">Change</button>
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
    function Change(event) {
        event.preventDefault();
        var access = 0;
        if (access == 0) {
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            if (password != confirm_password) {
                Notification('Confirm Password Not Match', 'error');
                access++;
            }
        }

        if (access == 0) {
            // Check Password Type And Confirm Password
            var number = /([0-9])/;
            var Capital = /[A-Z]+/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            var password = $('#password').val().trim();
            if (password.length < 6) {
                Notification('Weak (should be atleast 6 characters.)', 'error');
                access++;
            } else {
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                    if (password.match(Capital)) {

                    } else {
                        Notification('Password Must Be Contain Atleast One Capital Character', 'error');
                        access++;
                    }
                } else {
                    Notification('Medium (should include alphabets, numbers and special characters.)', 'warning');
                    access++;
                }
            }
        }
        if (access == 0) {
            let All = ['password','confirm_password'];
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            fd.append('code', '<?php echo $code ?>');
            for (let i = 0; i < All.length; i++) {fd.append(All[i], $("#" + All[i]).val());}
            $.ajax({
                method: "POST",
                url: '/Forgot/Change/Password',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {$('#button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);},
            })
            .done(function(response) {
                $('#button').removeAttr('disabled', 'disabled').html('Change');
                location.assign("/login");
            });
        }
    }
</script>
