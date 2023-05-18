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
            <button class="btn btn-light btn-outline-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Dashboard</button>
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

<!-- Headline Dashboard -->
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
                            <span>Total Relawan</span>
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
                            <span>Total DPT</span>
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
                            <h3 class="text-white">{{$dptNow}}</h3>
                            <span>+ DPT Hari ini</span>
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
                            <i class="icon-graph text-white font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">{{$relawanNow}}</h3>
                            <span>+ Relawan Hari ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pie chart relawan status pernikahan dan jenis kelamin -->
<section id="chartjs-pie-charts">
    <div class="row match-height">
        <!-- Simple Pie Chart -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Relawan Status Perkawinan </h4>
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
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Relawan Jenis Kelamin </h4>
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
                            <canvas id="simple-pie-chart-satu"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
</section>

@section('scripts')

<script>
    // Create the chart
    var ctx = $("#simple-pie-chart-satu");
    
    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };
    
    // Chart Data
    var chartData = {
        labels: [
            @foreach($ketJKRelawan as $item)
            // console.log($item);
            '{{ $item['ket']}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
            @foreach($ketJKRelawan as $item)
            '{{ $item['total']}}',
            @endforeach
        ],
            backgroundColor: ['#eb4886','#46c3f2'],
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
            @foreach($ketSPRelawan as $item)
            // console.log($item);
            '{{ $item['ket']}}',
            @endforeach
        ],
        datasets: [{
            label: "Jumlah Relawan",
            data: [
            @foreach($ketSPRelawan as $item)
            '{{ $item['total']}}',
            @endforeach
        ],
            backgroundColor: ['#875ec0','#eb4886','#46c3f2'],
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

@endsection