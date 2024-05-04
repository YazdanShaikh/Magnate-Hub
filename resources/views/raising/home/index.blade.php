@include('raising.attachments.header')
<link rel="stylesheet" type="text/css" href="/raising/assets/css/chartist.css">

<style>
    .tab_img{
        width: 60px !important;
        height: 60px !important;
        border-radius: 50% !important;
        margin-right: 20px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card income-card card-primary rounded">
                        <div class="card-body text-center p-3 rounded">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="round-box">
                                    <i class="icofont icofont-box fa-2x text-white"></i>
                                </div>
                            </div>
                            <h5>{{ $Total }}</h5>
                            <p>Total Listings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card income-card card-primary rounded">
                        <div class="card-body text-center p-3 rounded">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="round-box">
                                    <i class="icofont icofont-list fa-2x text-white"></i>
                                </div>
                            </div>
                            <h5>{{ $Normal }}</h5>
                            <p>Normal Listings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card income-card card-primary rounded">
                        <div class="card-body text-center p-3 rounded">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="round-box">
                                    <i class="icofont icofont-crown fa-2x text-white"></i>
                                </div>
                            </div>
                            <h5>{{ $Premium }}</h5>
                            <p>Premium Listings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card income-card card-primary rounded">
                        <div class="card-body text-center p-3 rounded">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="round-box">
                                    <i class="icofont icofont-unlock fa-2x text-white"></i>
                                </div>
                            </div>
                            <h5>{{ $Active }}</h5>
                            <p>Active Listings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card income-card card-primary rounded">
                        <div class="card-body text-center p-3 rounded">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="round-box">
                                    <i class="icofont icofont-lock fa-2x text-white"></i>
                                </div>
                            </div>
                            <h5>{{ $De_Active }}</h5>
                            <p>De-Active Listings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card income-card card-primary rounded">
                        <div class="card-body text-center p-3 rounded">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="round-box">
                                    <i class="icofont icofont-ban fa-2x text-white"></i>
                                </div>
                            </div>
                            <h5>{{ $Block }}</h5>
                            <p>Block Listings</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Listings Reach</h5>
                        </div>
                        <div class="card-body">
                            <div id="basic-bar"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('raising.attachments.footer')
{{-- <script src="/raising/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="/raising/assets/js/dashboard/default.js"></script> --}}

<script src="/raising/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="/raising/assets/js/chart/apex-chart/stock-prices.js"></script>
<script>
    // basic bar chart
    var options2 = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar:{
            show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: true
        },
        series: [{
            data: [
            @foreach($Top_Projects as $TP)
            {{ $TP->views }},
            @endforeach
        ]
        }],
        xaxis: {
            categories: [
                @foreach($Top_Projects as $TP)
                '{{ \Illuminate\Support\Str::limit($TP->name, 20, $end='...') }}',
                @endforeach
            ],
        },
        colors:[vihoAdminConfig.primary]
    }

    var chart2 = new ApexCharts(
        document.querySelector("#basic-bar"),
        options2
    );

    chart2.render();
</script>
