@extends('layouts.app')
@section('content')
{{-- <div class="card">
    <div class="border-white border-left-6 box-shadow-1 rounded">
        <div class="card-content ">
            <div id="map"></div>
        </div>
    </div>
</div> --}}
<section id="gmaps-basic-maps">
    <!-- Basic Map -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Persebaran Relawan Konco Ismed</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> --}}
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        {{-- <p class="card-text">You must define <strong>container ID</strong>, <strong>latitude</strong> and <strong>longitude</strong> of the map's center.</p>

                        <p class="card-text">You also can define <strong>zoom</strong>, <strong>width</strong> and <strong>height</strong>. By default, zoom is 15. Width an height in a CSS class will replace these values.</p>

                        <p class="card-text">Map types are defined in the <strong>mapType</strong> property. Allowed values are: <strong>roadmap</strong> (default), <strong>satellite</strong>, <strong>hybrid</strong> and <strong>terrain</strong>.</p> --}}
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script>
        //var map = L.map('map').setView([-0.5438331, 117.1417018], 11);

        //variabel base map
        var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });
        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta3 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });

        // deklarasi peta

        var map = L.map('map', {
            center: [-0.547067, 117.1151387],
            zoom: 11,
            maxZoom: 20,
            doubleClickZoom: false,
            layers: [peta1]
        });

        //base map
        var baseMaps = {
            "Grayscale": peta1,
            "Satellite": peta2,
        };

        L.control.layers(baseMaps).addTo(map);
    
        // add tile layer
        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 19,
        //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        // }).addTo(map);
        
        //add multi marker
        // $( document ).ready(function() {
        //     $.getJSON('titik-peta-relawan',function(data){
        //         $.each(data, function(index){
        //             L.marker([data[index].latitude,data[index].longitude]).addTo(map);
        //         });
        //     });
        // });

         //add cluster
        var markers = L.markerClusterGroup({
            //tiga baris di bawah mematikan spider cluster
            spiderfyOnMaxZoom:false,
            showCoverageOnHover: false,
            zoomToBoundsOnClick: false
        });
        $( document ).ready(function() {
            $.getJSON('titik-peta-relawan',function(data){
                $.each(data, function(index){
                    var lokasi = L.marker([data[index].latitude,data[index].longitude])
                    //tambah click pop up
                    .bindPopup('Nama : '+ [data[index].nama]);
                    
                    markers.addLayer(lokasi);
                    map.addLayer(markers);
                    map.fitBounds(markers.getBounds());
                });
            });
        });


    </script>
@endsection