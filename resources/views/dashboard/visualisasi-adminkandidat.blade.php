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
    <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="card bg-amber">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-left media-middle">
                            <i class="fa fa-trophy white font-large-2 float-left"></i>
                        </div>
                        <div class="media-body white text-right">
                            <h3 class="white">{{$winRate}}</h3>
                            <span>Progress Pemenangan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="p-1 text-center">
                        <div>
                            <h3 class="font-large-1 grey darken-1 text-bold-400">{{$jumlah_relawan}}</h3>
                            <span class="font-small-3 grey darken-1">Total Relawan</span>
                        </div>
                        <div class="card-content overflow-hidden">
                            <div id="morris-comments" class="height-75" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="75" version="1.1" width="232.667" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.791687px; top: -0.65625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="#5cc8ad" stroke="none" d="M25,31.25C28.25999885119377,29.6875,34.77999655358131,25.15625,38.039995404775084,25C41.299994255968855,24.84375,47.8199919583564,28.59375,51.07999080955017,30C54.33998966074394,31.40625,60.85998736313148,35.93792749658003,64.11998621432525,36.25C67.38891656922092,36.56292749658003,73.92677727901227,32.18707114088647,77.19570763390794,32.5C80.45567805728322,32.81207114088647,86.97561890403377,38.593750681268034,90.23558932740904,38.75C93.49558817860282,38.906250681268034,100.01558588099036,33.90625,103.27558473218413,33.75C106.5355835833779,33.59375,113.05558128576544,37.18792749658003,116.31558013695921,37.5C119.58451049185489,37.81292749658003,126.12237120164625,35.624145006839946,129.39130155654192,36.25C132.65130040773568,36.874145006839946,139.17129811012325,41.25,142.431296961317,42.5C145.69129581251076,43.75,152.2112935148983,46.71875,155.47129236609206,46.25C158.73129121728584,45.78125,165.25128891967336,38.906036251709985,168.51128777086714,38.75C171.78021812576281,38.593536251709985,178.31807883555416,45.46939124487004,181.58700919044983,45C184.84700804164362,44.53189124487004,191.36700574403113,36.5625,194.62700459522492,35C197.8870034464187,33.4375,204.40700114880622,33.125,207.667,32.5L207.667,50L25,50Z" fill-opacity="0.1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.1;"></path><path fill="none" stroke="#37bc9b" d="M25,31.25C28.25999885119377,29.6875,34.77999655358131,25.15625,38.039995404775084,25C41.299994255968855,24.84375,47.8199919583564,28.59375,51.07999080955017,30C54.33998966074394,31.40625,60.85998736313148,35.93792749658003,64.11998621432525,36.25C67.38891656922092,36.56292749658003,73.92677727901227,32.18707114088647,77.19570763390794,32.5C80.45567805728322,32.81207114088647,86.97561890403377,38.593750681268034,90.23558932740904,38.75C93.49558817860282,38.906250681268034,100.01558588099036,33.90625,103.27558473218413,33.75C106.5355835833779,33.59375,113.05558128576544,37.18792749658003,116.31558013695921,37.5C119.58451049185489,37.81292749658003,126.12237120164625,35.624145006839946,129.39130155654192,36.25C132.65130040773568,36.874145006839946,139.17129811012325,41.25,142.431296961317,42.5C145.69129581251076,43.75,152.2112935148983,46.71875,155.47129236609206,46.25C158.73129121728584,45.78125,165.25128891967336,38.906036251709985,168.51128777086714,38.75C171.78021812576281,38.593536251709985,178.31807883555416,45.46939124487004,181.58700919044983,45C184.84700804164362,44.53189124487004,191.36700574403113,36.5625,194.62700459522492,35C197.8870034464187,33.4375,204.40700114880622,33.125,207.667,32.5" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="25" cy="31.25" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="38.039995404775084" cy="25" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="51.07999080955017" cy="30" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="64.11998621432525" cy="36.25" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="77.19570763390794" cy="32.5" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="90.23558932740904" cy="38.75" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="103.27558473218413" cy="33.75" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="116.31558013695921" cy="37.5" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="129.39130155654192" cy="36.25" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="142.431296961317" cy="42.5" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="155.47129236609206" cy="46.25" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="168.51128777086714" cy="38.75" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="181.58700919044983" cy="45" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="194.62700459522492" cy="35" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="207.667" cy="32.5" r="0" fill="#37bc9b" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                            <ul class="list-inline clearfix mb-0">
                                <li class="border-right-grey border-right-lighten-2 pr-2">
                                    <h3 class="blue text-bold-400">{{$totalRelawanLakilaki}}</h3>
                                    <span class="font-small-3 grey darken-1"><i class="ft-chevron-up success"></i> Laki-laki</span>
                                </li>
                                <li class="pl-2">
                                    <h3 class="red text-bold-400">{{$totalRelawanPerempuan}}</h3>
                                    <span class="font-small-3 grey darken-1"><i class="ft-chevron-down success"></i> Perempuan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="card mt-1 mb-1">
                        <span class="green darken-1">Total Dukungan</span>
                        <h3 class="font-large-2 grey darken-1 text-bold-200">{{$jumlah_dpt}}</h3>
                    </div>
                    <div class="card-content">
                        <div class="height-150">
                            {{-- <canvas id="simple-doughnut-chart-dua"></canvas> --}}
                            <canvas id ="simple-doughnut-chart-dua" width="225" height="225" style="width: 150px; height: 150px;"></canvas>
                            {{-- <i class="knob-center-icon ft-trending-up" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font: normal 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none;font-size: 50px;"></i> --}}
                        </div>
                        {{-- <div style="display:inline;width:150px;height:150px;">
                            <canvas width="225" height="225" style="width: 150px; height: 150px;"></canvas>
                            <input type="text" value="75" class="knob hide-value responsive angle-offset" data-angleoffset="0" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#37BC9B" data-knob-icon="ft-trending-up" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font: bold 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none; display: none;">
                            <i class="knob-center-icon ft-trending-up" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font: normal 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none;font-size: 50px;"></i>
                        </div> --}}
                        <ul class="list-inline clearfix mt-2 mb-0">
                            <li class="border-right-grey border-right-lighten-2 pr-2">
                                <h2 class="grey darken-1 text-bold-400">{{$totalPendukungLakilaki}}</h2>
                                <span class="blue">Laki-laki</span>
                            </li>
                            <li class="pl-2">
                                <h2 class="grey darken-1 text-bold-400">{{$totalPendukungPerempuan}}</h2>
                                <span class="red">Perempuan</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="green">{{$targetDukungan}}</h3>
                            <span>Target Pendukung</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="ft-award green font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress mt-1 mb-0" style="height: 7px;">
                        <div class="progress-bar bg-green" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="amber">{{$dptNow}}</h3>
                            <span>+ Pendukung hari ini</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="ft-package amber font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress mt-1 mb-0" style="height: 7px;">
                        <div class="progress-bar bg-amber" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="grey darken-4">{{$relawanNow}}</h3>
                            <span>+ Relawan hari ini</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="ft-users grey darken-4 font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress mt-1 mb-0" style="height: 7px;">
                        <div class="progress-bar bg-grey bg-darken-4" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- kinerja relawan statistik --}}

<div class="row">
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card bg-green">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            {{-- <i class="icon-pencil text-white font-large-2 float-left"></i> --}}
                            <h1 class="text-white">{{$rataRataPerHari}}</h1>
                        </div>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">Harian</h3>
                            <span>Avg. Dukungan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card bg-amber">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            {{-- <i class="icon-speech text-white font-large-2 float-left"></i> --}}
                            <h1 class="text-white">{{$rataRataPerMinggu}}</h1>
                        </div>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">Mingguan</h3>
                            <span>Avg. Dukungan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card bg-grey bg-darken-4">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            {{-- <i class="icon-graph text-white font-large-2 float-left"></i> --}}
                            <h1 class="text-white">{{$rataRataPerBulan}}</h1>
                        </div>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">Bulanan</h3>
                            <span>Avg. Dukungan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- monitoring wilayah dan history dukungan --}}
<div class="row match-height">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">MONITORING WILAYAH</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>Informasi mengenai wilayah<span class="float-right"><a href="project-summary.html" target="_blank">Lihat detail <i class="ft-arrow-right"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default" data-ps-id="1fb96c43-ff76-b93b-daf8-539428da8ba6">
                        <thead>
                            <tr>
                                <th class="table-success">Kel/Desa</th>
                                <th class="table-success">DPT</th>
                                <th class="table-success">TPS</th>
                                <th class="table-success">Dukungan</th>
                                <th class="table-success">Relawan</th>
                            </tr>
                        </thead>
                        <tbody> 
                                <tr>
                                    @foreach($monitoringWilayahPendukung as $data)
                                    <td>{{$data->id_wilayah}}</td>
                                    <td>12.394</td>
                                    <td>379</td>
                                    <td>{{$data->total}}</td>
                                    @endforeach
                                    @foreach($monitoringWilayahRelawan as $item)
                                    <td>{{$item->total}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <th>461.767</th>
                                    <th>4.277</th>
                                    <th>34.6276</th>
                                    <th>374</th>
                                </tr>
                        </tbody>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-line-chart indigo"></i> History Dukungan Setiap Bulan</h4>
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

{{-- relawan sebaran wilayah & jenis kelamin --}}
<div class="row match-height">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sebaran Wilayah</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>Informasi mengenai relawan<span class="float-right"><a href="project-summary.html" target="_blank">Lihat detail <i class="ft-arrow-right"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default" data-ps-id="1fb96c43-ff76-b93b-daf8-539428da8ba6">
                        <thead>
                            <tr>
                                <th class="table-primary">Nama Wilayah</th>
                                <th class="table-primary">P</th>
                                <th class="table-primary">L</th>
                                <th class="table-primary">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody> 
                                <tr>
                                    @foreach($sebaranWilayahP as $data)
                                    <td>{{$data->id_wilayah}}</td>
                                    <td>{{$data->total}}</td>
                                    @endforeach
                                    @foreach($sebaranWilayahL as $item)
                                    <td>{{$item->total}}</td>
                                    @endforeach
                                    @foreach($sebaranWilayahTotal as $data)
                                    <td>{{$data->total}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <th>461.767</th>
                                    <th>4.277</th>
                                    <th>34.6276</th>
                                </tr>
                        </tbody>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Demography Gender Relawan</h4>
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

{{-- Demography usia relawan dan usia pendukung --}}
<div class="row match-height">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Demography Usia Relawan</h4>
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
                            <canvas id="column-double"></canvas>
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
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="height-400">
                            <canvas id="column-double-2"></canvas>
                        </div>
                </div>
            </div>
        </div>
    </div>


<!-- Bar charts DPT Wilayah dan DPT Suku -->

<section id="chartjs-bar-charts">
    <!-- Bar Chart -->
    <div class="row match-height">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Pendukung Berdasarkan Wilayah</h4>
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
                    <h4 class="card-title"> Pendukung Berdasarkan Suku</h4>
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
                    <h4 class="card-title"> Demography Gender Pendukung</h4>
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
                    <h4 class="card-title"> Pendukung Berdasarkan Agama</h4>
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

<!-- Pie Chart Relawan Status Perkawinan -->
<section id="chartjs-pie-charts">
    <div class="row match-height">
        <!-- Simple Pie Chart -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Relawan Berdasarkan Status Perkawinan</h4>
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
        label: "Jumlah Pendukung",
        data: [
            @foreach($barChartDptIdWilayah as $data)
        '{{ $data->total}}',
        @endforeach
    ],
        backgroundColor: "#4CAF50",
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
        label: "Jumlah Pendukung",
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
            label: "Jumlah Pendukung",
            data: [
                @foreach($barChartDptSuku as $data)
            '{{ $data->total}}',
            @endforeach
        ],
            backgroundColor: "#FFC107",
            hoverBackgroundColor: "#4CAF50",
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
            backgroundColor: ['#4CAF50','#FFC107','#212121'],
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
                    labelString: 'Jumlah Relawan'
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
            backgroundColor: "#4CAF50",
            hoverBackgroundColor: "#FFC107",
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
                    labelString: 'Jumlah Relawan'
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
            backgroundColor: "#FFC107",
            hoverBackgroundColor: "#4CAF50",
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
        text: 'Total Dukungan'
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
    var chartData = 
    {
    labels:[
        @foreach($ketUmurRelawanL as $data)
            '{{ $data['ket']}}',
            @endforeach
    ],
    datasets: [{
        label: "Laki-laki",
        data: [
            @foreach($ketUmurRelawanL as $data)
            '{{ $data['total']}}',
            @endforeach
        ],
        backgroundColor: "#00b0ef",
        hoverBackgroundColor: "#45f34c",
        borderColor: "transparent"
    },
    {
        label: "Perempuan",
        data: [
            @foreach($ketUmurRelawanP as $data)
            '{{ $data['total']}}',
            @endforeach
        ],
        backgroundColor: "#eb4886",
        hoverBackgroundColor: "#45f34c",
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
    var ctx = $("#column-double-2");

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
    var chartData = 
    {
    labels:[
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
        backgroundColor: "#00b0ef",
        hoverBackgroundColor: "#45f34c",
        borderColor: "transparent"
    },
    {
        label: "Perempuan",
        data: [
            @foreach($ketUmurDptP as $data)
            '{{ $data['total']}}',
            @endforeach
        ],
        backgroundColor: "#eb4886",
        hoverBackgroundColor: "#45f34c",
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
    var ctx = $("#simple-doughnut-chart-dua");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        cutoutPercentage: 88,
        tooltips: {
            enabled: false
        },
        legend: {
            display: false
        }  
    };
    

    // Chart Data
    var chartData = {
        labels: [
            // console.log($item);
            '{{''}}',
        ],
        datasets: [{
            label: "",
            data: [
            '{{ $winRate}}',
            '{{ $selisihTargetPendukung}}'
        ],
            backgroundColor:  ['#e1e1e1', '#4CAF50'],
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