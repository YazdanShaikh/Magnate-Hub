<!DOCTYPE html>
<html>

<head>
    <title>Laravel - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="panel panel-default credit-card-box border-0 px-0">
                    <div class="panel-body px-0">

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form role="form" action="{{ route('stripe.post') }}" method="post"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf

                            <input type="hidden" name="plan_id" id="plan_id_input">
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Card Number</label> <input autocomplete='off'
                                        class='form-control card-number' size='20' type='text' id="number">
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                        type='text' id="cvc">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text' id="month">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text' id="year">
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" style="font-size: 20px; color:#fff;" type="submit">Pay</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<script>
    $("#cvc").on('keyup', function(){
        if ($.isNumeric($("#cvc").val()) == false) {
            $("#cvc").val(null);
        }
        if ($("#cvc").val().length > 3) {
            $("#cvc").val($("#cvc").val().substr(0, 3));
        }
    });

    $("#month").on('keyup', function(){
        if ($.isNumeric($("#month").val()) == false) {
            $("#month").val(null);
        }
        if ($("#month").val().length > 2) {
            $("#month").val($("#month").val().substr(0, 2));
        }
        if ($("#month").val().length > 1) {
            if ($("#month").val() > 12) {
                $("#month").val(null);
            }
        }
    });

    $("#year").on('keyup', function(){
        if ($.isNumeric($("#year").val()) == false) {
            $("#year").val(null);
        }
        if ($("#year").val().length > 4) {
            $("#year").val($("#year").val().substr(0, 4));
        }
        if ($("#year").val().length > 3) {
            if ($("#year").val() < '<?php  echo date('Y') ?>') {
                $("#year").val(null);
            }
        }
    });

    $("#number").on('keyup', function(){
        if ($.isNumeric($("#number").val()) == false) {
            $("#number").val(null);
        }
        if ($("#number").val().length > 16) {
            $("#number").val($("#number").val().substr(0, 16));
        }
    });

</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>

</html>


{{--

<script src="/website/js/payment.js"></script>
<script>
    var J = Payment.J,
    numeric = document.querySelector('[data-numeric]'),
    number = document.querySelector('.cc-number'),
    exp = document.querySelector('.cc-exp'),
    cvc = document.querySelector('.cc-cvc'),
    validation = document.querySelector('.validation');
    Payment.restrictNumeric(numeric);
    Payment.formatCardNumber(number);
    Payment.formatCardExpiry(exp);
    Payment.formatCardCVC(cvc);
    document.querySelector('form').onsubmit = function(e) {
    e.preventDefault();
    J.toggleClass(document.querySelectorAll('input'), 'invalid');
    J.removeClass(validation, 'passed failed');
    var cardType = Payment.fns.cardType(J.val(number));
    J.toggleClass(number, 'invalid', !Payment.fns.validateCardNumber(J.val(number)));
    J.toggleClass(exp, 'invalid', !Payment.fns.validateCardExpiry(Payment.cardExpiryVal(exp)));
    J.toggleClass(cvc, 'invalid', !Payment.fns.validateCardCVC(J.val(cvc), cardType));
    if (document.querySelectorAll('.invalid').length) {
        J.addClass(validation, 'failed');
    } else {
        J.addClass(validation, 'passed');
    }
    }
</script> --}}
