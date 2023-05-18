@extends('layouts.app')
@section('content')

@if(auth()->user()->hasRole('super-admin'))

@include('dashboard.visualisasi-superadmin')

@elseif(auth()->user()->hasRole(['admin-kandidat-free', 'admin-kandidat-premium']))

@include('dashboard.visualisasi-adminkandidat')

@else

@include('dashboard.visualisasi-relawan')

@endif

@endsection
@section('scripts')
    <script src="{{asset('master/app-assets/js/britech/table-settings-britech.js')}}"></script>
@endsection
