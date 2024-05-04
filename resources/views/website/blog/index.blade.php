@include("website.attachments.header")

<!-- c-ban -->
<section class="c-ban blogs-ban">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Media</h2>
                <div class="listi">
                    <a href="/">Home</a>
                    <i class="fa-solid fa-caret-right"></i>
                    <span>Media</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- blog -->
<section class="blogs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7" id="Blogs_Row"></div>

            <div class="col-lg-4 col-md-5">
                @include("website.include.blog.sidebar")
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="last_id" value="0">
@include("website.attachments.footer")
@csrf
<script> Get();
    function Get(){
        if ($("#last_id").val() != 'no' && $("#last_id").val() != 'start') {
            var fd = new FormData(); fd.append('_token', $("input[name=_token]").val()); fd.append('last_id', $("#last_id").val());
            if ($("#last_id").val() == 0) { $("#last_id").val('start'); }
            $.ajax({
                method: "POST",
                url: '/Get/Blogs',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $("#Blogs_Row").append(`
                    <div class="loader-card">
                        <a href="blog-detail.php"><div class="animate" style="height:500px; width:100%;"></div></a>
                        <div class="blog-des">
                            <a href="blog-detail.php"><h3><div class="animate" style="height:20px; width:60%;"></div></h3></a>
                            <p><div class="animate" style="height:80px; width:90%;"></div></p>
                            <div class="blog-footer">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 d-flex align-items-center justify-content-sm-start justify-content-between fi">
                                        <div class="d-flex align-items-center">
                                            <div class="animate" style="height:40px; width:40px; border-radius:50%;"></div>
                                            <p><div class="animate" style="height:20px; width:50px; margin-left:5px;"></div></p>
                                        </div>
                                        <div class="d-flex align-items-center mx-sm-4 mx-0">
                                            <i class="fa-regular fa-calendar-check"></i>
                                            <p><div class="animate" style="height:20px; width:150px; margin-left:5px;"></div></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fa-regular fa-eye"></i>
                                            <p><div class="animate" style="height:20px; width:60px; margin-left:5px;"></div></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-end">
                                        <a href="#"><button class="btn theme-btn2 mt-3 mt-sm-0 animate">Read More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
                },
            })
            .done(function(response) {
                $(".loader-card").remove();
                $("#Blogs_Row").append(response);
            });
        }

    }
    var currentscrollHeight = 0;
    $(window).on("scroll", function () {
        const scrollHeight = $(document).height();
        const scrollPos = Math.floor($(window).height() + $(window).scrollTop());
        const isBottom = scrollHeight - 100 < scrollPos;
        if (isBottom && currentscrollHeight < scrollHeight) {
            Get();
            currentscrollHeight = scrollHeight;
        }
    });

</script>
