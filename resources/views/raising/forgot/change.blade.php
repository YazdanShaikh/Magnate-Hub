@include('website.attachments.header')
<link rel="stylesheet" href="/website/css/registration.css"/>
<section class="login signup become_register">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <div class="form-v10-content w-100">
                    <form class="form-detail" id="myform" onsubmit="Change(event)">
                        <div class="form-right px-5">
                            <h2 class="px-0">Change Password</h2>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <input type="password" id="password" class="input-text" placeholder="Write New Password" required>
                                </div>

                                <div class="col-12 mb-4">
                                    <input type="password" id="confirm_password" class="input-text" placeholder="Re-Type Password" required>
                                </div>
                                
                                <div class="col-12 mt-2 text-end">
                                    <input type="submit" class="register my-3" value="Change Password">
                                </div>
                                
                            </div>
                            <div class="form-group">

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
                url: '/Raising/Forgot/Change/Password',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {$('#button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);},
            })
            .done(function(response) {
                $('#button').removeAttr('disabled', 'disabled').html('Change');
                location.assign("/login/professionals/");
            });
        }
    }
</script>
