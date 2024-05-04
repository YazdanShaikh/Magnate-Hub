@include('raising.attachments.header')
<div class="container-fluid">
    <div class="row">

        <div class="col-12">
            <div class="card">

                <div class="row">
                    <section class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 mb-4 mb-sm-5">
                                    <div class="card border-0">
                                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                                                    @if($User[0]->profile != null)
                                                        <img src="{{ asset('/uploads/user/profile/' . $User[0]->profile) }}" style="width: 250px; height:250px; object-fit:contain;">
                                                    @else
                                                        <img src="/user/assets/profile.png" style="width: 250px; height:250px; object-fit:contain;">
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 px-xl-10">
                                                    <div class="my-3">
                                                        <h1 class=" mb-0" style="color: #6223d3;">{{ $User[0]->name }}</h1>
                                                    </div>
                                                    <hr>
                                                    <ul class="list-unstyled mb-1-9">
                                                        <li class="mb-2 d-flex">
                                                            <h5 class="text-secondary me-2 font-weight-600" style="color: #6223d3;"><b>Email:</b></h5>
                                                            <h6 class="text-secondary me-2 font-weight-700"><b>{{ $User[0]->email }}</b></h6>
                                                        </li>

                                                        <li class="mb-2 d-flex">
                                                            <h5 class="text-secondary me-2 font-weight-600" style="color: #6223d3;"><b>Phone:</b></h5>
                                                            <h6 class="text-secondary me-2 font-weight-700"><b>{{ $User[0]->phone }}</b></h6>
                                                        </li>

                                                        <li class="mb-2 d-flex">
                                                            <h5 class="text-secondary me-2 font-weight-600" style="color: #6223d3;"><b>Joinning Date:</b></h5>
                                                            <h6 class="text-secondary me-2 font-weight-700"><b>{{ $User[0]->date }}</b></h6>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="card p-3">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Seeking</h6>
                                            <p class="mb-0">{{ $User[0]->seeking }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Reported Sales</h6>
                                            <p class="mb-0">{{ $User[0]->reported_sales }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Run Rate Sales</h6>
                                            <p class="mb-0">{{ $User[0]->run_rate_sales }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">EBITDA Margin</h6>
                                            <p class="mb-0">{{ $User[0]->ebitda_margin }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Industry</h6>
                                            <p class="mb-0">{{ $User[0]->industry }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Location</h6>
                                            <p class="mb-0">{{ $User[0]->location }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Assets or Collateral</h6>
                                            <p class="mb-0">{{ $User[0]->assets_or_collateral }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Interested to Connect with advisors</h6>
                                            <p class="mb-0">{{ $User[0]->interested }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Title</h6>
                                            <p class="mb-0">{{ $User[0]->title }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Text description</h6>
                                            <p class="mb-0">{{ $User[0]->description }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Business Overview</h6>
                                            <p class="mb-0">{{ $User[0]->business_overview }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Products & Services Overview</h6>
                                            <p class="mb-0">{{ $User[0]->product_and_service_overview }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Assets Overview</h6>
                                            <p class="mb-0">{{ $User[0]->assets_overview }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Facilities Overview</h6>
                                            <p class="mb-0">{{ $User[0]->facilities_overview }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Capitalization Overview</h6>
                                            <p class="mb-0">{{ $User[0]->capitalization_overview }}</p>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

    </div>
</div>

@include('raising.attachments.footer')
