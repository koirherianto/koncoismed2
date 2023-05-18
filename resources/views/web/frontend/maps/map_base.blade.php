@extends('web.frontend.layouts.app')
@section('content')
<section class="our-services page-section-ptb white-bg">
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                @include('flash::message')
                <div class="clearfix"></div>
                <div class="card">
                    <div class="border-left-pink border-left-6 box-shadow-1 rounded">
                        <div class="card-content ">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-10 media-body mb-2">
                                        <div class="content-header-left breadcrumb-new">
                                            <span class="content-header-title mb-0 d-inline-block font-medium-4"><b>Show Preview Data</b></span>
                                            <div class="breadcrumbs-top d-inline-block">
                                                <div class="breadcrumb-wrapper">
                                                    @include('web.frontend.breadcrumb')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Checkable Tree -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-body">
                                                    <div id="checkable-tree" class="vertical-scroll scroll-example height-600"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Peta</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="mapid" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{!! asset('master/app-assets/vendors/css/extensions/bootstrap-treeview.min.css') !!}"/>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <style>
        #mapid { height: 600px; }
    </style>
@endsection


@section('scripts')
    <script src="{!! asset('master/app-assets/vendors/js/extensions/bootstrap-treeview.min.js') !!}"></script>

    <script>
        $(document).ready(function(){

            //Start config map

            var map = L.map('mapid').setView([-0.496784513368001, 117.1438425378944], 10);
            var layerGroup =new L.LayerGroup();

            /*L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiZWtvaWxrb20iLCJhIjoiY2toYm13MzhvMGM5dTJxbXBkZTNvYmp2eiJ9.OnfMHmMZ-Lu8e6-mYk-EFA'
            }).addTo(map);*/

            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '<i>Sumber Data: Dinas PU Kota Samarinda</i>'
            }).addTo(map);

            layerGroup.addTo(map);
            //End Config Map

            var defaultData = {!! json_encode($data, JSON_HEX_TAG) !!};

            function _getChildren(node) {
                if (node.nodes === undefined) return [];
                var childrenNodes = node.nodes;
                node.nodes.forEach(function(n) {
                    childrenNodes = childrenNodes.concat(_getChildren(n));
                });
                return childrenNodes;
            }

            function drawGeospatial(response,id){
                datalayer = L.geoJson(response.features,{
                    style:{
                        color: "#ff5c33",
                        weight:1,
                    },
                    onEachFeature: function(feature, featureLayer) {
                        //featureLayer.bindPopup(feature.properties.kph);

                    }
                });
                datalayer._leaflet_id = id;
                layerGroup.addLayer(datalayer);
                map.fitBounds(datalayer.getBounds());
            }

            function callApi(node){
                if(node.href.startsWith("#shpfile")){
                    //$.ajax({url:'geospatial/'+node.slug,
                    $.ajax({url:'geospatial/'+node.slug,
                        success: function (response) {
                            if (Array.isArray(response.features)){
                                drawGeospatial(response,node.nodeId);
                            }else {

                            }
                        },
                        error: function (xhr, status, error){

                        }
                    });
                }
            }

            function removeLayer(node){
                if(node.href.startsWith("#shpfile")) {
                    if (layerGroup.hasLayer(node.nodeId)) {
                        layerGroup.removeLayer(node.nodeId);
                    }
                }
            }

            // Check / Uncheck All
            var $checkableTree = $('#checkable-tree').treeview({
                data: defaultData,
                showIcon: true,
                showCheckbox: true,
                onNodeChecked: function(event, node) {
                    var childrenNodes = _getChildren(node);
                    callApi(node);
                    $(childrenNodes).each(function(){
                        $('#checkable-tree').treeview('checkNode', [ this.nodeId, { silent: true } ]);
                        callApi(this);
                    });
                },
                onNodeUnchecked: function(event, node) {
                    var childrenNodes = _getChildren(node);
                    removeLayer(node);
                    $(childrenNodes).each(function(){
                        $('#checkable-tree').treeview('uncheckNode', [ this.nodeId, { silent: true } ]);
                        removeLayer(this);
                    });
                }
            });

            // Check/uncheck all
            $('#btn-check-all').on('click', function(e) {
                $checkableTree.treeview('checkAll', {
                    silent: $('#chk-check-silent').is(':checked')
                });
            });

            $('#btn-uncheck-all').on('click', function(e) {
                $checkableTree.treeview('uncheckAll', {
                    silent: $('#chk-check-silent').is(':checked')
                });
            });

        });
    </script>
@endsection
