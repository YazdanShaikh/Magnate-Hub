@include('website.attachments.header')
<style>
    .pricing {
        background: rgb(243, 243, 243);
    }

    .pricing h1 {
        font-size: 25px !important;
        font-weight: 600;
        color: grey;
        margin-bottom: 2px !important;
    }

    .billing {
        background: #fff;
        border-radius: 10px;
        padding: 30px;
    }

    .billing label {
        font-weight: 600;
        font-size: 14px;
        color: grey;
    }

    .billing input {
        width: 100%;
        padding: 6px 10px;
        border: 2px solid rgb(223, 223, 223);
        outline: none;
        font-size: 13px;
        border-radius: 3px;
    }

    .billing select {
        width: 100%;
        padding: 6px 10px;
        border: 2px solid rgb(223, 223, 223);
        outline: none;
        font-size: 13px;
        border-radius: 3px;
    }

    .billing select:focus,
    .billing input:focus {
        border-color: rgb(20, 38, 119);
    }

    #card .card {
        margin-top: 0 !important;
    }

    .navbar-brand img{
        width: 100%;
        margin-top: -13px;
    }

    .navbar{
        margin-bottom: 0 !important;
    }
</style>


<!-- pricing -->
<section class="pricing">
    <div class="container">
        <div class="row mt-4  justify-content-around">
            <div class="col-md-6">
                <div class="billing">

                    <div class="row">
                        <div class="col-12 mb-2">
                            <h1>Package Selected</h1>
                            <p>Here you can select the packges</p>
                        </div>
                        <div class="col-12 mb-2">
                            <label>Plan</label>
                            <select id="plan_id" onchange="PLAN_CHANGED()"></select>
                        </div>
                        <h1 class="mt-5">Payment Detail</h1>
                        @include('website.include.payment.stripe')
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="card">

            </div>
        </div>
    </div>
</section>



@include('website.attachments.footer')
@csrf

<script>
    PLAN();
    $("#plan_id_input").val('<?php echo $plan ?>');
    function PLAN() {
        var Plan = ['', 'Essentials', 'Premium', 'Enterprise', 'Capital Raise'];
        var plan_id = '<?php echo $plan; ?>';
        if ('<?php echo session()->get("type") ?>' != 1) {
                var not_allow = 4;
        }else{
                var not_allow = 6;
        }
        if (plan_id != 0) {
            if (not_allow == 4) {
                for (let i = 1; i < Plan.length; i++) {
                    if (plan_id == i && not_allow != i) {
                        $('#plan_id').append(` <option value="${i}">${Plan[i]}</option> `);
                    }
                }
            }else{
                $('#plan_id').append(` <option value="4">Capital Raise</option> `);
            }
        } else {
            $('#plan_id').append(` <option value="${plan_id}">Select Plan</option> `);
        }
        if (plan_id != 4) {
            for (let i = 1; i < Plan.length; i++) {
                if (plan_id != i && not_allow != i) {
                    $('#plan_id').append(` <option value="${i}">${Plan[i]}</option> `);
                }
            }
        }
        PLAN_CHANGED();
    }

    function PLAN_CHANGED() {
        $("#plan_id_input").val($("#plan_id").val());
        $.ajax({
            method: "GET",
            url: '/Get/Plan/Card/' + $("#plan_id").val(),
        }).done(function(response) {
            $("#card").html('').append(response);
        });
    }

    function Buy(event) {
        event.preventDefault();
        access = 0;
        if (access == 0) {
            if ($("#plan_id").val() == 0) {
                Notification('Please Select Plan First', 'error');
                access++;
            }
        }
        if (access == 0) {
            let All = ['plan_id', 'name', 'number', 'expiry', 'cvc'];
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            for (let i = 0; i < All.length; i++) {
                fd.append(All[i], $("#" + All[i]).val());
            }
            $.ajax({
                method: "POST",
                url: '/Plan/Buy',
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
                } else {
                    Notification(response.message, 'success');
                    location.assign("/dashboard/professionals/");
                }
            });
        }
    }
</script>





















