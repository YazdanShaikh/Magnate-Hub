<div class="blog-search">
    <h4 class="d-flex justify-content-between" style="color: #6223d3;"><span>Search</span><button class="btn btn-primary d-none" id="refresh" onclick="Reset()"><i class="fa fa-refresh"></i></button></h4>
    <div class="s-input">
        <form onsubmit="Search_Blog(event)">
            @csrf
            <input type="text" placeholder="Search" id="search">
            <button class="btn theme-btn2" type="submit" id="ssearch_button"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>
<div class="blog-search">
    <h4 id="tab_title" style="color: #6223d3;">Popular Post</h4>
    <div id="Popular_Blogs"></div>
</div>
<!-- <div class="b-image">
    <div class="text-center">
        <p>Want to be notified about new post and Blog ? Subscribe For a Newsletter.</p>
        <button class="btn theme-btn2">Sign Up</button>
    </div>
</div> -->

<script>
    function Reset(){
        $("#search").val(''); $("#ssearch_button").click();
    }

    function Search_Blog(event){
    event.preventDefault();
    if ($("#search").val() != '') { $("#Popular_Blogs").html(''); $("#tab_title").text('Search Results'); $("#refresh").removeClass('d-none');
        var fd = new FormData(); fd.append('_token', $("input[name=_token]").val()); fd.append('search', $("#search").val());
            $.ajax({
                method: "POST",
                url: '/Blogs/Search',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    for (let i = 0; i < 5; i++) {
                        $("#Popular_Blogs").append(`
                        <div class="posts loader_post">
                            <div class="row">
                                <div class="col-4">
                                    <div class="animate" style="width: 100%; height:70px;border-radius:5px;"></div>
                                </div>
                                <div class="col-8">
                                    <h5 class="animate" style="width: 100%; height:20px; border-radius:5px;"></h5>
                                    <h5 class="animate" style="width: 30%; height:20px; border-radius:5px;"></h5>
                                    <div class="date">
                                        <i class="fa-regular fa-calendar-check"></i>
                                        <p class="animate" style="width: 50%; height:10px; border-radius:5px;"></p>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                    }
                },
            })
            .done(function(response) {
                if (response.Blog.length > 0) {
                    var Popular = response.Blog;
                    Popular.forEach(function(c) {
                        // Short Name
                        if (c.name.length > 35) {
                            name = c.name.substring(0, 35) + "...";
                        } else {
                            name = c.name;
                        }

                        $("#Popular_Blogs").append(`
                        <div class="posts">
                            <div class="row">
                                <div class="col-4">
                                    <img src="/uploads/blog/card/${c.card}" class="w-100" alt="">
                                </div>
                                <div class="col-8">
                                    <h5>${name}</h5>
                                    <div class="date">
                                        <i class="fa-regular fa-calendar-check"></i>
                                        <p>${c.date}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                    });
                    $(".loader_post").remove();
                }else{$("#Popular_Blogs").html('').append(`<div class="text-center">Nothing Found!</div>`);}
            });
        }else{$("#tab_title").text('Popular Post'); Get_Popular(); $("#refresh").addClass('d-none'); }
    }


    Get_Popular();
    function Get_Popular() {
        $.ajax({
            method: "GET",
            url: '/Get/Popular/Blogs',
            beforeSend: function() {
                for (let i = 0; i < 5; i++) {
                    $("#Popular_Blogs").append(`
                    <div class="posts loader_post">
                        <div class="row">
                            <div class="col-4">
                                <div class="animate" style="width: 100%; height:70px;border-radius:5px;"></div>
                            </div>
                            <div class="col-8">
                                <h5 class="animate" style="width: 100%; height:20px; border-radius:5px;"></h5>
                                <h5 class="animate" style="width: 30%; height:20px; border-radius:5px;"></h5>
                                <div class="date">
                                    <i class="fa-regular fa-calendar-check"></i>
                                    <p class="animate" style="width: 50%; height:10px; border-radius:5px;"></p>
                                </div>
                            </div>
                        </div>
                    </div>`);
                }
            },
        })
        .done(function(response) { $("#Popular_Blogs").html('');
            var Popular = response.Blog;
            Popular.forEach(function(c) {
                // Short Name
                if (c.name.length > 35) {
                    name = c.name.substring(0, 35) + "...";
                } else {
                    name = c.name;
                }

                $("#Popular_Blogs").append(`
                <div class="posts">
                    <div class="row">
                        <div class="col-4">
                            <img src="/uploads/blog/card/${c.card}" class="w-100" alt="">
                        </div>
                        <div class="col-8">
                            <h5>${name}</h5>
                            <div class="date">
                                <i class="fa-regular fa-calendar-check"></i>
                                <p>${c.date}</p>
                            </div>
                        </div>
                    </div>
                </div>`);
            });
            $(".loader_post").remove();
        });
    }
</script>
