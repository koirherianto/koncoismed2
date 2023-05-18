<section id="minimal-statistics">
    <div class="row">
        <div class="col-12">
            <h4 class="text-uppercase">HEADLINE</h4>
            <p>super admin dashboard</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$jumlah_kandidat}}</h3>
                                <span>Jumlah Kandidat</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-user success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-graph danger font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3>{{$jumlah_relawan}}</h3>
                                <span>Jumlah Relawan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-pencil info font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3>{{$jumlah_dpt}}</h3>
                                <span>Jumlah DPT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning">64.89 %</h3>
                                <span>Conversion Rate</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-pie-chart warning font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
</section>
<section id="chartjs-line-charts">
    <!-- Line Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Timeline Total Kandidat Setiap Bulan</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body chartjs">
                        <div class="height-500">
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Jumlah Kandidat  di Tiap Jenis Kandidat</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="height-400">
                            <canvas id="column-chart"></canvas>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <section id="chartjs-pie-charts">
        <div class="row">
            <!-- Simple Pie Chart -->
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Perbandingan Jumlah Person Berdasarkan Jenis Kelamin</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                       <div class="card-body">
                            <div class="height-400">
                                <canvas id="simple-pie-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="chartjs-line-charts">
                <!-- Line Chart -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Timeline Total Relawan Setiap Bulan</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body chartjs">
                                    <div class="height-500">
                                        <canvas id="line-chart-two"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@section('scripts')
<script>

// Chart Data
var chartData = {
    labels: ["January", "February", "March", "April"],
    datasets: [{
        label: "My First dataset",
        data: [65, 59, 80, 81],
        backgroundColor: "#28D094",
        hoverBackgroundColor: "rgba(22,211,154,.9)",
        borderColor: "transparent"
    }, {
        label: "My Second dataset",
        data: [28, 48, 40, 19],
        backgroundColor: "#F98E76",
        hoverBackgroundColor: "rgba(249,142,118,.9)",
        borderColor: "transparent"
    }]
};

var config = {
    type: 'horizontalBar',

    // Chart Options
    options : chartOptions,

    data : chartData
};

// Create the chart
var lineChart = new Chart(ctx, config);
</script>
<script>
        var ctx = $("#column-chart");

// Chart Options
var chartOptions = {
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each bar to be 2px wide and green
    elements: {
        rectangle: {
            borderWidth: 2,
            borderColor: 'rgb(0, 255, 0)',
            borderSkipped: 'bottom'
        }
    },
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration:500,
    legend: {
        position: 'top',
    },
    scales: {
        xAxes: [{
            display: true,
            gridLines: {
                color: "#f3f3f3",
                drawTicks: false,
            },
            scaleLabel: {
                display: true,
            }
        }],
        yAxes: [{
            display: true,
            gridLines: {
                color: "#f3f3f3",
                drawTicks: false,
            },
            scaleLabel: {
                display: true,
            }
        }]
    },
    title: {
        display: true,
        text: 'Kandidat'
    }
};

// Chart Data
var chartData = {
    labels: [
        @foreach($perbandingan_kandidat as $data)
        '{{ $data->jenis_kandidat_id}}',
        @endforeach
    ],
    datasets: [{
        label: "Kandidat",
        data: [
            @foreach($perbandingan_kandidat as $data)
        '{{ $data->pk_count}}',
        @endforeach
    ],
        backgroundColor: "#7ec4cf",
        hoverBackgroundColor: "rgba(22,211,154,.9)",
        borderColor: "transparent"
    }]
};

var config = {
    type: 'bar',

    // Chart Options
    options : chartOptions,

    data : chartData
};

// Create the chart
var lineChart = new Chart(ctx, config);
</script>
<script>
    var ctx = $("#line-chart");

// Chart Options
var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
        position: 'bottom',
    },
    hover: {
        mode: 'label'
    },
    scales: {
        xAxes: [{
            display: true,
            gridLines: {
                color: "#f3f3f3",
                drawTicks: false,
            },
            scaleLabel: {
                display: true,
                labelString: 'Month'
            }
        }]
    },
    title: {
        display: true,
        text: 'Total Kandidat'
    }
};

// Chart Data
var chartData = {
    labels: [
        @foreach($time_series_kandidat as $data)
            '{{ $data->monthyear}}',
            @endforeach
        ],
    datasets: [{
        label: "Total kandidat",
        data: [@foreach($time_series_kandidat as $data)
            '{{ $data->jumlah}}',
            @endforeach
        ],
        lineTension: 0,
        fill: false,
        borderColor: "#FF7D4D",
        pointBorderColor: "#FF7D4D",
        pointBackgroundColor: "#FFF",
        pointBorderWidth: 2,
        pointHoverBorderWidth: 2,
        pointRadius: 4,
    }]
};

var config = {
    type: 'line',

    // Chart Options
    options : chartOptions,

    data : chartData
};

// Create the chart
var pieSimpleChart = new Chart(ctx, config);

var ctx = $("#simple-pie-chart");

// Chart Options
var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration:500,
};

// Chart Data
var chartData = {
    labels: [
        @foreach($pieChartRelawanJK as $data)
        '{{ $data->jenis_kelamin}}',
        @endforeach
    ],
    datasets: [{
        label: "My First dataset",
        data: [
        @foreach($pieChartRelawanJK as $data)
        '{{ $data->pcrjk}}',
        @endforeach
    ],
        backgroundColor: ['#809bce', '#eac4d5'],
    }]
};

var config = {
    type: 'pie',

    // Chart Options
    options : chartOptions,

    data : chartData
};

// Create the chart
var pieSimpleChart = new Chart(ctx, config);

var ctx = $("#line-chart-two");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Value'
                }
            }]
        },
        title: {
            display: true,
            text: 'Total Relawan'
        }
    };

    // Chart Data
    var chartData = {
    labels: [
        @foreach($time_series_relawan as $data)
            '{{ $data->monthyear}}',
            @endforeach
        ],
    datasets: [{
        label: "Total relawan",
        data: [@foreach($time_series_relawan as $data)
            '{{ $data->jumlah}}',
            @endforeach
        ],
        lineTension: 0,
        fill: false,
        borderColor: "#9966ff",
        pointBorderColor: "#9933ff",
        pointBackgroundColor: "#FFF",
        pointBorderWidth: 2,
        pointHoverBorderWidth: 2,
        pointRadius: 4,
    }]
};

    var config = {
        type: 'line',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
</script>

@endsection