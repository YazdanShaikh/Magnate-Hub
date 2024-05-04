@include("website.attachments.header")

<!-- c-ban -->
<section class="c-ban blogs-ban">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Blog</h2>
                <div class="listi">
                    <a href="/">Home</a>
                    <i class="fa-solid fa-caret-right"></i>
                    <span>Blog</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- blog -->
<section class="blogs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7" id="Blog_Row">
                <div class="blog-card Loader_Card">
                    <div class="animate" style="width: 100%; height:550px;border-radius:5px;"></div>
                    <div class="blog-des">
                        <h3 class="animate" style="width: 100%; height:25px;border-radius:5px;"></h3>
                        <h3 class="animate" style="width: 40%; height:25px;border-radius:5px;"></h3>
                        <div class="blog-footer">
                            <div class="row align-items-center">
                                <div class="col-lg-12 d-flex align-items-center justify-content-sm-start justify-content-between fi">
                                    <div class="d-flex align-items-center">
                                        <div class="animate" style="width: 40px; height:40px;border-radius:50%;"></div>
                                        <p class="animate" style="width: 80px; height:20px;border-radius:5px;margin-left:6px;"></p>
                                    </div>
                                    <div class="d-flex align-items-center mx-sm-4 mx-0">
                                        <i class="fa-regular fa-calendar-check"></i>
                                        <p class="animate" style="width: 160px; height:20px;border-radius:5px;margin-left:6px;"></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fa-regular fa-eye"></i>
                                        <p class="animate" style="width: 50px; height:20px;border-radius:5px;margin-left:6px;"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 animate" style="width: 100%; height:200px;border-radius:5px;margin-left:6px;"></p>
                        <p class="mt-3 animate" style="width: 100%; height:200px;border-radius:5px;margin-left:6px;"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                @include("website.include.blog.sidebar")
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <form class="b-form" onsubmit="Insert_Comment(event)">
                    <h3><i class="fa-regular fa-comments"></i> POST A Comment</h3>
                    <div class="row">
                        <div class="col-md-4 my-3">
                            <label>Name</label>
                            <input type="text" placeholder="Enter Name" id="name" required>
                        </div>
                        <div class="col-md-4 my-3">
                            <label>Email</label>
                            <input type="text" placeholder="Enter Email" id="email" required>
                        </div>
                        <div class="col-md-4 my-3">
                            <label>Phone</label>
                            <input type="text" placeholder="Enter Phone" id="phone" required>
                        </div>
                        <div class="col-12 my-3">
                            <label>Message</label>
                            <textarea id="message" placeholder="Enter Message" rows="7" required></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn theme-btn2 d-flex justify-content-center align-content-center" type="submit" id="button">Post Comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include("website.attachments.footer")
<script> Get_Detail();
    function Get_Detail(){
        $.ajax({
            method: "GET",
            url: '/Get/Blog/<?php echo $url ?>/Detail',
        })
        .done(function(response) {
            $("#Blog_Row").append(response);
            $(".Loader_Card").remove();
        });
    }
    function Insert_Comment(event){
        event.preventDefault();
        if ('<?php echo session()->get("user_id")?>' == '') {
            Notification('Login Required For Post Comment', 'error');
        }else{
            let All = ['name','email','phone','message'];
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            fd.append('url', '<?php echo $url ?>');
            for (let i = 0; i < All.length; i++) {fd.append(All[i], $("#" + All[i]).val());}
            $.ajax({
                method: "POST",
                url: '/Insert/Comment',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {$('#button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);},
            })
            .done(function(response) {
                $('#button').removeAttr('disabled', 'disabled').html('Post Comment');
                Notification(response.message, 'success');
            });
        }
    }
</script>
