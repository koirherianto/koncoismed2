<!-- Headline Dashboard -->
<section id="stats-subtitle">
    @hasanyrole('relawan-free|relawan-premium')
    <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Dashboard Kandidat</h3>
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
              <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Dashboard</button>
              <div class="dropdown-menu arrow">
                <a class="dropdown-item" href="{{ route('home') }}" ><i class="fa fa-user mr-1"></i>Relawan</a>
            </div>
          </div>
        </div>
    @endhasanyrole

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-indigo">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-user text-white font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right">
                                <h3 class="text-white">{{$jumlah_relawan}}</h3>
                                <span> Total Relawan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-blue">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-pencil text-white font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right">
                                <h3 class="text-white">{{$jumlah_dpt}}</h3>
                                <span>Total Pendukung</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-pink bg-lighten-2">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-graph text-white font-large-2 float-left"></i>
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
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-orange">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-rocket text-white font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right">
                                <h3 class="text-white">{{$dptNow}}</h3>
                                <span>+Pendukung Hari ini</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </
</section>
 
<!-- Most Relawan DPT Terbanyak dan Area chart pertumbuhan total DPT Setiap bulan-->
<section id="chartjs-pie-charts">
    <div class="row match-height">
        <div class="col-xl-5 col-lg-12">
            <div class="card" style="">
                <div class="card-header no-border">
                    <h4 class="card-title"><i class="fa fa-trophy amber"></i>  Relawan Dengan Pendukung Terbanyak</h4>
                    <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="table-primary">Relawan</th>
                                    @hasanyrole('admin-kandidat-free|admin-kandidat-premium')
                                    <th class="table-primary">Wilayah</th>
                                    @endhasanyrole
                                    <th class="table-primary">Total DPT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mostDpt as $data)
                                <tr>
                                    <td>{{$data->relawan_id}}</td>
                                    @hasanyrole('admin-kandidat-free|admin-kandidat-premium')
                                    <td>{{$data->id_wilayah}}</td>
                                    @endhasanyrole
                                    <td>{{$data->total}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div class="col-xl-7 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa fa-line-chart indigo"></i> Pertumbuhan Total Pendukung Setiap Bulan</h4>
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
                        <div class="height-300"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="area-chart" width="979" height="750" style="display: block; height: 500px; width: 653px;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bar charts DPT Wilayah dan DPT Suku -->
<section id="chartjs-bar-charts">
    <!-- Bar Chart -->
    <div class="row match-height">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa fa-map indigo"></i>  Pendukung Wilayah</h4>
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
                        <div class="height-300">
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa fa-fire pink"></i>  Pendukung Suku</h4>
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
                        <div class="height-300">
                            <canvas id="bar-chart-dua"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pie chart Pendukung jenis kelamin dan Pendukung Agama -->

<section id="chartjs-pie-charts">
<div class="row match-height">
    <!-- Simple Pie Chart -->
    <div class="col-md-6 col-sm-12">
        <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa fa-user indigo"></i> Pendukung Jenis Kelamin</h4>
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
                        <div class="height-300">
                            <canvas id="simple-pie-chart-dua"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Simple Pie Chart -->
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa fa-star green"></i> Pendukung Agama</h4>
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
                        <div class="height-300">
                            <canvas id="simple-pie-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pie Chart Relawan Status Perkawinan dan Pie chart Relawan Jenis Kelamin -->
<section id="chartjs-pie-charts">
    <div class="row match-height">
        <!-- Simple Pie Chart -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa fa-heart pink"></i> Relawan Status Perkawinan</h4>
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
                        <div class="height-300">
                            <canvas id="simple-pie-chart-empat"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Simple Doughnut Chart -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Relawan Jenis Kelamin</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-1"></i></a>
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
                        <div class="height-300">
                            <canvas id="simple-doughnut-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bar charts Relawan Perwilayah Kecamatan  dan Bar chart relawan desa -->
<section id="chartjs-bar-charts">
    <!-- Bar Chart -->
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Relawan Tiap Kecamatan</h4>
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
                            <canvas id="bar-chart-tiga"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bar Chart -->
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Relawan Tiap Desa/Kelurahan</h4>
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
                            <canvas id="bar-chart-empat"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- column charts range umur relawan dan range umur Pendukung -->
<div class="row">
    <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Relawan Range Umur</h4>
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
                <div class="height-400"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="column-chart" width="1066" height="600" style="display: block; height: 400px; width: 711px;" class="chartjs-render-monitor"></canvas>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendukung Range Umur</h4>
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
                <div class="height-400"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="column-chart-dua" width="1066" height="600" style="display: block; height: 400px; width: 711px;" class="chartjs-render-monitor"></canvas>
                    </div>
            </div>
        </div>
    </div>
</div>

{{-- @livewire('livewire-charts') --}}
@section('scripts')

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
        @foreach($barChartDptIdWilayah as $data)
        '{{ $data->id_wilayah}}',
        @endforeach
    ],
    datasets: [{
        label: "Jumlah DPT",
        data: [
            @foreach($barChartDptIdWilayah as $data)
        '{{ $data->total}}',
        @endforeach
    ],
        backgroundColor: "#875ec0",
        hoverBackgroundColor: "#ffb92d",
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
        @foreach($pieChartDptAgama as $data)
        '{{ $data->agama_id}}',
        @endforeach
    ],
    datasets: [{
        label: "Jumlah DPT",
        data: [
        @foreach($pieChartDptAgama as $data)
        '{{ $data->total}}',
        @endforeach
    ],
        backgroundColor: ['#875ec0','#eb4886','#46c3f2','#ffb92d','#47f24b','#2f3a4d'],
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
</script>

<script>
    var ctx = $("#bar-chart-dua");
    
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
            @foreach($barChartDptSuku as $data)
            '{{ $data->suku}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah DPT",
            data: [
                @foreach($barChartDptSuku as $data)
            '{{ $data->total}}',
            @endforeach
        ],
            backgroundColor: "#eb4886",
            hoverBackgroundColor: "#ffb92d",
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
        text: 'Timeline Pertumbuhan Total DPT Setiap bulan'
    }
};

// Chart Data
var chartData = {
    labels: [
        @foreach($time_series_dpt as $data)
            '{{ $data->monthyear}}',
            @endforeach
        ],
    datasets: [{
        label: "Total DPT",
        data: [@foreach($time_series_dpt as $data)
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
var lineChart = new Chart(ctx, config);
</script>
<script>
// Create the chart
var ctx = $("#simple-pie-chart-dua");

// Chart Options
var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration:500,
};

// Chart Data
var chartData = {
    labels: [
        
        @foreach($pieChartDptJenisKelamin as $item)
        // console.log($item);
        '{{ $item->jenis_kelamin}}',
        @endforeach
    ],
    datasets: [{
        label: "Jumlah DPT",
        data: [
        @foreach($pieChartDptJenisKelamin as $item)
        '{{ $item->total}}',
        @endforeach
    ],
        backgroundColor: ['#00b0ef','#f53d6f'],
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
</script>

<script>
    // Create the chart
    var ctx = $("#simple-pie-chart-tiga");
    
    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };
    
    // Chart Data
    var chartData = {
        labels: [
            @foreach($pieChartRelawanJenisKelamin as $item)
            // console.log($item);
            '{{ $item->jenis_kelamin}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
            @foreach($pieChartRelawanJenisKelamin as $item)
            '{{ $item->total}}',
            @endforeach
        ],
            backgroundColor:  ['#00b0ef','#f53d6f'],
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
    </script>
<script>
    // Create the chart
    var ctx = $("#simple-pie-chart-empat");
    
    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };
    
    // Chart Data
    var chartData = {
        labels: [
            @foreach($pieChartRelawanStatusPerkawinan as $item)
            // console.log($item);
            '{{ $item->status_perkawinan}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
            @foreach($pieChartRelawanStatusPerkawinan as $item)
            '{{ $item->total}}',
            @endforeach
        ],
            backgroundColor: ['#9128df','#ef2da6','#f4be3b'],
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
</script>

<script>
    var ctx = $("#bar-chart-tiga");

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
                    labelString: 'Total Relawan'
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
                    // labelString: 'Kecamatan'
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
            @foreach($barChartRelawanKecamatan as $data)
            '{{ $data->kecamatan_id}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
                @foreach($barChartRelawanKecamatan as $data)
            '{{ $data->total}}',
            @endforeach
        ],
            backgroundColor: "#46c5f1",
            hoverBackgroundColor: "#47f24b",
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
    var ctx = $("#bar-chart-empat");

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
                    labelString: 'Total Relawan'
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
                    // labelString: 'Desa'
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
            @foreach($barChartRelawanDesa as $data)
            '{{ $data->id_wilayah}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
                @foreach($barChartRelawanDesa as $data)
            '{{ $data->total}}',
            @endforeach
        ],
            backgroundColor: "#fec940",
            hoverBackgroundColor: "#47f24b",
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
                color: "#875ec0",
                drawTicks: false,
            },
            scaleLabel: {
                display: true,
                labelString: 'Bulan-Tahun'
            }
        }],
        yAxes: [{
            display: true,
            gridLines: {
                color: "#875ec0",
                drawTicks: false,
            },
            scaleLabel: {
                display: true,
                labelString: 'DPT'
            }
        }]
    },
    title: {
        display: true,
        text: 'Total DPT Setiap Bulan'
    }
};

// Chart Data
var chartData = {
    labels: [
        @foreach($time_series_dpt as $data)
            '{{ $data->monthyear}}',
            @endforeach
        ],
    datasets: [{
        label: "Total DPT",
        data: [@foreach($time_series_dpt as $data)
            '{{ $data->jumlah}}',
            @endforeach,
        ],
        backgroundColor: "#46c5f1",
            borderColor: "transparent",
            pointBorderColor: "#46c5f1",
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
                color: "#f3f3f3",
                drawTicks: false,
            },
            scaleLabel: {
                display: true,
                labelString: 'Range Umur'
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
                // labelString: 'Total Relawan'
            }
        }]
    },
    title: {
        display: true,
        text: 'Range Umur Relawan'
    }
};

// Chart Data
var chartData = {
    labels:[
        @foreach($ketUmurRelawan as $data)
            '{{ $data['ket']}}',
            @endforeach
    ],
    datasets: [{
        label: "Total Relawan",
        data: [
            @foreach($ketUmurRelawan as $data)
            '{{ $data['total']}}',
            @endforeach
        ],
        backgroundColor: "#3f51b5",
        hoverBackgroundColor: "#45f34c",
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
                labelString: 'Range Umur'
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
                // labelString: 'Total DPT'
            }
        }]
    },
    title: {
        display: true,
        text: 'Range Umur DPT'
    }
};

// Chart Data
var chartData = {
    labels:[
        @foreach($ketUmurDpt as $data)
            '{{ $data['ket']}}',
            @endforeach
    ],
    datasets: [{
        label: "Total DPT",
        data: [
            @foreach($ketUmurDpt as $data)
            '{{ $data['total']}}',
            @endforeach
        ],
        backgroundColor: "#eb4886",
        hoverBackgroundColor: "#45f34c",
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
            @foreach($pieChartRelawanJenisKelamin as $item)
            // console.log($item);
            '{{ $item->jenis_kelamin}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
            @foreach($pieChartRelawanJenisKelamin as $item)
            '{{ $item->total}}',
            @endforeach
        ],
            backgroundColor:  ['#f53d6f','#00b0ef'],
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

@endsection