@include('website.attachments.header')
<section class="bannar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-11">
                        <div class="bannar-text text-center">
                            <h1>Find your next investment</h1>
                            <p>Discover a wide range of business opportunities</p>
                            <input type="hidden" id="type" value="2">
                            <div class="new_buttons_add">
                                <button class="new_bt btn active_btn" type="2">
                                    Buy
                                    <div class="triangle triangle-bottom"></div>
                                </button>
                                <button class="new_bt btn" type="1">
                                    Invest
                                    <div class="triangle triangle-bottom"></div>
                                </button>
                            </div>
                            <div class="parent">
                                <div class="bannar-bar">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="wrapper Search_box">
                                                <div class="select-btn">
                                                    <span>Locations</span>
                                                    <i class="fa-solid fa-angle-down"></i>
                                                </div>
                                                <div class="content d-none" visibility="0">
                                                    <div class="custom-search">
                                                        <i class="uil uil-search"></i>
                                                        <input type="text" placeholder="Search" id="location_input"
                                                            onkeyup="filterFunction('location_options','location_input')">
                                                    </div>
                                                    <ul class="options px-0" id="location_options">
                                                    </ul>
                                                </div>
                                                <input type="hidden" id="location_id" value="0">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="wrapper Search_box">
                                                <div class="select-btn">
                                                    <span>Category</span>
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
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <input placeholder="What Are You Looking For?" id="keywords">
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-sm-6">
                                            <button class="btn theme-btn2 w-100" id="search">Search</button>
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
    </div>
</section>



<!-- listing -->
<section class="listing">
    <div class="container-fluid">
        <div class="row justify-content-center head-para">
            <div class="col-lg-9 col-md-10 text-center">
                <!-- <div class="badge">Premium</div> -->
                <h2>Premium Listings</h2>
                <p>
                    Explore our exclusive portfolio of premium listings at Magnate Hub
                </p>
                <!-- <p>
                    A premium listing refers to a higher level of visibility and prominence for a product, service, or
                    property on a platform, such as a website or marketplace. It typically includes added features and
                    benefits, such as increased visibility and higher search ranking, compared to a basic or standard
                    listing.
                </p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <div class="slide-view">
                    <div class="swiper premium">
                        <div class="swiper-wrapper">
                            @foreach ($Premium as $p)
                                <div class="swiper-slide">
                                    <a href="/project/{{ $p->url }}">
                                        <div class="view-box">
                                            <img src="{{ asset('/uploads/project/card/' . $p->card) }}" alt="">
                                            <i class="fa-solid fa-heart fav" title="Save"></i>
                                            <i class="fa-solid fa-crown crown"></i>
                                            <div class="uper-text">
                                                <h4>{{ \Illuminate\Support\Str::limit($p->name, $limit = 25, $end = '...') }}</h4>
                                                <p><i class="fa-solid fa-location-dot"></i> {{ $p->location }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- about -->
<section class="about new_hub mt-0 pt-0">
    <div class="container">
        <div class="row mt-3 ab-text align-items-center">
            <div class="col-md-6 mt-4 mt-md-0">
                <h2 style="color:#4835d4;">
                    The Hub Of All Hubs
                </h2>
                <p>
                    Magnate Hub is the ultimate platform for entrepreneurs and business owners. Whether you're looking
                    to buy or sell a business, find investors, or raise capital, we've got you covered.
                    <br> <br>
                    With a user-friendly interface and a vast network of potential buyers, sellers, investors, and
                    lenders, Magnate Hub makes it easy to take your business to the next level.
                </p>
                {{-- <a href="/contact"><button class="btn theme-btn2">Contact Us</button></a> --}}
            </div>
            <div class="col-md-6 text-center">
                <img src="/website/images/premium.gif" class="w-100 rounded" alt="">
            </div>
        </div>
    </div>
</section>




<!-- features -->
<section class="features">
    <div class="container-fluid">
        <div class="row head-para">
            <div class="col-12 text-center">
                <h2>Our Features</h2>
                <p>
                    There are so many features of Magnate Hub, here are a few.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="f-box">
                            <div class="w-100">
                                <span>01</span>
                                <img src="/website/images/feature/1.svg" alt="">
                                <h3>Extensive Listings</h3>
                                <p>
                                    A comprehensive selection of businesses for sale, including detailed information
                                    about the company, financials, and industry trends.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="f-box">
                            <div class="w-100">
                                <span>02</span>
                                <img src="/website/images/feature/2.svg" alt="">
                                <h3>Search And Filter</h3>
                                <p>
                                    Advanced search and filtering options that allow users to easily find businesses
                                    that meet their specific criteria.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="f-box">
                            <div class="w-100">
                                <span>03</span>
                                <img src="/website/images/feature/3.svg" alt="">
                                <h3>Network Of Buyers And Sellers</h3>
                                <p>
                                    A large network of buyers, sellers, investors, and capital raisers, providing a wide
                                    range of opportunities for business transactions.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="f-box">
                            <div class="w-100">
                                <span>04</span>
                                <img src="/website/images/feature/4.svg" alt="">
                                <h3>Support And Guidance</h3>
                                <p>
                                    Access to a team of experts who can provide guidance and support throughout the
                                    buying and selling process, from initial negotiations to closing the deal.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- count -->
<section class="count">
    <div class="container">
        <div class="row head-para align-items-center justify-content-center">
            <div class="col-md-12 text-center">
                <h2 class="text-white">Our Achievement</h2>
                <p  class="text-white">
                    We are new in the market but our platform is already achieving great results in connecting buyers
                    and sellers, investors, and capital raisers, whilst successfully closing deals.
                </p>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="box_count">
                            <div>
                                <span class="counter">10000+</span>
                                <h5>Web Visits A Month</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="box_count">
                            <div>
                                <span class="counter">250+</span>
                                <h5>Active Investors</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="box_count">
                            <div>
                                <span class="counter">3000+</span>
                                <h5>Members</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="box_count">
                            <div>
                                <span class="counter">2500000+</span>
                                <h5>$ Closed Deals</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- listing -->
<section class="listing listing2">
    <div class="container-fluid">
        <div class="row justify-content-center head-para">
            <div class="col-lg-9 col-md-10 text-center">
                <h2>Categories</h2>
                <p>
                    Explore a world of possibilities with our curated selection of businesses for sale and investment
                    opportunities.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-11 mt-4">
                <div class="slide-view">
                    <div class="swiper cateS">
                        <div class="swiper-wrapper" id="Category_Card_Listing">
                            <div class="swiper-slide shimmer">
                                <div class="view-box">
                                    <div class="image-card animate"></div>
                                </div>
                            </div>
                            <div class="swiper-slide shimmer">
                                <div class="view-box">
                                    <div class="image-card animate"></div>
                                </div>
                            </div>
                            <div class="swiper-slide shimmer">
                                <div class="view-box">
                                    <div class="image-card animate"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="/project"><button class="btn theme-btn2">View More</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- tab menu -->
<section class="tab-section">
    <div class="container">
        <div class="row head-para">
            <div class="col-12 text-center">
                <h2>Our Locations</h2>
                <p>
                    Australia-wide opportunities, at your fingertips
                </p>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-9 col-md-11">
                <ul class="tabs">
                    <li class="tab-link current" data-tab="tab-All">All</li>
                    @foreach ($Location as $l)
                        <li class="tab-link" data-tab="tab-{{ $l->location_id }}">{{ $l->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div id="tab-All" class="tab-content current">
                    <div class="row">
                        @foreach ($Location_Project as $LP)
                            <div class="col-lg-4 col-sm-6">
                                <a href="/project/{{ $LP->url }}">
                                    <div class="new-tab-box">
                                        <div class="img-d">
                                            <img src="{{ asset('/uploads/project/card/' . $LP->card) }}"
                                                alt="">
                                        </div>
                                        <div class="b-d">
                                            <button class="btn theme-btn">{{ $LP->category }}</button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between text-div">
                                            <h4>{{ $LP->name }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach ($Location as $l)
                    <div id="tab-{{ $l->location_id }}" class="tab-content">
                        <div class="row">
                            @foreach ($Location_Project as $LP)
                                @if ($LP->location_id == $l->location_id)
                                    <div class="col-lg-4 col-sm-6">
                                        <a href="/project/{{ $LP->url }}">
                                            <div class="new-tab-box">
                                                <div class="img-d">
                                                    <img src="{{ asset('/uploads/project/card/' . $LP->card) }}"
                                                        alt="">
                                                </div>
                                                <div class="b-d">
                                                    <button class="btn theme-btn">{{ $LP->category }}</button>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between text-div">
                                                    <h4>{{ $LP->name }}</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>



<!-- pricing -->
<section class="pricing">
    <div class="container">
        <div class="row head-para justify-content-center">
            <div class="col-lg-10 col-md-11 text-center">
                <h2 class="">Magnate Hub Pricing</h2>
                <p class="">
                    At Magnate Hub, we believe in your success. That's why we offer unbeatable benefits such as no commissions, long listing times, and unlimited edits, allowing you to showcase your business and make any necessary changes with ease. Say goodbye to high costs and hello to a brighter future. Join us today and select the best option for your situation.
                </p>
            </div>
        </div>
        <div class="row mt-4 flex-items-xs-middle flex-items-xs-center justify-content-center">
            @if(session()->get("type") != 1)
            <!-- Table #1  -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card text-xs-center">
                    <div class="card-header card-header11">
                        <h3 class="display-2"><span class="currency">$</span>109<span class="period">/ Per Advert</span>
                        </h3>
                        <li>
                            <div class="triangle triangle-bottom"></div>
                        </li>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">
                            Essentials
                        </h4>
                        <p>
                            This tier is a great option for those who have the time and expertise to handle the sale process themselves and are looking for an affordable way to gain exposure for their business.
                        </p>
                        <h4 class="card-title mb-0"> Timeframe <span>6 Months Listing</span> </h4>
                        <ul class="list-group">
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>No commissions or other fees</div>
                            </li>
                            <li class="list-group-item"> <img src="/website/images/check.svg" alt="">
                                <div>Unlimited Edits</div>
                            </li>
                            <li class="list-group-item"> <img src="/website/images/check.svg" alt="">
                                <div>6-Month Listing</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Free Non-Disclosure Document</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Statistics Dashboard</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Chat feature</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Includes 10% GST</div>
                            </li>
                        </ul>
                    </div>
                    <a href="/pricing"><button class="btn card1_btn1 theme-btn2">Buy Now</button></a>
                </div>
            </div>

            <!-- Table #1  -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card text-xs-center">
                    <div class="card-header card-header21">
                        <h3 class="display-2"><span class="currency">$</span>330<span class="period">/ Per Advert</span>
                        </h3>
                        <li>
                            <div class="triangle triangle-bottom"></div>
                        </li>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">
                            Premium
                        </h4>
                        <p>
                            Suitable for business owners who need a little help determining the price of the business as well as the sale process etc
                        </p>
                        <h4 class="card-title mb-0"> Timeframe <span>Listed until sold</span> </h4>
                        <ul class="list-group">
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>No commission or other fees (if you go via a broker, you may have to pay commissions or fees)
                                    </div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Add your business to the Magnate Premium Directory</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Unlimited Edits</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Phone consultation</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Write, list and manage the Ad for you</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Listed until sold</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Sell yourself or with a broker</div>
                            </li>
                            <li class="list-group-item"><img s rc="/website/images/check.svg" alt="">
                                <div>Free Non-Disclosure Document</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Statistics Dashboard</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Chat feature</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Includes 10% GST</div>
                            </li>
                        </ul>
                    </div>
                    <a href="/pricing"><button class="btn card2_btn1 theme-btn2">Buy Now</button></a>
                </div>
            </div>

            <!-- Table #1  -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card text-xs-center">
                    <div class="card-header card-header31">
                        <h3 class="display-2"><span class="currency">$</span>1800<span class="period">/ Month</span>
                        </h3>
                        <li>
                            <div class="triangle triangle-bottom"></div>
                        </li>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">
                            Enterprise
                        </h4>
                        <p>
                            Suitable For Brokers, Agents And Franchises
                        </p>
                        <h4 class="card-title mb-0"> Timeframe <span>Listed until sold</span> </h4>
                        <ul class="list-group">
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>No commissions or other fees</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Unlimited Listings</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Listed until sold</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Unlimited Edits</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Unlimited Listings Australia wide</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Great backlinks for more robust SEO</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Chat feature</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Includes 10% GST</div>
                            </li>
                        </ul>
                    </div>
                    <a href="/pricing"><button class="btn card3_btn1 theme-btn2">Buy Now</button></a>
                </div>
            </div>
            @endif
            @if(session()->get("type") != 2)
            <!-- Table #1  -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card text-xs-center">
                    <div class="card-header card-header41">
                        <h3 class="display-2"><span class="currency">$</span>249<span class="period">/ Per Advert</span>
                        </h3>
                        <li>
                            <div class="triangle triangle-bottom"></div>
                        </li>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">
                            Capital Raise
                        </h4>
                        <p>
                            The ultimate solution for investors looking to fund the next big thing. Suitable for startups, established businesses or pre revenue ideas.
                        </p>
                        <h4 class="card-title mb-0"> Timeframe <span>6 Months Listing</span> </h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <img src="/website/images/check.svg" alt="">
                                <div> No commissions or other fees</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Unlimited Edits</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>6-Month Listing</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Free Non-Disclosure Document</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div> Statistics Dashboard</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Chat feature</div>
                            </li>
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>Includes 10% GST</div>
                            </li>
                        </ul>
                    </div>
                    <a href="/pricing"><button class="btn card4_btn1 theme-btn2">Buy Now</button></a>
                </div>
            </div>
            @endif
        </div>
        {{-- <div class="row">
            <div class="col-12 text-center mt-4">
                <a href="/pricing"> <button class="btn theme-btn2 text-light rounded"
                        style="font-size: 17px; padding: 13px 25px !important;">View More</button></a>
            </div>
        </div> --}}
    </div>
</section>



<!-- Sub -->
<!-- <section class="sub">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 ">
                <h2>Subscribe To Newsletter</h2>
                <p class="mb-0">Subscribe to get update and information. Don't worry, we won't send spam!</p>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="c-search">
                    <form onsubmit="Subscribe(event)">
                        <input type="email" placeholder="Enter Email" id="s_email" required>
                        <button type="submit">
                            <i class="fa-regular fa-envelope on-here"></i>
                            <i class="fa-regular fa-envelope-open on-click"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->



@include('website.attachments.footer')



{{-- Get Categories --}}
<script>
    Get_Category();

    function Get_Category() {
        $.ajax({
                method: "GET",
                url: '/Get/Category',
            })
            .done(function(response) {
                $("#Category_Card_Listing").html('');
                var category = response.category;
                category.forEach(function(c) {
                    // Short Name
                    if (c.name.length > 25) {
                        name = c.name.substring(0, 25) + "...";
                    } else {
                        name = c.name;
                    }

                    $("#Category_Card_Listing").append(`
                        <div class="swiper-slide">
                            <div class="view-box">
                                <img src="/uploads/category/card/${c.card}">
                                <div class="uper-text">
                                    <h4 title="${c.name}">${name}</h4>
                                    <a href="/project/category/${c.url}/Buy"><button class="btn theme-btn">Listings</button></a>
                                </div>
                            </div>
                        </div>`
                    );
                    $("#category_options").append(`<li value="${c.url}">${c.name}</li>`);
                });

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
            if (location.length > 0) {
                +

                $("#location_options").html('');
                location.forEach(function(c) {
                    $("#location_options").append(`<li value="${c.url}">${c.name}</li>`);
                });
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

    $(".new_bt").on('click', function(){
        $("#type").val($(this).attr('Type'));
        $(".new_bt").removeClass('active_btn');
        $(this).addClass('active_btn');
    });

    $("#search").on('click', function() {
        if ($("#type").val() == 2) { var Type = 'Buy';
        }else{ var Type = 'Invest'; }
        if ($("#category_id").val() != 0 && $("#location_id").val() == 0 && $("#keywords").val() == 0) {
            location.assign("/project/category/" + $("#category_id").val()+'/'+ Type );
        }
        if ($("#location_id").val() != 0 && $("#category_id").val() == 0 && $("#keywords").val() == 0) {
            location.assign("/project/location/" + $("#location_id").val()+'/'+ Type );
        }
        if ($("#keywords").val() != 0 && $("#location_id").val() == 0 && $("#category_id").val() == 0) {
            location.assign("/project/keywords/" + $("#keywords").val()+'/'+ Type );
        }
        if ($("#category_id").val() != 0 && $("#location_id").val() != 0 && $("#keywords").val() == 0) {
            location.assign("/project/category/" + $("#category_id").val() + '/location/' + $("#location_id")
                .val()+'/'+ Type );
        }
        if ($("#category_id").val() == 0 && $("#location_id").val() != 0 && $("#keywords").val() != 0) {
            location.assign("/project/location/" + $("#location_id").val() + '/keywords/' + $("#keywords")
            .val()+'/'+ Type );
        }
        if ($("#category_id").val() != 0 && $("#location_id").val() == 0 && $("#keywords").val() != 0) {
            location.assign("/project/category/" + $("#category_id").val() + '/keywords/' + $("#keywords")
            .val()+'/'+ Type );
        }
        if ($("#category_id").val() != 0 && $("#location_id").val() != 0 && $("#keywords").val() != 0) {
            location.assign("/project/category/" + $("#category_id").val() + '/location/' + $("#location_id")
                .val() + '/keywords/' + $("#keywords").val()+'/'+ Type );
        }
    });
</script>


<script>
    //premium
    var swiper = new Swiper(".premium", {
        spaceBetween: 30,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            100: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            575: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            800: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1150: {
                slidesPerView: 4,
                spaceBetween: 60
            }
        }
    });




    //Category
    var swiper = new Swiper(".cateS", {
        spaceBetween: 30,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            100: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            575: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            800: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 40
            }
        }
    });





    // tab menu
    $(document).ready(function() {

        $('ul.tabs li').click(function() {
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })

    })
</script>
