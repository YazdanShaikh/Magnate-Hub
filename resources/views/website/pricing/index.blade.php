@include('website.attachments.header')

<style>
    .pricing .card .card-block {
        height: 720px;
    }

    @media (max-width: 1399px) {
        .pricing .card .card-block {
            height: 830px !important;
        }
    }
    
    @media (max-width: 1199px) {
        .pricing .card .card-block {
            height: 1030px !important;
        }
    }
    
    @media (max-width: 991px) {
        .pricing .card .card-block {
            height: 740px !important;
        }
    }
    
    @media (max-width: 767px) {
        .pricing .card .card-block {
            height: 895px !important;
        }
    }
    
    @media (max-width: 575px) {
        .pricing .card .card-block {
            height: auto !important;
        }
    }
</style>

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
                            The "Essentials" pricing tier is designed for business owners who are comfortable managing the sale of their business on their own. This is the most affordable option, which provides you with exposure to potential buyers. 
                            <br> <br>
                            With this tier, you will be able to list your business on our platform and have access to our network of buyers. You will be responsible for all aspects of the sale, including the evaluation of your business, gathering the necessary documents, and communicating with potential buyers.
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
                    <button class="btn theme-btn2 card1_btn1 price_button" plan="essentials">Buy Now</button>
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
                            The "Premium" pricing tier offers comprehensive support for selling your business. This includes assistance in evaluating your business to determine its value and potential market appeal, as well as help in gathering the necessary documents and paperwork and editing your listing to maximise the chances of a swift sale.
                            <br> <br>
                            You will also be guided through the whole process to make sure that the sale goes smoothly and successfully. With this tier, you can be sure that you'll get the expert help you need to make your business worth as much as possible and find the right buyer.
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
                    <button class="btn theme-btn2 card2_btn11 price_button" plan="premium">Buy Now</button>
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
                            The "Enterprise" pricing tier is the ultimate package for brokers, agents, and franchisers. This premium offering allows access to unlimited listings Australia-wide, providing maximum exposure and easily list, change, edit your listings. 
                        </p>
                        <h4 class="card-title mb-0"> Timeframe <span>Listed until sold</span> </h4>
                        <ul class="list-group">
                            <li class="list-group-item"><img src="/website/images/check.svg" alt="">
                                <div>No commissions or other fees</div>
                            </li>
                            <li class="list-group-item"> <img src="/website/images/check.svg" alt="">
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
                    <button class="btn card3_btn1 theme-btn2 price_button" plan="enterprise">Buy Now</button>
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
                            The ultimate solution to find investors looking to fund the next big thing. Whether you're a startup, an established business, or pre-revenue ideas, our platform connects you with a wide range of opportunities to grow your portfolio and get in front of the right people.
                        </p>
                        <h4 class="card-title mb-0"> Timeframe <span>6 Months listing</span> </h4>
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
                    <button class="btn card4_btn1 theme-btn2 price_button" plan="capital-raise">Buy Now</button>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>

@include('website.attachments.footer')
<script>
    $(".price_button").on('click', function() {
        if ('<?php echo session()->get('raising_id'); ?>' == '') {
            Notification('You Are Not Login First Ligin Then Buy A Plan', 'error');
        } else {
            location.assign('/plan/' + $(this).attr('plan'));
        }
    });
</script>
