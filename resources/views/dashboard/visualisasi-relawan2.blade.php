@extends('layouts.app')
@section('content')

@include('dashboard.visualisasi-adminkandidat')

@endsection
@section('scripts')
    <script src="{{asset('master/app-assets/js/britech/table-settings-britech.js')}}"></script>
@endsection
