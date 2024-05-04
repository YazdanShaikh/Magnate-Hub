@include('website.attachments.header')
<link rel="stylesheet" href="/website/css/registration.css" />
<style>
    .unactive {
        background: #ebebeb !important;
        color: #000;
    }

    .unactive:hover {
        background: linear-gradient(to bottom, #356bf6, #6719ce) !important;
        color: #ffffff !important;
    }
</style>

<section class="login signup become_register">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-11">
                <div class="form-v10-content w-100">
                    <form class="form-detail" id="myform" onsubmit="Insert(event)">
                        <div class="form-left">
                            <h2>Welcome to Magnate Hub your first step to success</h2>

                            <div class="row px-5 mb-3">
                                <div class="col-8 px-4 Buttons">
                                    <button type="button" Value="2" class="btn theme-btn2 w-50 Type_Button unactive Seller_Button">Business Seller</button>
                                    <button type="button" Value="1" class="btn theme-btn2 w-25 Type_Button unactive  Raiser_Button">Raiser</button>
                                </div>
                            </div>
                            <input type="hidden" id="type" value="{{ $profile }}">

                            <div class="form-group">
                                <div class="form-row form-row-1">
                                    <input type="text" id="first_name" class="input-text" placeholder="First Name"
                                        required>
                                </div>
                                <div class="form-row form-row-2">
                                    <input type="text" id="last_name" class="input-text" placeholder="Last Name"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row w-100">
                                    <input type="email" id="email" class="input-text"
                                        placeholder="Example@gmail.com" required>
                                </div>
                            </div>
                            {{--
                            <div class="form-row">
                                <select id="nationality"></select>
                            </div> --}}

                            {{-- <div class="form-row">
                                <input type="text" id="phone" placeholder="Phone Number (Optional)">
                            </div>

                            <div class="form-row">
                                <select id="gender">
                                    <option value="0">Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <div class="form-row form-row-1">
                                    <input type="password" id="password" class="input-text" placeholder="Password"
                                        required>
                                </div>
                                <div class="form-row form-row-2">
                                    <input type="password" id="confirm_password" class="input-text"
                                        placeholder="Re-Type Password" required>
                                </div>
                            </div>
                            <div class="row px-5 mb-5">
                                <div class="col-12">
                                    <p class="">Already Have An Account! <a class=""
                                            href="/login/professionals/" class="forgot">Login</a></p>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn theme-btn2 px-4 w-25" type="submit">Register</button>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="form-right">
                            <h2>Personal Information</h2>
                            <div class="form-row">
                                <input type="text" id="earning" placeholder="Monthly Earning" required>
                            </div>
                            <div class="form-row">
                                <input type="text" id="net_worth" placeholder="Net worth" required>
                            </div>
                            <div class="form-row">
                                <input type="text" id="passport" placeholder="Passport Number" required>
                            </div>
                            <div class="form-row">
                                <input type="text" id="identification" placeholder="National Identification Number" required>
                            </div>
                            <div class="form-row">
                                <input type="text" id="tin" placeholder="Tax Identification Number" required>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <p class="text-white">Already Have An Account! <a class="text-white" href="/login/professionals/"
                                    class="forgot">Login</a></p>
                            </div>
                            <div class="form-row-last">
                                <input type="submit" name="register" class="register" value="Register">
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('website.attachments.footer')

<script>
    if ('<?php echo $profile; ?>' == 1) {
        $(".Raiser_Button").removeClass('unactive');
    }
    if ('<?php echo $profile; ?>' == 2) {
        $(".Seller_Button").removeClass('unactive');
    }

    $(".Type_Button").on('click', function() {
        $(".Type_Button").addClass('unactive');
        $(this).removeClass('unactive');
        $("#type").val($(this).attr('Value'));
    });

    Nationalities();

    function Nationalities() {
        Nationalities = ["Select Nationality", "American", "British", "Canadian", "Australian", "French", "German",
            "Italian", "Japanese",
            "Chinese", "Indian", "Russian", "Mexican", "Spanish", "Brazilian", "South Korean", "South African",
            "Swedish", "Swiss", "Turkish", "Argentinian", "Austrian", "Belgian", "Chilean", "Colombian", "Danish",
            "Dutch", "Egyptian", "Finnish", "Greek", "Hungarian", "Irish", "Israeli", "Jamaican", "Kenyan",
            "Malaysian", "New Zealander", "Norwegian", "Polish", "Portuguese", "Romanian", "Saudi Arabian",
            "Singaporean", "Thai", "Ukrainian", "Vietnamese", "Afghan", "Albanian", "Algerian", "Angolan",
            "Armenian", "Azerbaijani", "Bahraini", "Bangladeshi", "Barbadian", "Belarusian", "Belizean", "Beninese",
            "Bolivian", "Bosnian", "Botswanan", "Bulgarian", "Burkinabe", "Burmese", "Burundian", "Cambodian",
            "Cameroonian", "Central African", "Chadian", "Comoran", "Congolese", "Costa Rican", "Croatian", "Cuban",
            "Cypriot", "Czech", "Djiboutian", "Dominican", "Ecuadorian", "Equatorial Guinean", "Eritrean",
            "Estonian", "Ethiopian", "Fijian", "Gabonese", "Gambian", "Georgian", "Ghanaian", "Guatemalan",
            "Guinean", "Guyanese", "Haitian", "Honduran", "Icelandic", "Indonesian", "Iranian", "Iraqi", "Ivorian",
            "Jordanian", "Kazakhstani", "Kiribati", "Kuwaiti", "Kyrgyz", "Laotian", "Latvian", "Lebanese",
            "Liberian", "Libyan", "Liechtensteiner", "Lithuanian", "Luxembourger", "Macedonian", "Madagascan",
            "Malawian", "Maldivian", "Malian", "Maltese", "Mauritanian", "Mauritian", "Moldovan", "Mongolian",
            "Montenegrin", "Moroccan", "Mozambican", "Namibian", "Nauruan", "Nepalese", "Nicaraguan", "Nigerien",
            "North Korean", "Omani", "Pakistani", "Palauan", "Panamanian", "Papua New Guinean", "Paraguayan",
            "Peruvian", "Philippine", "Qatari", "Rwandan", "Saint Lucian", "Salvadoran", "Samoan", "San Marinese",
            "Sao Tomean", "Senegalese", "Serbian", "Seychellois", "Sierra Leonean", "Slovak", "Slovenian",
            "Solomon Islander", "Somali", "Sudanese", "Surinamer", "Swazi", "Syrian", "Tajik", "Tanzanian",
            "Togolese", "Tongan", "Trinidadian or Tobagonian", "Tunisian", "Tuvaluan", "Ugandan", "Uruguayan",
            "Uzbekistani", "Venezuelan", "Yemenite", "Zambian", "Zimbabwean"
        ];
        for (let i = 0; i < Nationalities.length; i++) {
            $("#nationality").append(`<option value="${i}">${Nationalities[i]}</option>`)
        }
    }

    function Insert(event) {
        event.preventDefault();
        var access = 0;

        // if (access == 0) {
        //     if ($("#nationality").val() == 0) {
        //         Notification('Please Select Your Nationality', 'error');
        //         access++;
        //     }
        // }

        if (access == 0) {
            if ($("#gender").val() == 0) {
                Notification('Please Select Your Gender', 'error');
                access++;
            }
        }

        if (access == 0) {
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            if (password != confirm_password) {
                Notification('Confirm Password Not Match', 'error');
                access++;
            }
        }

        if (access == 0) {
            if ($("#profile").val() == 0) {
                Notification('Please Select Your Profile Type', 'error');
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
            // ALL = ["first_name", "last_name", "email", "nationality", "phone", "gender", "password", "earning", "net_worth", "passport", "identification", "tin"];
            ALL = ["first_name", "last_name", "email", "phone", "gender", "password", "type"];
            var fd = new FormData();
            fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
            for (let i = 0; i < ALL.length; i++) {
                fd.append(ALL[i], $("#" + ALL[i]).val());
            }
            $.ajax({
                    method: "POST",
                    url: '/Raising/Register',
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
                        location.assign("/verification/raising/" + response.code);
                    }
                    $('#Create_Button').removeAttr('disabled').html('Join Now');
                });
        }
    }
</script>
