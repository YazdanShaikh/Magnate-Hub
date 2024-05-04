@include('website.attachments.header')



<style>
    .otp-section {
        margin: 130px 0;
    }

    .bgWhite {
        background: #2e3f6e;
        padding: 20px;
        border-radius: 5px;
        /* box-shadow: 0px 3px 6px 0px #cacaca; */
    }

    .title {
        font-weight: 600;
        margin-top: 20px;
        font-size: 24px;
        color: #fff;
    }


    form input {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin: 0 4px;
        text-align: center;
    }

    .cu-btn {
        padding: 8px 30px !important;
    }

    .wrong-code-animation {
        -webkit-animation: kf_shake 0.4s 1 linear;
        -moz-animation: kf_shake 0.4s 1 linear;
        -o-animation: kf_shake 0.4s 1 linear;
    }

    @-webkit-keyframes kf_shake {
        0% {
            -webkit-transform: translate(30px);
        }

        20% {
            -webkit-transform: translate(-30px);
        }

        40% {
            -webkit-transform: translate(15px);
        }

        60% {
            -webkit-transform: translate(-15px);
        }

        80% {
            -webkit-transform: translate(8px);
        }

        100% {
            -webkit-transform: translate(0px);
        }
    }

    @-moz-keyframes kf_shake {
        0% {
            -moz-transform: translate(30px);
        }

        20% {
            -moz-transform: translate(-30px);
        }

        40% {
            -moz-transform: translate(15px);
        }

        60% {
            -moz-transform: translate(-15px);
        }

        80% {
            -moz-transform: translate(8px);
        }

        100% {
            -moz-transform: translate(0px);
        }
    }

    @-o-keyframes kf_shake {
        0% {
            -o-transform: translate(30px);
        }

        20% {
            -o-transform: translate(-30px);
        }

        40% {
            -o-transform: translate(15px);
        }

        60% {
            -o-transform: translate(-15px);
        }

        80% {
            -o-transform: translate(8px);
        }

        100% {
            -o-origin-transform: translate(0px);
        }
    }
</style>



<section class="otp-section">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-md-5 col-sm-7  text-center">
                <div class="row">
                    <div class="col-sm-12 mt-5 bgWhite">
                        <div class="title">
                            Verify OTP
                        </div>

                        <form class="my-4 inputs">
                            <input class="otp" type="text" oninput="digitValidate(this)" onkeyup="tabChange(1)" maxlength=1>
                            <input class="otp" type="text" oninput="digitValidate(this)" onkeyup="tabChange(2)" maxlength=1>
                            <input class="otp" type="text" oninput="digitValidate(this)" onkeyup="tabChange(3)" maxlength=1>
                            <input class="otp" type="text" oninput="digitValidate(this)" onkeyup="tabChange(4)" maxlength=1>
                            <input class="otp" type="text" oninput="digitValidate(this)"onkeyup="tabChange(5)" maxlength=1>
                            <input class="otp" type="text" oninput="digitValidate(this)"onkeyup="tabChange(6)" maxlength=1>
                        </form>
                        <button class="btn cu-btn theme-btn" id="Resend">Resend</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@csrf
<input type="text" id="otp">
@include('website.attachments.footer')
<script>
    function Check() {
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        fd.append('code', '<?php echo $code; ?>');
        fd.append('otp', $('#otp').val());
        $.ajax({
            method: "POST",
            url: '/Forgot/Check/Otp',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('.inputs input').attr('disabled', 'disabled').removeClass('wrong-code-animation');
            },
        })
        .done(function(response) {
            if (response.error == true) {
                Notification(response.message, 'error');
                $('.inputs input').removeAttr('disabled').val(null).addClass('wrong-code-animation');
                $("#otp").val(null);
            }
            if (response.error == false) {
                location.assign("/change/password/"+response.code);
            }
        });
    }
    $("#Resend").on('click', function(e) {
        e.preventDefault();
        var fd = new FormData();
        fd.append('code', '<?php echo $code; ?>');
        fd.append('_token', $("input[name=_token]").val());

        $.ajax({
            method: "POST",
            url: '/Resend/Otp',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('#Resend').attr('disabled', 'disabled').html(' ').append(
                    `<div class="Button_Loader"></div>`);
            },
        })

        .done(function(data) {
            if (data.error == false) {
                $("#Resend").attr('disabled', 'disabled');
                var timeLeft = 60;
                var elem = document.getElementById('Resend');

                var timerId = setInterval(countdown, 1000);

                function countdown() {
                    if (timeLeft == -1) {
                        clearTimeout(timerId);
                        $("#Resend").text('Resend');
                        $("#Resend").removeAttr('disabled');
                    } else {
                        elem.innerHTML = 'Resend In ' + timeLeft;
                        timeLeft--;
                    }
                }
            }
        });
    });
</script>
<script>
    let digitValidate = function(ele) {
        $("#otp").val($("#otp").val() + ele.value);
        ele.value = ele.value.replace(/[^0-9]/g, '');
        if ($('#otp').val().length == 6) {
            Check();
        }
    }

    let tabChange = function(val) {
        let ele = document.querySelectorAll('input');
        if (ele[val - 1].value != '') {
            ele[val].focus()
        } else if (ele[val - 1].value == '') {
            ele[val - 2].focus()
        }
    }
</script>
