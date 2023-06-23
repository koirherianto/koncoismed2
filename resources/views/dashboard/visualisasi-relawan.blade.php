<!-- Header -->
<section id="stats-subtitle">
    <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Dashboard Relawan</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Visualization
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-4 col-12 mb-2">
          <div class="btn-group float-md-right">
            <button class="btn btn-green btn-round dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Dashboard</button>
            <div class="dropdown-menu arrow">
                {{-- <a class="dropdown-item" href="#"> --}}
                   <a class="dropdown-item" href="{{ route('visualisasikandidat') }}" ><i class="fa fa-users mr-1"></i> Kandidat</a>
                    {{-- <i class="fa fa-user mr-1"></i> Relawan</a><a class="dropdown-item" href="dashboard.home"> --}}
                {{-- </a> --}}
          </div>
        </div>
      </div>
    </div>
</section>

{{-- timeseries dpt total setiap bulan &  dpt 30 hari terakhir--}}
<div class="row match-height">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Dukungan 30 Hari Terakhir</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> --}}
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body chartjs">
                    <div class="height-350">
                        <canvas id="area-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card bg-lime">
            <div class="card-header">
                <h4 class="card-title">Total Dukungan</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> --}}
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="height-350">
                        <canvas id="column-chart"></canvas>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Headline Dashboard -->
<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-grey bg-darken-4">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="ft ft-package text-white font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">{{$jumlahPendukung}}</h3>
                            <span>Total Dukungan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-lime">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="ft ft-users text-white font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">{{$jumlah_relawan}}</h3>
                            <span>Total Relawan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-light-green">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="ft ft-box text-white font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">{{$dptNow}}</h3>
                            <span>+Dukungan Hari ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-yellow bg-darken-2">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="ft ft-user-plus text-white font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">{{$relawanNow}}</h3>
                            <span>+Relawan Hari ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- pie chart gender pendukung dan column chart range umur pendukung --}}

<div class="row match-height">
<div class="col-md-6 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Demography Gender Pendukung</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> --}}
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="height-300">
                    <canvas id="simple-doughnut-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Demography Usia Pendukung</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> --}}
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="height-300">
                    <canvas id="column-double"></canvas>
                </div>
        </div>
    </div>
</div>
</div>

{{-- bar chart suku pendukung dan column chart berdasarkan agama --}}
<div class="row match-height">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendukung Berdasarkan Suku</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> --}}
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="height-300">
                        <canvas id="bar-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendukung Berdasarkan Agama</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> --}}
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="height-300">
                        <canvas id="column-chart-dua"></canvas>
                    </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')

<script>
     var ctx = $("#area-chart");

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
                labelString: ''
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
                labelString: 'Dukungan'
            }
        }]
    },
    title: {
        display: true,
        text: ''
    }
};

// Chart Data
    var chartData = {
        labels: [
            @foreach($areaChart30 as $data)
            '{{ $data->created_at}}',
            @endforeach
        ],
        datasets: [{
            label: "Dukungan",
            data: [
                @foreach($areaChart30 as $data)
            '{{ $data->total}}',
            @endforeach
        ],
            backgroundColor: "#8BC34A",
            borderColor: "transparent",
            pointBorderColor: "#64DD17",
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

        // Chart Data
        data : chartData
    };

    // Create the chart
    var areaChart = new Chart(ctx, config);
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
                    color: "#CDDC39",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#CDDC39",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: true,
            text: ''
        }
    };

    // Chart Data
    var chartData = {
        labels: [
            @foreach($time_series_pendukung as $data)
            '{{ $data->monthyear}}',
            @endforeach
        ],
        datasets: [{
            label: "Dukungan",
            data: [
                @foreach($time_series_pendukung as $data)
            '{{ $data->jumlah}}',
            @endforeach
        ],
            backgroundColor: "#424242",
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
    var ctx = $("#simple-doughnut-chart");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };

    // Chart Data
    var chartData = {
        labels: [
            @foreach($pendukungGender as $data)
            '{{ $data->jenis_kelamin}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Pendukung",
            data: [
                @foreach($pendukungGender as $data)
            '{{ $data->total}}',
            @endforeach
        ],
        backgroundColor:  ['#E91E63','#2196F3'],
            hoverBackgroundColor: "#880E4F",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'doughnut',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var doughnutSimpleChart = new Chart(ctx, config);
</script>
<script>
     var ctx = $("#column-double");

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
            text: ''
        }
    };

    // Chart Data
    var chartData = {
        labels: [
        @foreach($ketUmurDptL as $data)
            '{{ $data['ket']}}',
            @endforeach
    ],
    datasets: [{
        label: "Laki-laki",
        data: [
            @foreach($ketUmurDptL as $data)
            '{{ $data['total']}}',
            @endforeach
        ],
        backgroundColor: "#2196F3",
        hoverBackgroundColor: "#0D47A1",
        borderColor: "transparent"
    },
    {
        label: "Perempuan",
        data: [
            @foreach($ketUmurDptP as $data)
            '{{ $data['total']}}',
            @endforeach
        ],
        backgroundColor: "#E91E63",
        hoverBackgroundColor: "#880E4F",
        borderColor: "transparent"
    }
    ]
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
    var ctx = $("#bar-chart");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each horizontal bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'left'
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
            display: false,
            text: 'Chart.js Horizontal Bar Chart'
        }
    };

    // Chart Data
    var chartData = {
        labels: [
            @foreach($pendukungSuku as $data)
            '{{ $data->suku}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
                @foreach($pendukungSuku as $data)
            '{{ $data->total}}',
            @endforeach
        ],
            backgroundColor: "#CDDC39",
            hoverBackgroundColor: "#8BC34A",
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
    var ctx = $("#column-chart-dua");

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
            text: ''
        }
    };

    // Chart Data
    var chartData = {
        labels: [
            @foreach($pendukungAgama as $data)
            '{{ $data->agama}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
                @foreach($pendukungAgama as $data)
            '{{ $data->total}}',
            @endforeach
        ],
        backgroundColor: "#8BC34A",
            hoverBackgroundColor: "#CDDC39",
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
@endsection