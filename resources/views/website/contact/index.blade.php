@include("website.attachments.header")


<div class="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="contact-form">
                    <div class="row justify-content-between align-items-center" >
                        <div class="col-lg-5">
                            <div class="right-contact">
                                <!-- <div class="c-list">
                                    <i class="fa-regular fa-envelope"></i>
                                    <span>Mail: </span>
                                    <p class="mb-0">Magnuthub@Magnatehub.Au</p>
                                </div>
                                <div class="c-list">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>Address: </span>
                                    <p class="mb-0">San Francisco City Hall, San Francisco, CA</p>
                                </div>
                                <div class="c-list">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>Phone: </span>
                                    <p class="mb-0">+92 732 98193</p>
                                </div> -->
                                <div class="row">
                                    <div class="col-12">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25216.723981993127!2d144.94255172237686!3d-37.81134920143871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b8c21cb29b%3A0x1c045678462e3510!2sMelbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2s!4v1704540396603!5m2!1sen!2s" width="100%" class="rounded" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="left-contact">
                                <h2>Contact Us</h2>
                                <form onsubmit="Insert(event)">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="con-group">
                                                <input type="text" placeholder="Enter Name" id="name" required>
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="con-group">
                                                <input type="email" placeholder="Enter Email" id="email" required>
                                                <i class="fa-solid fa-envelope-circle-check"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="con-group">
                                                <input type="number" placeholder="Phone Number" id="phone" required>
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="con-group">
                                                <input type="text" placeholder="Enter Subject" id="subject" required>
                                                <i class="fa-solid fa-stamp"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="con-group">
                                                <textarea name="" id="message" rows="7" placeholder="Enter Message" required></textarea>
                                                <i class="fa-solid fa-align-left"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn theme-btn2 d-flex justify-content-center" id="button">Submit</button>
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

@include("website.attachments.footer")
@csrf
<script>
    function Insert(event) {
        event.preventDefault();
        let All = ['name','email','phone','subject','message'];
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < All.length; i++) {
            fd.append(All[i], $("#" + All[i]).val());
        }
        $.ajax({
            method: "POST",
            url: '/contact',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('#button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
            },
        })
        .done(function(response) {
            $('#button').removeAttr('disabled', 'disabled').html('SignIn');
            Notification('Submited', 'success');
        });
    }
</script>
