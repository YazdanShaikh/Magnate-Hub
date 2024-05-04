@include("website.attachments.header")

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

<section class="list-d">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="head">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 style="color: #6223d3;">{{ $Project[0]->name }}</h3>
                            {{-- @if($Project[0]->raising_id != 0)
                                @if(count($Chat) != 0)
                                    <h5><strong style="color: #6223d3;">Hosted By</strong>  &nbsp; : &nbsp;
                                        @if($Chat[0]->type == 1)
                                            <span>Essentials</span>
                                        @elseif($Chat[0]->type == 2)
                                            <span>Premium</span>
                                        @elseif($Chat[0]->type == 3)
                                            <span>Enterprise</span>
                                        @elseif($Chat[0]->type == 4)
                                            <span>Capital Raise</span>
                                        @endif
                                    </h5>
                                @endif
                            @endif --}}
                            <div class="d-flex align-items-center">
                                <span style="color: #6223d3;">Hosted By :&nbsp; &nbsp;</span>
                                <a href="/dashboard/user/professional/{{ $Project[0]->raising_code }}">
                                    <h5 class="mb-0 ">{{ $Project[0]->first_name }} {{ $Project[0]->last_name }}</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 text-end">
                            <button class="btn theme-btn mx-0" id="Wishlist" Value="{{ $Wishlist }}"><i
                                    class="fa-regular fa-heart"></i> <span></span></button>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success clipboard"><i class="fa-regular fa-copy"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sum p-0" style="background: transparent">
                    <div class="row">
                        <div class="col-12 main-s">
                            <div class="card px-4 py-3" style="border-radius: 10px">
                                <div class="row my-3">
                                    <div class="col-12">
                                        <img src="{{ asset('/uploads/project/card/' . $Project[0]->card) }}"
                                            class="w-100 mb-4"
                                            style="border-radius: 10px; height: 400px; object-fit: cover;" alt="">
                                    </div>
                                    <div class="col-12 mt-4">
                                        {{-- Seller --}}
                                        @if($Project[0]->type == 2)
                                        <div class="in-card-img">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="swiper mySwiper new-swiper">
                                                        <div class="swiper-wrapper">
                                                            @php
                                                            $Images = json_decode($Project[0]->images);
                                                            @endphp
                                                            @if($Images != null)
                                                            @forEach($Images as $img)
                                                            <div class="swiper-slide">
                                                                <div data-toggle="modal" data-target="#exampleModalCenter1">
                                                                    <img src="{{ asset('/uploads/project/images/' . $img) }}"
                                                                    class="Images">
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="exampleModalCenter1" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header d-flex justify-content-end">
                                                                <button class="btn theme-btn2" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="modal_image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-center mt-3">
                                                    <button class="left-arrow"><i
                                                            class="fa-solid fa-arrow-left"></i></button>
                                                    <button class="right-arrow"><i
                                                            class="fa-solid fa-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        {{-- Rasier --}}
                                        <div class="in-card-img">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="swiper mySwiper new-swiper">
                                                        <div class="swiper-wrapper">
                                                            @php
                                                            $Images = json_decode($Project[0]->images);
                                                            @endphp
                                                            @if($Images != null)
                                                            @forEach($Images as $img)
                                                            <div class="swiper-slide">
                                                                <div data-toggle="modal" data-target="#exampleModalCenter">
                                                                    <img src="{{ asset('/uploads/project/images/' . $img) }}" class="Images">
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header d-flex justify-content-end">
                                                                <button class="btn theme-btn2" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="modal_image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-center mt-3">
                                                    <button class="left-arrow"><i class="fa-solid fa-arrow-left"></i></button>
                                                    <button class="right-arrow"><i class="fa-solid fa-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sum">
                    <div class="row">

                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-location-dot"></i> Location</h4>
                                <p>{{ $Project[0]->location }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-list-check"></i> Category</h4>
                                <p>{{ $Project[0]->category }}</p>
                            </div>
                        </div>



                        {{-- Seller --}}
                        @if($Project[0]->type == 2)
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-money-check-dollar"></i> Price</h4>
                                <p>{{ $Project[0]->price }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-chart-line"></i> Year Trading</h4>
                                <p>{{ $Project[0]->trading }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-dollar-sign"></i> Earning Type</h4>
                                <p>{{ $Project[0]->earning_type }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-arrow-trend-up"></i> Stock Level</h4>
                                <p>{{ $Project[0]->stock_level }}</p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                            <div class="in-card-img">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="swiper mySwiper new-swiper">
                                            <div class="swiper-wrapper">
                                                @php
                                                    $Images = json_decode($Project[0]->images);
                                                @endphp
                                                @if($Images != null)
                                                @forEach($Images as $img)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('/uploads/project/images/' . $img) }}" alt="">
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button class="left-arrow"><i class="fa-solid fa-arrow-left"></i></button>
                                        <button class="right-arrow"><i class="fa-solid fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Summary</h4>
                                <p>{{ $Project[0]->summary }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Skills</h4>
                                <p>{{ $Project[0]->skills }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Potential</h4>
                                <p>{{ $Project[0]->potential }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Hours</h4>
                                <p>{{ $Project[0]->hours }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Staff</h4>
                                <p>{{ $Project[0]->staff }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Lease</h4>
                                <p>{{ $Project[0]->lease }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Business</h4>
                                <p>{{ $Project[0]->business_established }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Training</h4>
                                <p>{{ $Project[0]->training }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Awards</h4>
                                <p>{{ $Project[0]->awards }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Selling Reason </h4>
                                <p>{{ $Project[0]->reason_for_sale }}</p>
                            </div>
                        </div>


                        @else





                        {{-- Rasier --}}
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-seedling"></i> Seeking Investment </h4>
                                <p>{{ $Project[0]->seeking_investment }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-dollar-sign"></i> Reported Sales</h4>
                                <p>{{ $Project[0]->reported_sales }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-dollar-sign"></i> Run Rate Sales </h4>
                                <p>{{ $Project[0]->run_rate_sales }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-arrow-up-right-dots"></i> EBITDA Margin </h4>
                                <p>{{ $Project[0]->EBITDA_margin }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-industry"></i> Industry </h4>
                                <p>{{ $Project[0]->industry }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-brands fa-uber"></i> Assets / Collateral </h4>
                                <p>{{ $Project[0]->assets_or_collateral }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="out-card">
                                <h4><i class="fa-solid fa-user-tie"></i> Interested Advisors </h4>
                                <p>{{ $Project[0]->interested_to_connect_with_advisors }}</p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                            <div class="in-card-img">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="swiper mySwiper new-swiper">
                                            <div class="swiper-wrapper">
                                                @php
                                                    $Images = json_decode($Project[0]->images);
                                                @endphp
                                                @if($Images != null)
                                                @forEach($Images as $img)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('/uploads/project/images/' . $img) }}" alt="">
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button class="left-arrow"><i class="fa-solid fa-arrow-left"></i></button>
                                        <button class="right-arrow"><i class="fa-solid fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Business Overview</h4>
                                <p>{{ $Project[0]->business_overview }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Products Overview</h4>
                                <p>{{ $Project[0]->products_and_dervices_overview }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Assets Overview</h4>
                                <p>{{ $Project[0]->assets_overview	 }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Facilities Overview</h4>
                                <p>{{ $Project[0]->facilities_overview }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="in-card">
                                <h4>Capitalization Overview </h4>
                                <p>{{ $Project[0]->capitalization_overview }}</p>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="row">
                    <div class="col-lg-12">
                        {{-- @if(count($Chat) != 0) --}}
                        <div class="b-form mt-0 new-form">
                            <div class="row align-items-center">
                                @if(session()->get("user_id"))
                                <div class="col-md-8">
                                    <h5 class="mb-0" style="color: #6223d3;"> <b>Chat With Raiser</b></h5>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="/chat/{{ $Project[0]->code }}"><button class="btn theme-btn2"><i
                                                class="fa-regular fa-message"></i></button></a>
                                </div>
                                @else
                                <div class="col-md-8">
                                    <h5 class="mb-0" style="color: #6223d3;"> <b>Login For Chat</b></h5>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="/login"><button class="btn theme-btn2"><i
                                                class="fa-solid fa-right-to-bracket"></i></button></a>
                                </div>
                                @endif
                            </div>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-search new-similar">
                            <h4 style="color: #6223d3;">Similar Listings</h4>

                            @foreach($Similar as $s)
                            @php
                            $name = substr($s->name, 0, 40).'....';
                            @endphp
                            <div class="posts">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="/project/{{ $s->url }}"><img
                                                src="{{ asset('/uploads/project/card/' . $s->card) }}"
                                                alt="{{ $s->name }}" class="w-100"></a>
                                    </div>
                                    <div class="col-8">
                                        <h5>{{ $name }}</h5>
                                        <div class="date">
                                            <i class="fa-regular fa-calendar-check"></i>
                                            <p>{{ date('F d Y', strtotime($s->date)); }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@csrf
@include("website.attachments.footer")
<script>
var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".right-arrow",
        prevEl: ".left-arrow",
    },
    breakpoints: {
        // when window width is >= 320px
        767: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is >= 480px
        991: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        // when window width is >= 640px
        1199: {
            slidesPerView: 4,
            spaceBetween: 40
        }
    }
});
</script>
<script>
    $(".Images").on('click', function(){
        $("#modal_image").attr('src', $(this).attr('src'));
    });

Wishlist();
function Wishlist() {
    if ($("#Wishlist").attr('Value') != 0) {
        $("#Wishlist i").removeClass("fa-regular").addClass("fa-solid");
        $("#Wishlist span").text('Remove From Favorite');
        $("#Wishlist").removeClass('theme-btn').addClass('theme-btn2');
    } else {
        $("#Wishlist i").removeClass("fa-solid").addClass("fa-regular");
        $("#Wishlist span").text('Add To Favorite');
        $("#Wishlist").addClass('theme-btn').removeClass('theme-btn2');
    }
}

$("#Wishlist").on('click', function() {
    if ('<?php echo session()->get('user_id'); ?>' == '') {
        location.assign("/login");
    }
    var fd = new FormData();
    fd.append('_token', $("input[name=_token]").val());
    fd.append('url', '<?php echo $url; ?>');
    $.ajax({
        method: "POST",
        url: '/Wishlist/Insert',
        processData: false,
        contentType: false,
        data: fd,
    }).done(function(response) {
        if (response.error == true) {
            location.assign("/login");
        }
        $("#Wishlist").attr('Value', response.wishlist)
        Wishlist();
    });
});

var $temp = $("<input>");
var $url = $(location).attr('href');

$('.clipboard').on('click', function() {
    $("body").append($temp);
    $temp.val($url).select();
    document.execCommand("copy");
    $temp.remove();
    Notification('Link Copied', 'success');
});
</script>

