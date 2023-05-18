@extends('layouts.app')
@section('content')
<div class="card">
    <div class="border-white border-left-6 box-shadow-1 rounded">
        <div class="card-content ">
            <div id="map"></div>
        </div>
    </div>
</div>
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
            center: [-0.5438331, 117.1417018],
            zoom: 11,
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
        var markers = L.markerClusterGroup();
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