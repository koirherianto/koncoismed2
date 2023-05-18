<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="author" content="Britech">
        <title>Dashboard :: Kawal Data</title>
        <link rel="shortcut icon" href="{{asset('image/gelora.png')}}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('asset-web/images/logo-icon-dark.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('asset-web/images/logo-icon-dark.png')}}">
        <link rel="shortcut icon" type="image/png" href="{{asset('asset-web/images/logo-icon-dark.png')}}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <link href="{{asset('master/app-assets/css/font.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        
        {{-- jquery --}}
        <script src="jquery-3.6.3.min.js"></script>

        {{-- cluster marker --}}
        <link rel="stylesheet" href="{{asset('master/assets/js/leaflet/MarkerCluster.css')}}"/>
        <link rel="stylesheet" href="{{asset('master/assets/js/leaflet/MarkerCluster.Default.css')}}"/>
        <script src="{{asset('master/assets/js/leaflet/leaflet.markercluster.js')}}"></script>

        @include('layouts.css')
        @yield('css')
        @livewireStyles
        <style>
            #map { height: 500px; }
        </style>
    </head>
    <body class="vertical-layout vertical-mmenu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-mmenu" data-col="2-columns">
    
        @include('layouts.toolbar')

        @include('layouts.sidebar')
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                @yield('content')      
            </div>
        </div>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
        @include('layouts.js')
        @yield('scripts')
        @stack('scripts')
       
    </body>
</html>
