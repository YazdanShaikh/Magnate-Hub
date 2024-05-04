@include('website.attachments.header')
<section class="login signup">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-11">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <div class="img-div2">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <form onsubmit="Create(event)">
                            <div class="login-form">
                                <div class="w-100">
                                    <h2>Sign Up</h2>
                                    <div class="group">
                                        <label>Name</label>
                                        <input required type="text" class="input" id="name">
                                    </div>
                                    <div class="group">
                                        <label>Email</label>
                                        <input required type="email" class="input" id="email">
                                    </div>
                                    {{-- <div class="group">
                                        <label>Phone</label>
                                        <input required type="text" class="input" id="phone">
                                    </div> --}}
                                    <div class="group">
                                        <label>Password</label>
                                        <input required type="password" class="input" id="password">
                                    </div>
                                    <div class="group">
                                        <label>Confirm Password</label>
                                        <input required type="password" class="input" id="confirm_password">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn theme-btn2 w-100 d-flex justify-content-center align-content-center"
                                            id="Create_Button" type="submit">Sign Up</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <p>Already Have An Account! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="/login"
                                                class="forgot">Login</a></p>
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
<script>
    function Create(event) {
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
            ALL = ["name", "email", "phone", "password"];
            var fd = new FormData();
            fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
            for (let i = 0; i < ALL.length; i++) {
                fd.append(ALL[i], $("#" + ALL[i]).val());
            }
            $.ajax({
                    method: "POST",
                    url: '/User/Register',
                    processData: false,
                    contentType: false,
                    data: fd,
                    beforeSend: function() {
                        $('#Create_Button').attr('disabled', 'disabled').html(' ').append(
                            `<div class="Button_Loader"></div>`);
                    },
                })
                .done(function(response) {
                    if (response.error == true) {
                        Notification(response.message, 'error');
                    }
                    if (response.error == false) {
                        location.assign("/verification/" + response.code);
                    }
                    $('#Create_Button').removeAttr('disabled').html('Join Now');
                });
        }
    }
</script>
