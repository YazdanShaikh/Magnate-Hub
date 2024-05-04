@include('raising.attachments.header')

<div class="container-fluid">
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Profile</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-General-tab" data-bs-toggle="pill"
                                    href="#v-pills-General" role="tab" aria-controls="v-pills-General"
                                    aria-selected="false">Profile</a>
                                <a class="nav-link mt-2" id="v-pills-password-tab" data-bs-toggle="pill"
                                    href="#v-pills-password" role="tab" aria-controls="v-pills-password"
                                    aria-selected="false">Change Password</a>
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <div class="tab-content" id="v-pills-tab Content">
                                <div class="tab-pane fade active show" id="v-pills-General" role="tabpanel"
                                    aria-labelledby="v-pills-General-tab">
                                    <form id="generai_form" onsubmit="General(event,'generai_form')" Fields="first_name,last_name,email,nationality,phone,gender">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label style="color:#4835d4;">First Name</label>
                                                <input type="text" class="form-control mt-2" placeholder="First Name"
                                                    id="first_name" value="{{ $Raising[0]->first_name }}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label style="color:#4835d4;">Last Name</label>
                                                <input type="text" class="form-control mt-2" placeholder="Last Name"
                                                    id="last_name" value="{{ $Raising[0]->last_name }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label style="color:#4835d4;">Email</label>
                                                <input type="email" class="form-control mt-2" placeholder="Email"
                                                    id="email" value="{{ $Raising[0]->email }}" required>
                                            </div>

                                            {{-- <div class="col-lg-12 col-md-12 my-1">
                                                <label for="">Nationality</label>
                                                <select class="form-control" id="nationality"></select>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label style="color:#4835d4;">Phone Number</label>
                                                <input type="text" class="form-control mt-2" placeholder="Phone Number" id="phone" value="{{ $Raising[0]->phone }}" required>
                                            </div> --}}

                                            <div class="col-lg-12 my-1" style="margin-top: 12px !important;">
                                                <label style="color:#4835d4;">Gender</label>
                                                <select class="form-control" id="gender">
                                                    @if($Raising[0]->gender == 1)
                                                    <option value="1">Male</option>
                                                    @else
                                                    <option value="2">Female</option>
                                                    @endif

                                                    @if($Raising[0]->gender != 1)
                                                    <option value="1">Male</option>
                                                    @else
                                                    <option value="2">Female</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col-4 mt-4">
                                                <button class="btn btn-primary" type="button" onclick="Click('profile')">Choose Profile</button>
                                                <input type="file" id="profile" accept="image/png, image/jpeg, image/svg" style="display: none;">
                                            </div>

                                            <div class="col-8 mt-4">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" id="Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-2">
                                                @if($Raising[0]->profile == null)
                                                    <img src="/dashboard/assets/images/empty.jpg" id="profile_tag" style="width: 250px; height:250px; object-fit:contain;">
                                                @else
                                                    <img src="{{ asset('/uploads/raising/profile/'. $Raising[0]->profile) }}" id="profile_tag" style="width: 250px; height:250px; object-fit:contain;">
                                                @endif
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-personal" role="tabpanel"
                                    aria-labelledby="v-pills-personal-tab">
                                    <form id="personal_form" onsubmit="Personal(event,'personal_form')" Fields="earning,net_worth,passport,identification,tin">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Monthly Earning</label>
                                                <input type="text" class="form-control mt-2" placeholder="Monthly Earning"
                                                id="earning" value="{{ $Raising[0]->earning }}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label>Net Worth</label>
                                                <input type="text" class="form-control mt-2" placeholder="Net Worth"
                                                id="net_worth" value="{{ $Raising[0]->net_worth }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Passport Number</label>
                                                <input type="text" class="form-control mt-2" placeholder="Passport Number"
                                                id="passport" value="{{ $Raising[0]->passport }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>National Identification Number</label>
                                                <input type="text" class="form-control mt-2" placeholder="National Identification Number"
                                                id="identification" value="{{ $Raising[0]->identification }}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label>Tax Identification Number</label>
                                                <input type="text" class="form-control mt-2" placeholder="Tax Identification Number"
                                                id="tin" value="{{ $Raising[0]->tin }}" required>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" id="Saved_Button"><i
                                                            class="fa fa-check-square-o"></i> Saved</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                                    aria-labelledby="v-pills-password-tab">
                                    <form id="Password_form" onsubmit="Password(event,'Password_form')" Fields="current_password,new_password">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 my-1">
                                                <label style="color:#4835d4;">Current Password</label>
                                                <input type="password" class="form-control mt-2" placeholder="Current Password"
                                                    id="current_password" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label style="color:#4835d4;">New Password</label>
                                                <input type="password" class="form-control mt-2" placeholder="New Password"
                                                    id="new_password" required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 my-1">
                                                <label style="color:#4835d4;">Re-Type Password</label>
                                                <input type="password" class="form-control mt-2" placeholder="Re-Type Password"
                                                    id="confirm_password" required>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" id="Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@csrf
@include('raising.attachments.footer')
<script>
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
        for (let i = 1; i < Nationalities.length; i++) {
            if (i == '<?php echo $Raising[0]->nationality ?>') {
                $("#nationality").append(`<option value="${i}">${Nationalities[i]}</option>`);
            }
        }
        for (let ii = 1; ii < Nationalities.length; ii++) {
            if (ii != '<?php echo $Raising[0]->nationality ?>') {
                $("#nationality").append(`<option value="${ii}">${Nationalities[ii]}</option>`);
            }
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#profile_tag").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile").change(function() {
        readURL(this);
    });

    function General(event,id) {
        event.preventDefault();
        ALL = $("#"+id).attr('Fields').split(',');
        var access = 0;
        for (let i = 0; i < ALL.length; i++) {
            if ($("#"+id).find("#" + ALL[i]).val() == '' && $("#"+id).find("#" + ALL[i]).val() == 0) {
                Notification('Warning','Some Fields Are Required','danger'); access++;
            }
        }

        if (access == 0) {
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            for (let i = 0; i < ALL.length; i++) {
                fd.append(ALL[i], $("#"+id).find("#" + ALL[i]).val());
            }
            var profile = $("#profile")[0].files;
            for (var i = 0; i < profile.length; i++) {
                fd.append("profile[]", profile[i], profile[i]['name']);
            }

            $.ajax({
                method: "POST",
                url: '/Raising/Setting/General',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(
                        `<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) { $('#Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                if (response.error == false) {
                    Notification('General',response.message,'success');
                }
            });
        }
    }

    function Personal(event,id) {
        event.preventDefault();
        ALL = $("#"+id).attr('Fields').split(',');
        var access = 0;
        for (let i = 0; i < ALL.length; i++) {
            if ($("#"+id).find("#" + ALL[i]).val() == '' && $("#"+id).find("#" + ALL[i]).val() == 0) {
                Notification('Warning','Some Fields Are Required','danger'); access++;
            }
        }

        if (access == 0) {
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            for (let i = 0; i < ALL.length; i++) {
                fd.append(ALL[i], $("#"+id).find("#" + ALL[i]).val());
            }
            var profile = $("#profile")[0].files;
            for (var i = 0; i < profile.length; i++) {
                fd.append("profile[]", profile[i], profile[i]['name']);
            }

            $.ajax({
                method: "POST",
                url: '/Raising/Setting/Personal',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(
                        `<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) { $('#Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                if (response.error == false) {
                    Notification('Personal',response.message,'success');
                }
            });
        }
    }

    function Password(event,id) {
        event.preventDefault();

        var access = 0;
        // Check Password Type And Confirm Password
        var password = $("#new_password").val();
        var confirm_password = $("#confirm_password").val();

        if (password != confirm_password) {
            Notification('Warning','Password And Confirm Pasword Is Different','danger'); access++;
        }

        if (access == 0) {
            var number = /([0-9])/;
            var Capital = /[A-Z]+/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            var password = $('#new_password').val().trim();
            if (password.length < 6) {
                Notification('Warning','Weak (should be atleast 6 characters.','warning');
                access++;
            } else {
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                    if(password.match(Capital)){

                    }else{
                        Notification('Warning','Password Must Be Contain Atleast One Capital Character','warning');
                        access++;
                    }
                } else {
                    Notification('Warning','Medium (should include alphabets, numbers and special characters.','warning');
                    access++;
                }
            }
        }


        if (access == 0) {
            let ALL = ['new_password','current_password']; var fd = new FormData(); fd.append('_token', $("input[name=_token]").val());
            for (let i = 0; i < ALL.length; i++) {fd.append(ALL[i], $("#" + ALL[i]).val());}

            $.ajax({
                method: "POST",
                url: '/Raising/Setting/Password',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) { $('.Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                if (response.error == true) {
                    Notification('Warning',response.message,'danger');
                }else{
                    $(".close").click();
                    Notification('Warning',response.message,'success');
                    location.assign("/login/professionals/");
                }
            });
        }
    }
</script>
