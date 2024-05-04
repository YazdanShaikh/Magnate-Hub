    <!-- footer -->
    <section class="footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6">
                    <img src="/website/images/logo.png" class="w-50" alt="">
                    {{-- <h4 class="mt-4">About Us</h4>
                    <p>
                        Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu. Commodo nonumes vim eu. Quo indoctum voluptatibus delicatissimi no. Eu cum dico melius. Cum impetus scribentur ad.
                    </p> --}}

                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <h4>Important Links</h4>
                    <div class="links">
                        <a href="/">Home</a>
                        <a href="/about">About Us</a>
                        <a href="/project">Listings</a>
                        <a href="/blog">Media</a>
                        <a href="/contact">Contact</a>
                        <a href="/pricing">Pricing</a>
                        <a href="/features">Features & Benefits</a>
                        <!-- <a href="/premium">Premium Listing</a> -->
                        <a href="/capital-raising">Capital Raising</a>
                        <a href="/investor">Investment / Investor</a>
                        <a href="/premium-package">Premium Package</a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <h4>Contact Us</h4>
                    <div class="c-list">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Mail: </span>
                        <p class="mb-0">info@magnatehub.au</p>
                    </div>
                    <div class="c-list">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Address: </span>
                        <p class="mb-0">Melbourne Australia</p>
                    </div>
                    {{-- <div class="c-list">
                        <i class="fa-solid fa-phone"></i>
                        <span>Phone: </span>
                        <p class="mb-0">+92 732 98193</p>
                    </div> --}}
                    <div class="find">
                        <h5 class="mb-0">Find Us :</h5>
                        <div class="w-100 text-sm-end mt-3 mt-sm-0">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-linkedin-in"></i>
                            <i class="fa-brands fa-youtube"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    


    <section class="down-f">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">Copyright 2024-25, Magnate Hub. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="a-d">
                        <a href="/term">Terms & Conditions</a>
                        <a href="/privacy">Privacy Policy</a>
                        <a href="/contact">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    @csrf

    <script src="/website/js/custom.js"></script>
    {{-- <script src="/website/js/select2.js"></script> --}}
    <script src="/website/js/swiper.js"></script>

    <script>
        function Notification(Message,theme) {
            $('.bottom-right').removeClass('do-show');
            $('.bottom-right').text(Message).attr('data-notification-status', theme).addClass('do-show');
            // Remove
            var counter = 5;
            var interval = setInterval(function() {
                counter--;
                if (counter == 0) {
                    clearInterval(interval);
                    $('.bottom-right').removeClass('do-show');
                }
            }, 1000);
        }
    </script>

    {{-- Custom Select Box --}}
    <script>
        $(".select-btn").on('click',function(){
            if ($(this).parent().find('.content').attr('visibility') == 0) {
                $(this).parent().find('.select-btn i').removeClass('fa-angle-down').addClass('fa-angle-up');
                $(this).parent().find('.content').removeClass('d-none').attr('visibility',1);
            }else{
                $(this).parent().find('.select-btn i').addClass('fa-angle-down').removeClass('fa-angle-up');
                $(this).parent().find('.content').addClass('d-none').attr('visibility',0);
            }
        });

        $(".options li").on('click',function(){
            $(this).parent().parent().next("input").val($(this).attr('value'));
            $(this).parent().parent().addClass('d-none').attr('visibility',0);
            $(this).parent().parent().parent().find("span").text($(this).text());
            $(this).parent().find('li').removeClass('options_active');
            $(this).addClass('options_active');
        });

        function filterFunction(option,input) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(input);
            filter = input.value.toUpperCase();
            div = document.getElementById(option);
            a = div.getElementsByTagName("li");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>

    <script>
        function Subscribe(event){
            event.preventDefault();
            var fd = new FormData();
            fd.append('email', $("#s_email").val());
            fd.append('_token', $("input[name=_token]").val());
            $.ajax({
                method: "POST",
                url: '/Subscribe',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(
                        `<div class="Button_Loader"></div>`);
                },
            })
            .done(function(response) { $('#Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Create');
                if (response.error == true) {
                    Notification(response.message, 'error');
                }
                if (response.error == false) { $("#s_email").val();
                    Notification(response.message, 'success');
                }
            });
        }
    </script>



    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('header').addClass("sticky");
            } else {
                $('header').removeClass("sticky");
            }
        });
    </script>
</body>

</html>
