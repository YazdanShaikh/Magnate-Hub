@include('user.attachments.header')
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
                                                    @if($Raising[0]->profile != null)
                                                        <img src="{{ asset('/uploads/raising/profile/' . $Raising[0]->profile) }}" style="width: 250px; height:250px; object-fit:contain;">
                                                    @else
                                                        <img src="/user/assets/profile.png" style="width: 250px; height:250px; object-fit:contain;">
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 px-xl-10">
                                                    <div class="my-3">
                                                        <h1 class=" mb-0" style="color: #6223d3;">{{ $Raising[0]->first_name }}  {{ $Raising[0]->last_name }}</h1>
                                                    </div>
                                                    <hr>
                                                    <ul class="list-unstyled mb-1-9">
                                                        <li class="mb-2 d-flex">
                                                            <h5 class="me-2 font-weight-600" style="color: #6223d3;"><b>Email:</b></h5>
                                                            <h6 class="text-dark me-2 font-weight-700"><b>{{ $Raising[0]->email }}</b></h6>
                                                        </li>

                                                        <li class="mb-2 d-flex">
                                                            <h5 class="me-2 font-weight-600" style="color: #6223d3;"><b>Phone:</b></h5>
                                                            <h6 class="text-dark me-2 font-weight-700"><b>{{ $Raising[0]->phone }}</b></h6>
                                                        </li>

                                                        <li class="mb-2 d-flex">
                                                            <h5 class="me-2 font-weight-600" style="color: #6223d3;"><b>Joinning Date:</b></h5>
                                                            <h6 class="text-dark me-2 font-weight-700"><b>{{ $Raising[0]->date }}</b></h6>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

    </div>
</div>

@include('user.attachments.footer')
