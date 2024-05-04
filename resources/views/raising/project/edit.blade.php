@include('raising.attachments.header')

<style>
    label{
        margin-top: 20px;
        font-size: 16px;
        font-weight: 700;
        color: #5b2cd7;
        margin-bottom: 0 !important;
    }

    form p{
        font-size: 14px;
        color: rgb(173, 173, 173);
        font-weight: 500;
        line-height: 15px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card py-2 px-3 mb-3">
                <div class="row pt-2 pb-2 align-items-center">
                    <div class="col-8">
                        <h4 class="page-title mb-0">Projects</h4>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end">
                            <a href="/dashboard/professionals/project/">
                                <button class="btn btn-primary waves-effect waves-light m-1" title="Back"><i class="fa fa-angle-left fa-2x"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-4">
                <form onsubmit="Edit(event)">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 my-1">
                            <select class="form-control" id="category_id"></select>
                        </div>
                        <div class="col-lg-6 col-md-12 my-1">
                            <select class="form-control" id="location_id"></select>
                        </div>

                        @if (session()->get('type') == 2)
                            <div class="col-lg-12 col-md-12 my-1">
                                <label>Name</label>
                                <p>This section includes the title or name of the business. For example, "Melbourne Coffee Shop for Sale."</p>
                                <input type="text" class="form-control mt-2" placeholder="Name" id="name" value="{{ $Edit[0]->name }}" required>
                            </div>

                            <div class="col-lg-12 col-md-12 my-1">
                                <label>Price</label>
                                <p>This section includes the asking price for the business. This is an essential piece of information for potential buyers, as it helps them determine if the business is within their budget. For example, $250,000 or POA (Price on Application) or EOI (Expression Of Interest)</p>
                                <input type="number" class="form-control mt-2" placeholder="Price" id="price"
                                    value="{{ $Edit[0]->price }}" required>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 my-1">
                                <label>Year Trading</label>
                                <p>This section includes the number of years that the business has been operating. This information is important for potential buyers who want to understand the business's history and longevity. For example, 6 years.</p>
                                <input type="text" class="form-control mt-2" placeholder="Year Trading"
                                    id="trading" value="{{ $Edit[0]->trading }}" required>
                            </div>
                           
                            <div class="col-lg-12 col-md-12 my-1">
                                <label>Earning Type</label>
                                <p>This section includes information about the types of earnings that the business generates, such as EBITDA, PETIBDA etc. If unsure, please add NA
                                </p>
                                <input type="text" class="form-control mt-2" placeholder="Earning Type"
                                    id="earning_type" value="{{ $Edit[0]->earning_type }}" required>
                            </div>
                           
                            <div class="col-lg-12 col-md-12 my-1">
                                <label>Stock Level</label>
                                <p>This section includes information about the current stock level of the business, including the types of products, quantity, and value. This information is important for potential buyers who want to understand the inventory and sales of the business. For example, $10,000 and in summary you can add "Our coffee shop has a current stock level of $10,000 worth of coffee beans, food ingredients, and retail merchandise."
                                </p>
                                <input type="text" class="form-control mt-2" placeholder="Stock Level"
                                    id="stock_level" value="{{ $Edit[0]->stock_level }}" required>
                            </div>
                           
                            <div class="col-md-6 my-1">
                                <label>Summary</label>
                                <p>
                                    This is a short description of your business, including what your business does, its main products or services, and what sets it apart from competitors. For example, "We are a specialty coffee shop in the heart of the city, offering artisanal coffee blends and unique food options."
                                </p>
                                <textarea id="summary" placeholder="Summary" rows="5" class="form-control mt-2" required>{{ $Edit[0]->summary }}</textarea>
                            </div>
                            
                            <div class="col-md-6 my-1">
                                <label>Location Information</label>
                                <p>This is where your business is based. Be specific about the address and neighbourhood or city, as this will be helpful to potential buyers. For example, "Our coffee shop is located in a bustling commercial district in Melbournes CBD."
                                </p>
                                <textarea id="location_information" placeholder="Location Information" rows="5" class="form-control mt-2"
                             required>{{ $Edit[0]->location_information }}</textarea>
                            </div>

                            <div class="col-md-6 my-1">
                                <label>Skills</label>
                                <p>This section highlights the unique skills and qualifications that your business and its employees possess. This could include things like technical expertise, specialised certifications, or years of experience in the industry. For example, "Our team includes experienced baristas with a deep knowledge of coffee roasting and brewing techniques."
                                </p>
                                <input type="text" class="form-control mt-2" placeholder="Skills" id="skills"
                                    value="{{ $Edit[0]->skills }}" required>
                            </div>
                            
                            <div class="col-md-6 my-1">
                                <label>Potential</label>
                                <p>This section outlines the growth potential for the business, including any untapped markets, expansion opportunities, or unique value propositions that could drive future growth. For example, "Our coffee shop has the potential to expand into nearby neighbourhoods and offer catering services for corporate events."</p>
                                <input type="text" class="form-control mt-2" placeholder="Potential" id="potential"
                                    value="{{ $Edit[0]->potential }}" required>
                            </div>
                            
                            <div class="col-md-6 my-1">
                                <label>Hours of operation</label>
                                <p>This section includes the regular business hours for your business. This information is important for potential buyers who want to understand the time commitment required to run the business. For example, "We are open from 7am-7pm Monday-Saturday, and from 8am-4pm on Sundays."</p>
                                <input type="text" class="form-control mt-2" placeholder="Hours" id="hours"
                                    value="{{ $Edit[0]->hours }}" required>
                            </div>
                           
                            <div class="col-md-6 my-1">
                                <label>Staff</label>
                                <p>This section includes information about the staff and employees of the business, including their number, roles, and responsibilities. This helps potential buyers understand the business's labor needs and how it operates. For example, "Our coffee shop has five full-time employees, including two baristas, a chef, and a manager."</p>
                                <input type="text" class="form-control mt-2" placeholder="Staff" id="staff"
                                    value="{{ $Edit[0]->staff }}" required>
                            </div>
                           
                            <div class="col-md-6 my-1">
                                <label>Lease</label>
                                <p>This section outlines the lease terms for the business's physical space, including the lease length, rental rate, outgoings, and other important details. For example, "Our coffee shop has a three-year lease with an option to renew, with a monthly rental rate of $2,500."</p>
                                <input type="text" class="form-control mt-2" placeholder="Lease" id="lease"
                                    value="{{ $Edit[0]->lease }}" required>
                            </div>
                           
                            <div class="col-md-6 my-1">
                                <label>Business Established</label>
                                <p>This section includes the date that the business was founded, which can give potential buyers a sense of its history and longevity. For example, "Our coffee shop was established in 2015, and has since become a beloved fixture in the local community."</p>
                                <input type="text" class="form-control mt-2" placeholder="Business Established"
                                    id="business_established" value="{{ $Edit[0]->business_established }}" required>
                            </div>
                          
                            <div class="col-md-6 my-1">
                                <label>Training</label>
                                <p>This section highlights any training programs or support systems that are in place to help new owners take over the business. For example, "We offer comprehensive training for all new employees, and will provide support and training for the new owner during the agreed transition period."
                                </p>
                                <input type="text" class="form-control mt-2" placeholder="Training" id="training"
                                    value="{{ $Edit[0]->training }}" required>
                            </div>
                         
                            <div class="col-md-6 my-1">
                                <label>Awards</label>
                                <p>This section includes any awards or accolades that the business has received, which can help establish its reputation and credibility. For example, "Our coffee shop has won multiple awards for our unique coffee blends and exceptional customer service."</p>
                                <input type="text" class="form-control mt-2" placeholder="Awards" id="awards"
                                    value="{{ $Edit[0]->awards }}" required>
                            </div>
                         
                            <div class="col-lg-12 col-md-12 my-1">
                                <label>Reason for sale</label>
                                <p>This section explains why the business is being sold. This information is important for potential buyers, as it can help them understand the motivation behind the sale and any potential risks or challenges that may come with the business. For example, "We are selling the coffee shop to focus on other business ventures."</p>
                                <textarea id="reason_for_sale" placeholder="Reason for sale" rows="5" class="form-control mt-2" required>{{ $Edit[0]->reason_for_sale }}</textarea>
                            </div>

                        @else

                        <div class="col-lg-12 col-md-12 my-1">
                            <label>Title </label>
                            <p>This section includes the title or name of the business. For example, "Melbourne Coffee Shop for Sale."</p>
                            <input type="text" class="form-control mt-2" placeholder="Title" id="name"
                                value="{{ $Edit[0]->name }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Seeking Investment</label>
                            <p>This section outlines the amount of investment that the business owner is seeking from potential investors. For example, $500,000 and in the overview you can add a reason such expand our operations and increase sales</p>
                            <input type="text" class="form-control mt-2" placeholder="Seeking Investment" id="seeking_investment"
                                value="{{ $Edit[0]->seeking_investment }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Reported Sales</label>
                            <p>This section includes the reported sales figures for the business. This information is important for potential investors who want to understand the business's revenue and financial performance. For example, Our coffee shop reported sales of $500,000 in 2020.</p>
                            <input type="text" class="form-control mt-2" placeholder="Reported Sales" id="reported_sales"
                                value="{{ $Edit[0]->reported_sales }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Run Rate Sales</label>
                            <p>This section includes the projected sales figures for the business based on its current growth rate. This information is important for potential investors who want to understand the business's growth potential. For example, "Our coffee shop has a run rate sales projection of $600,000 based on our current growth rate."</p>
                            <input type="text" class="form-control mt-2" placeholder="Run Rate Sales" id="run_rate_sales"
                                value="{{ $Edit[0]->run_rate_sales }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>EBITDA Margin</label>
                            <p>This section includes the EBITDA margin, which is the percentage of earnings before interest, taxes, depreciation, and amortization. This information is important for potential investors who want to understand the business's profitability and financial health. For example, Our coffee shop has an EBITDA margin of 15%. </p>
                            <input type="text" class="form-control mt-2" placeholder="EBITDA Margin" id="EBITDA_margin"
                                value="{{ $Edit[0]->EBITDA_margin }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Industry</label>
                            <p>This section outlines the industry or sector that the business operates in. This information is important for potential investors who want to understand the market and competitive landscape. Please select from the drop down the category that best suits your business.</p>
                            <input type="text" class="form-control mt-2" placeholder="Industry" id="industry"
                                value="{{ $Edit[0]->industry }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Assets or Collateral</label>
                            <p>This section outlines the assets or collateral that the business owner can offer as security for potential investors. This information is important for potential investors who want to understand the level of risk involved in the investment. For example, We can offer the coffee shop's equipment and inventory as collateral for potential investors worth $40,000. You can add details of equipment in Asset Overview.</p>
                            <input type="text" class="form-control mt-2" placeholder="Assets or Collateral" id="assets_or_collateral"
                                value="{{ $Edit[0]->assets_or_collateral }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Interested to connect with advisors</label>
                            <p>This section indicates that the business owner is interested in connecting with advisors or mentors who can provide guidance and support. Add a Yes or a No, so advisors can get in touch or leave you on your journey.</p>
                            <input type="text" class="form-control mt-2" placeholder="Interested to connect with advisors" id="interested_to_connect_with_advisors"
                                value="{{ $Edit[0]->interested_to_connect_with_advisors }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Business Overview</label>
                            <p>This section provides a brief overview of the business and its operations. For example, "Our coffee shop is a specialty café that offers artisanal coffee blends, unique food options, and retail merchandise."</p>
                            <input type="text" class="form-control mt-2" placeholder="Business Overview" id="business_overview"
                                value="{{ $Edit[0]->business_overview }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Products & Services Overview</label>
                            <p>This section provides an overview of the products and services that the business offers. For example, "Our coffee shop offers a wide range of coffee blends, food items, and retail merchandise such as coffee mugs and brewing equipment."</p>
                            <input type="text" class="form-control mt-2" placeholder="Products & Services Overview" id="products_and_dervices_overview"
                                value="{{ $Edit[0]->products_and_dervices_overview }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Assets Overview</label>
                            <p>This section provides an overview of the assets that the business owns or has access to. For example, "Our coffee shop owns a range of equipment including coffee machines, ovens, and refrigerators."</p>
                            <input type="text" class="form-control mt-2" placeholder="Assets Overview" id="assets_overview"
                                value="{{ $Edit[0]->assets_overview }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Facilities Overview</label>
                            <p>This section provides an overview of the physical facilities that the business operates in. For example, "Our coffee shop occupies a 2,000 square foot commercial space with seating for 50 customers."</p>
                            <input type="text" class="form-control mt-2" placeholder="Facilities Overview" id="facilities_overview"
                                value="{{ $Edit[0]->facilities_overview }}" required>
                        </div>

                        <div class="col-md-6 my-1">
                            <label>Capitalization Overview</label>
                            <p>This section provides an overview of the capitalization structure of the business, including the amount of equity and debt financing. For example, "Our coffee shop is currently financed with $200,000 in equity and $100,000 in debt financing.</p>
                            <input type="text" class="form-control mt-2" placeholder="Capitalization Overview" id="capitalization_overview"
                            value="{{ $Edit[0]->capitalization_overview }}"  required>
                        </div>

                    @endif
                        <div class="row">
                            <div class="col-12">
                                <label class="mb-0">Is This Project An Franchise?</label>
                            </div>
                            <div class="col-12 d-flex">
                                <div>
                                    @if ($Edit[0]->franchise == 0)
                                    <input type="radio" id="franchise1" class="franchise" name="franchise">
                                    @else
                                    <input type="radio" id="franchise1" checked class="franchise" name="franchise">
                                    @endif
                                    <label for="franchise1" class="mt-2">Yes</label>
                                </div>
                                <div class="mx-4">
                                    @if ($Edit[0]->franchise == 0)
                                    <input type="radio" id="franchise2" class="franchise" name="franchise" checked>
                                    @else
                                    <input type="radio" id="franchise2" class="franchise" name="franchise">
                                    @endif
                                    <label for="franchise2" class="mt-2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-4">
                            <button class="btn btn-primary" type="button" onclick="Click('card')">Choose File</button>
                            <input type="file" id="card" accept="image/png, image/gif, image/jpeg" style="display: none;">
                        </div>

                        <div class="col-8 mt-4">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success" id="Saved_Button"><i class="fa fa-check-square-o"></i> Save</button>
                            </div>
                        </div>

                        <div class="col-6 mt-2">
                            <img src="{{ asset('/uploads/project/card/'. $Edit[0]->card) }}" id="card_tag" style="width: 250px; height:250px; object-fit:contain;">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@csrf
<input type="hidden" class="code">
<input type="hidden" id="franchise" value="{{$Edit[0]->franchise}}">
@include('raising.attachments.footer')
<script>

    $(".franchise").on('click', function(){
        if ($("#franchise").val() == 0) {
            $("#franchise").val(1);
        }else { $("#franchise").val(0); }
    });

    Get_Category();
    Get_Location();

    function Get_Category() {
        $("#category_id").html('').attr('disabled', 'disabled');
        $.ajax({
            method: "GET",
            url: '/Raising/Project/Get/Category',
        })
        .done(function(response) {
            category = response.category;
            if (category.length > 0) { var category_id = '<?php $Edit[0]->category_id ?>'; $("#category_id").removeAttr('disabled').html("");
                category.forEach(function(c) {
                    if (c.category_id == category_id) {$("#category_id").append(`<option value="${c.category_id}">${c.name}</option>`);}
                });
                category.forEach(function(c) {
                    if (c.category_id != category_id) {$("#category_id").append(`<option value="${c.category_id}">${c.name}</option>`);}
                });
            } else {
                $("#category_id").html("").append(`<option value="0">No Category Found</option>`);
            }
        });
    }

    function Get_Location() {
        $("#location_id").html('').attr('disabled', 'disabled');
        $.ajax({
            method: "GET",
            url: '/Raising/Project/Get/Location',
        })
        .done(function(response) {
            locations = response.location;
            if (locations.length > 0) { var location_id = '<?php $Edit[0]->location_id ?>'; $("#location_id").removeAttr('disabled').html("");
                locations.forEach(function(l) {
                    if (l.location_id == location_id) {$("#location_id").append(`<option value="${l.location_id}">${l.name}</option>`);}
                });
                locations.forEach(function(l) {
                    if (l.location_id != location_id) {$("#location_id").append(`<option value="${l.location_id}">${l.name}</option>`);}
                });
            } else {
                $("#location_id").html("").append(`<option value="0">No Location Found</option>`);
            }
        });
    }

    // Edit Jquery
    function Edit(event) {
        event.preventDefault();
        ALL = ["name", "price", "trading", "earning_type", "stock_level", "summary", "location_information",
            "location_id", "category_id", "description", "skills", "potential", "hours", "staff", "lease",
            "business_established", "training", "awards", "reason_for_sale","seeking_investment", "reported_sales", "run_rate_sales", "EBITDA_margin", "industry", "assets_or_collateral", "interested_to_connect_with_advisors", "business_overview", "products_and_dervices_overview", "assets_overview", "facilities_overview", "franchise"
        ];
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        for (let i = 0; i < ALL.length; i++) {
            fd.append(ALL[i], $("#" + ALL[i]).val());
        }
        var card = $("#card")[0].files;
        for (var i = 0; i < card.length; i++) {
            fd.append("card[]", card[i], card[i]['name']);
        } fd.append('code', '<?php echo $Edit[0]->code ?>');

        $.ajax({
            method: "POST",
            url: '/Raising/Project/Update',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $('#Saved_Button').attr('disabled', 'disabled').html(' ').append(`<div class="Button_Loader"></div>`);
            },
        })
        .done(function(response) { $('#Saved_Button').removeAttr('disabled').html('<i class="fa fa-check-square-o"></i> Save');
            if (response.error == true) { Notification('Listing',response.message,'danger'); }
            if (response.error == false) {
                Notification('Listing',response.message,'success');
            }
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#card_tag").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#card").change(function() {
        readURL(this);
    });
</script>
