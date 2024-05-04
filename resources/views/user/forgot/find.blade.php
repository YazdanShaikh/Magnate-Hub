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
                        <form onsubmit="Find(event)">
                            <div class="login-form">
                                <div class="w-100">
                                    <h2>Find Your Account</h2>
                                    <div class="group">
                                        <label>Email</label>
                                        <input required type="email" class="input" id="email">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn theme-btn2 w-100 d-flex justify-content-center align-content-lg-center" type="submit" id="Button">Find</button>
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
    function Find(event) {
        event.preventDefault();
        let All = ['email'];
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < All.length; i++) {
            fd.append(All[i], $("#" + All[i]).val());
        }
        $.ajax({
            method: "POST",
            url: '/Find',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {$('#button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);},
        })
        .done(function(response) {
            $('#button').removeAttr('disabled', 'disabled').html('SignIn');
            if (response.error == true) {$("#msgg").text('Try Again With Another Email').css({'color': 'red'}); }
            else{location.assign("/forgot/verification/" + response.code);}
        });
    }
</script>
