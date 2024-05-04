@include('user.attachments.header')
<link rel="stylesheet" type="text/css" href="/user/assets/css/chartist.css">
<div class="container-fluid">
    <!--<div class="row">-->
    <!--    <div class="col-lg-3 col-md-4 col-sm-6">-->
    <!--        <div class="card income-card card-primary">-->
    <!--            <div class="card-body text-center">-->
    <!--                <div class="d-flex justify-content-center mb-3">-->
    <!--                    <div class="round-box">-->
    <!--                        <i data-feather="bookmark"></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <h5>{{ $Bookmark }}</h5>-->
    <!--                <p>Bookmark</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-lg-3 col-md-4 col-sm-6">-->
    <!--        <div class="card income-card card-primary">-->
    <!--            <div class="card-body text-center">-->
    <!--                <div class="d-flex justify-content-center mb-3">-->
    <!--                    <div class="round-box">-->
    <!--                        <i data-feather="box"></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <h5>1000</h5>-->
    <!--                <p>Active Projects</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-lg-3 col-md-4 col-sm-6">-->
    <!--        <div class="card income-card card-primary">-->
    <!--            <div class="card-body text-center">-->
    <!--                <div class="d-flex justify-content-center mb-3">-->
    <!--                    <div class="round-box">-->
    <!--                        <i data-feather="box"></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <h5>1000</h5>-->
    <!--                <p>De-Active Projects</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-lg-3 col-md-4 col-sm-6">-->
    <!--        <div class="card income-card card-primary">-->
    <!--            <div class="card-body text-center">-->
    <!--                <div class="d-flex justify-content-center mb-3">-->
    <!--                    <div class="round-box">-->
    <!--                        <i data-feather="box"></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <h5>1000</h5>-->
    <!--                <p>Plans Projects</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="row">
        <div class="col-12 text-center mt-5">
            <img src="/user/assets/images/logo/Dark-logo.png" style="width: 50%;">
        </div>
    </div>
    {{-- <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="header-top d-sm-flex align-items-center">
                    <h5>Traffic OverView</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="chart-timeline-dashbord"></div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@include('user.attachments.footer')
<script src="/user/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="/user/assets/js/dashboard/default.js"></script>
