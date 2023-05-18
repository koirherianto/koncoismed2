<div class="content-body">
    <div class="row">
        <div class="col-4">
            <div class="card box-shadow-1 rounded-1">
                <div class="card-body text-center">
                    @if(empty(Auth::user()->foto))
                        <img src="{{ asset('master/app-assets/images/gallery/user_profil.png') }}" class="img-fluid rounded">
                    @else
                        <img src="{{ asset(Auth::user()->foto) }}" class="rounded-circle img-fluid ">
                    @endif
                    <div class="font-medium-2 text-bold-700 black mt-2">{{ Auth::user()['username'] }}</div>
                    <div class="font-medium-1 black">{{ Auth::user()->email }}</div>
                    <a data-target="#editProfil" data-toggle="modal" href="javascript:void(0)"  class="btn btn-primary btn-sm mt-2">Ubah Profil</a>
                    @include('users.modal.edit_profile')
                </div>
            </div>

            @if(count(Auth::user()['unit']['unitPolygons']) < 1)
                <div class="alert alert-warning mb-2" role="alert">
                    <strong><i class="fa fa-info-circle"></i> Informasi</strong> <br>Akun ini belum memiliki data polygon, kami terus berusaha untuk dapat memperbaiki upload polygon.
                </div>
            @endif
        </div>
        <div class="col-8">
            <div class="card box-shadow-1 rounded-1">
                <div class="card-body pt-0">
                    <table class="table black mb-0 font-small-4">
                        <tr>
                            <td colspan="3" class="p-1 border-top-0">
                                <div class="font-large-1 text-bold-800 black">{{ Auth::user()['name'] }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-1 border-top-0">
                                <div class="font-medium-1 text-bold-800 black">Data Akun</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-1">Username</td>
                            <td class="p-1">:</td>
                            <td class="p-1">{{ Auth::user()['username'] }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Alamat</td>
                            <td class="p-1">:</td>
                            <td class="p-1">{{ Auth::user()['alamat'] }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">No.Telephone/HP</td>
                            <td class="p-1">:</td>
                            <td class="p-1">{{ Auth::user()['no_hp'] }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Email</td>
                            <td class="p-1">:</td>
                            <td class="p-1">{{ Auth::user()['email'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-1 border-top-0">
                                <div class="font-medium-1 text-bold-800 black">Unit Pelaksana</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-1">Nama Lengkap</td>
                            <td class="p-1">:</td>
                            <td class="p-1"><span class="text-bold-700 text-uppercase">{{ Auth::user()['unit']['nama'] }}</span> </td>
                        </tr>
                        <tr>
                            <td class="p-1">Alamat</td>
                            <td class="p-1">:</td>
                            <td class="p-1"><span>{{ Auth::user()['unit']['alamat'] }}</span> </td>
                        </tr>
                        <tr>
                            <td class="p-1">No. Kontak</td>
                            <td class="p-1">:</td>
                            <td class="p-1"><span>{{ Auth::user()['unit']['no_telp'] }}</span> </td>
                        </tr>
                        <tr>
                            <td class="p-1">Tujuan Umum</td>
                            <td class="p-1">:</td>
                            <td class="p-1">{{ Auth::user()['unit']['tujuan_umum'] }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Tujuan Khusus</td>
                            <td class="p-1">:</td>
                            <td class="p-1">{{ Auth::user()['unit']['tujuan_khusus'] }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Instansi Pengampu</td>
                            <td class="p-1">:</td>
                            <td class="p-1"><span class="text-bold-700 text-uppercase">{{ Auth::user()['unit']['instansi']['nama'] }}</span> </td>
                        </tr>
                        <tr>
                            <td class="p-1">Bergabung</td>
                            <td class="p-1">:</td>
                            <td class="p-1">{{ \Jenssegers\Date\Date::parse(Auth::user()['created_at'])->format('d F Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if(count(Auth::user()['unit']['unitPolygons']) > 0)
        <div class="card box-shadow-1 rounded-1">
            <div class="card-body pt-0">
                <div class="font-medium-2 text-bold-600 black mt-2 border-bottom border-bottom-black pb-0-1">Maps Unit</div>
                <div class="card-block">
                    <div name="mapPrev" id="mapPrev" style="height: 400px"></div>
                </div>
            </div>
        </div>
    @endif
</div>
@if(count(Auth::user()['unit']['unitPolygons']) > 0)
    @section("scripts")
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        @role('USR')
        <script>
            var newMap = L.map('mapPrev').setView([0.016373, 116.4330107], 7);
            // add GeoJSON layer to the map once the file is loaded
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href=”http://osm.org/copyright”>OpenStreetMap</a> contributors'
            }).addTo(newMap);
            $.ajax({url:'/api/geojson_unit/{{\Illuminate\Support\Facades\Auth::user()->unit->unitPolygons[0]['geo_id']}}',
                success: function (response) {
                    console.log(response);
                    var datalayer = L.geoJson(response.features,{
                        style:{
                            color: "#ff5c33",
                            weight:1,
                        },
                        onEachFeature: function(feature, featureLayer) {
                            featureLayer.bindPopup(feature.properties.kph);
                        }
                    }).addTo(newMap);
                    newMap.fitBounds(datalayer.getBounds());

                },
                error: function (xhr, status, error){
                    alert("Error:"+error);
                }
            });
        </script>
        @endrole
    @endsection
@endif
