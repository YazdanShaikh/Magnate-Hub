@include('website.attachments.header')
<style>
    .range-slider {
        width: 100%;
        text-align: center;
        position: relative;
    }

    .range-slider .rangeValues {
        display: block;
        font-size: 20px;
    }

    input[type=range] {
        -webkit-appearance: none;
        /* border: 1px solid white; */
        width: 100% !important;
        position: absolute;
        left: 0;
        top: 16px;
        border: none !important;
    }

    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 5px;
        background: #6719ce;
        border: none;
        border-radius: 3px;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #356bf6;
        margin-top: -5px;
        cursor: pointer;
        position: relative;
        z-index: 1;
    }

    input[type=range]:focus {
        outline: none;
    }

    input[type=range]:focus::-webkit-slider-runnable-track {
        background: #ccc;
    }

    input[type=range]::-moz-range-track {
        width: 100%;
        height: 5px;
        background: #6719ce;
        border: none;
        border-radius: 3px;
    }

    input[type=range]::-moz-range-thumb {
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #356bf6;
    }

    /*hide the outline behind the border*/
    input[type=range]:-moz-focusring {
        outline: 1px solid white;
        outline-offset: -1px;
    }

    input[type=range]::-ms-track {
        width: 100%;
        height: 5px;
        /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
        background: transparent;
        /*leave room for the larger thumb to overflow with a transparent border */
        border-color: transparent;
        border-width: 6px 0;
        /*remove default tick marks*/
        color: transparent;
        z-index: -4;
    }

    input[type=range]::-ms-fill-lower {
        background: #777;
        border-radius: 10px;
    }

    input[type=range]::-ms-fill-upper {
        background: #6719ce;
        border-radius: 10px;
    }

    input[type=range]::-ms-thumb {
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #356bf6;
    }

    input[type=range]:focus::-ms-fill-lower {
        background: #888;
    }

    input[type=range]:focus::-ms-fill-upper {
        background: #ccc;
    }
</style>
<!-- c-ban -->
<section class="c-ban blogs-ban">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Listings</h2>
                <div class="listi">
                    <a href="/">Home</a>
                    <i style="color: #6223d3;" class="fa-solid fa-caret-right"></i>
                    <span>Listings</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- filter -->
<section class="filter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="parent">
                    <div class="bannar-bar">
                        <div class="row align-items-center">
                            <div class="row">
                                <div class="col-12 text-center mb-4">
                                    <h3 style="color: #6223d3;">Explore Unique Business Ideas, Find Your Path to Success</h3>
                                </div>
                            </div>
                            <div class="row">

                                <div class=" my-2 col-lg-3 col-md-4">
                                    <div class="custom-checked">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <input type="checkbox" id="premium" class="Check_Box" value="0">
                                                <label for="pl">Premium Listings</label>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <input type="checkbox" id="franchise" class="Check_Box" value="0">
                                                <label for="mv">Franchise</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="radio" id="All" name="fav_language" class="Radio"
                                                    value="0" checked>
                                                <label for="Buy">All</label>
                                                <input type="radio" id="Invest" name="fav_language" class="Radio"
                                                    value="1" style="margin-left: 10px;">
                                                <label for="All">Invest</label>
                                                <input type="radio" id="Buy" name="fav_language" class="Radio"
                                                    value="2" style="margin-left: 10px;">
                                                <label for="Invest">Buy</label>
                                            </div>
                                            <input type="hidden" id="type" value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-8">
                                    <div class="row">

                                        <div class="col-lg-6 col-sm-12 my-2">
                                            <div class="wrapper Search_box">
                                                <div class="select-btn">
                                                    <span>All Categories</span>
                                                    <i class="fa-solid fa-angle-down"></i>
                                                </div>
                                                <div class="content d-none" visibility="0">
                                                    <div class="custom-search">
                                                        <i class="uil uil-search"></i>
                                                        <input type="text" placeholder="Search" id="category_input"
                                                            onkeyup="filterFunction('category_options','category_input')">
                                                    </div>
                                                    <ul class="options px-0" id="category_options">
                                                    </ul>
                                                </div>
                                                <input type="hidden" id="category_id" value="0">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 my-2">
                                            <select class="select_2 select2-hidden-accessible" id="limit">
                                                <option value="20" data-select2-id="select2-data-3-rw1t">20
                                                </option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="400">400</option>
                                                <option value="800">800</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 my-2">
                                            <select class="select_2 select2-hidden-accessible" id="order_by">
                                                <option value="0" data-select2-id="select2-data-3-rw1t">Order By
                                                </option>
                                                <option value="asc" data-select2-id="select2-data-17-nsh7">Oldest
                                                </option>
                                                <option value="desc" data-select2-id="select2-data-17-nsh7">Newest
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-sm-12 my-2">
                                            <input placeholder="Write Referal Id" id="id">
                                        </div>

                                        <div class="col-lg-4 col-sm-12 my-2">
                                            <input placeholder="What Are You Looking For?" id="name">
                                        </div>

                                        <div class="col-lg-5 col-sm-12 my-2">
                                            <div class="wrapper Search_box">
                                                <div class="select-btn">
                                                    <span>All Locations</span>
                                                    <i class="fa-solid fa-angle-down"></i>
                                                </div>
                                                <div class="content d-none" visibility="0">
                                                    <div class="custom-search">
                                                        <i class="uil uil-search"></i>
                                                        <input type="text" placeholder="Search"
                                                            id="location_input"
                                                            onkeyup="filterFunction('location_options','location_input')">
                                                    </div>
                                                    <ul class="options px-0" id="location_options">
                                                        <li value="1">Pakistan</li>
                                                        <li value="2">India</li>
                                                        <li value="3">Turkiya</li>
                                                        <li value="4">Bangladesh</li>
                                                    </ul>
                                                </div>
                                                <input type="hidden" id="location_id" value="0">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="custom-checked pt-1" style="height: auto;">
                                                <div class="range-slider">
                                                    <span class="rangeValues">$500 - $5,000,000+</span>

                                                    <input value="500" min="500" max="5000000"
                                                    step="500" type="range" id="min"
                                                    onchange="Filter()">

                                                    <input value="5000000" min="500" max="5000000"
                                                    step="500" type="range" id="max"
                                                    onchange="Filter()">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 my-2">
                                            <button class="btn theme-btn2 w-100" onclick="Filter()"><i
                                                    class="fa-solid fa-magnifying-glass"></i> Search</button>
                                        </div>

                                    </div>
                                </div>



                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- filter-cards -->
<section class="filter-cards">
    <div class="container">
        <div class="row" id="Project_Row">

        </div>
    </div>
</section>


@include('website.attachments.footer')
@csrf
<script>
    Filter();
    Get_Category();

    function Get_Category() {
        $.ajax({
            method: "GET",
            url: '/Get/Category',
        }).done(function(response) {
            var category = response.category;
            var category_id = '<?php echo $category_id; ?>';
            if (category.length > 0) {
                $("#category_options").html('');
                if (category_id != 0) {
                    category.forEach(function(c) {
                        if (category_id == c.category_id) {
                            $("#category_options").append(
                                `<li value="${c.category_id}" class="options_active">${c.name}</li>`
                            );
                            $("#category_options").parent().next("input").val(c.category_id);
                            $("#category_options").parent().addClass('d-none').attr('visibility', 0);
                            $("#category_options").parent().parent().find("span").text(c.name);
                        }
                        Filter();
                    });
                    category.forEach(function(c) {
                        if (category_id != c.category_id) {
                            $("#category_options").append(
                                `<li value="${c.category_id}">${c.name}</li>`);
                        }
                    });
                } else {
                    category.forEach(function(c) {
                        $("#category_options").append(`<li value="${c.category_id}">${c.name}</li>`);
                    });
                }
            } else {
                $("#category_options").append(`<li value="0">No Categories Exist</li>`);
            }

            $(".options li").on('click', function() {
                $(this).parent().parent().next("input").val($(this).attr('value'));
                $(this).parent().parent().addClass('d-none').attr('visibility', 0);
                $(this).parent().parent().parent().find("span").text($(this).text());
                $(this).parent().find('li').removeClass('options_active');
                $(this).addClass('options_active');
            });
        });
    }
    Get_Location();

    function Get_Location() {
        $.ajax({
            method: "GET",
            url: '/Get/Location',
        }).done(function(response) {
            var location = response.location;
            var location_id = '<?php echo $location_id; ?>';
            if (location.length > 0) {
                $("#location_options").html('');
                if (location_id != 0) {
                    location.forEach(function(c) {
                        if (location_id == c.location_id) {
                            $("#location_options").append(
                                `<li value="${c.location_id}" class="options_active">${c.name}</li>`
                            );
                            $("#location_options").parent().next("input").val(c.location_id);
                            $("#location_options").parent().addClass('d-none').attr('visibility', 0);
                            $("#location_options").parent().parent().find("span").text(c.name);
                        }
                        Filter();
                    });
                    location.forEach(function(c) {
                        if (location_id != c.location_id) {
                            $("#location_options").append(
                                `<li value="${c.location_id}">${c.name}</li>`);
                        }
                    });
                } else {
                    location.forEach(function(c) {
                        $("#location_options").append(`<li value="${c.location_id}">${c.name}</li>`);
                    });
                }
            } else {
                $("#location_options").append(`<li value="0">No Locations Exist</li>`);
            }

            $(".options li").on('click', function() {
                $(this).parent().parent().next("input").val($(this).attr('value'));
                $(this).parent().parent().addClass('d-none').attr('visibility', 0);
                $(this).parent().parent().parent().find("span").text($(this).text());
                $(this).parent().find('li').removeClass('options_active');
                $(this).addClass('options_active');
            });
        });
    }

    var type = '<?php echo $type; ?>';
    if (type == 'Invest') {
        $("#Invest").prop('checked', true);
        $("#type").val(1);
    }
    if (type == 'Buy') {
        $("#Buy").prop('checked', true);
        $("#type").val(2);
    }
    $(".Radio").on('click', function() {
        $("#type").val($(this).val());
    });

    var keywords = '<?php echo $keywords; ?>';
    if (keywords != 0) {
        $("#name").val(keywords);
        Filter();
    }
    var premium = '<?php echo $premium; ?>';
    if (premium != 0) {
        if ($("#premium").val() == 0) {
            $("#premium").val(1);
        } else {
            $("#premium").val(0);
        }
        $("#premium").prop("checked", true);
        Filter();
    }
    $(".Check_Box").on('click', function() {
        if ($(this).val() == 0) {
            $(this).val(1);
        } else {
            $(this).val(0);
        }
        Filter();
    })

    function Filter() {
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        fd.append('category_id', $("#category_id").val());
        fd.append('location_id', $("#location_id").val());
        fd.append('order_by', $("#order_by").val());
        fd.append('limit', $("#limit").val());
        fd.append('views', $("#views").val());
        fd.append('premium', $("#premium").val());
        fd.append('type', $("#type").val());
        fd.append('min', $("#min").val());
        fd.append('max', $("#max").val());
        fd.append('franchise', $("#franchise").val());
        fd.append('id', $("#id").val());

        if ($("#name").val() != '') {
            fd.append('name', $("#name").val());
        } else {
            fd.append('name', 0);
        }
        console.log(fd);
        $.ajax({
            method: "POST",
            url: '/Project/Filter',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $("#Project_Row").html('').append(
                    `<div class="d-flex justify-content-center align-items-center" style="height:40vh;"><span class="loader"></span></div>`
                );
            },
        }).done(function(response) {
            $("#Project_Row").html('').append(response);
        });
    }
</script>
<script>
    // Range Slider Java
    function getVals() {
        // Get slider values
        let parent = this.parentNode;
        let slides = parent.getElementsByTagName("input");
        let slide1 = parseFloat(slides[0].value);
        let slide2 = parseFloat(slides[1].value);
        if (slide1 > slide2) {
            let tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }

        let displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
    }

    window.onload = function() {
        // Initialize Sliders
        let sliderSections = document.getElementsByClassName("range-slider");
        for (let x = 0; x < sliderSections.length; x++) {
            let sliders = sliderSections[x].getElementsByTagName("input");
            for (let y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    };
</script>
