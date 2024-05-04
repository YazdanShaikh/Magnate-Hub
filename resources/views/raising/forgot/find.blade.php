@include('website.attachments.header')
<link rel="stylesheet" href="/website/css/registration.css"/>
<section class="login signup become_register">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <div class="form-v10-content w-100">
                    <form class="form-detail" id="myform" onsubmit="Find(event)">
                        <div class="form-right px-5">
                            <h2 class="px-0">Find Your Account</h2>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <input type="email" id="email" class="input-text"
                                placeholder="Write Your Email" required>
                                </div>
                                
                                <div class="col-12 mt-2 text-end">
                                    <input type="submit" class="register my-3" value="Find">
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
            url: '/Raising/Find',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {$('#button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);},
        })
        .done(function(response) {
            $('#button').removeAttr('disabled', 'disabled').html('SignIn');
            if (response.error == true) {$("#msgg").text('Try Again With Another Email').css({'color': 'red'}); }
            else{location.assign("/raising/forgot/verification/" + response.code);}
        });
    }
</script>
