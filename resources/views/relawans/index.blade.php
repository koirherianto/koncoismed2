@extends('layouts.app')
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                @include('flash::message')
                <div class="clearfix"></div>
                <div class="card">
                    <div class="border-left-green border-left-6 box-shadow-1 rounded">
                        <div class="card-content ">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-10 media-body mb-2">
                                        <div class="content-header-left breadcrumb-new">
                                            <span class="content-header-title mb-0 d-inline-block font-medium-4"><b>Relawan</b></span>
                                            <div class="breadcrumbs-top d-inline-block">
                                                <div class="breadcrumb-wrapper">
                                                    @include('layouts.breadcrumb')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @hasanyrole('admin-kandidat-free|admin-kandidat-premium|relawan-free|relawan-premium')
                                    <div class="form-group right">
                                        <a href="{{ route('relawans.create') }}" class="btn btn-sm btn-green btn-min-width mr-1 mb-1 float-right">+ Tambah Data</a>
                                        {{-- <a href="{{ route('importRelawan') }}" class="btn btn-sm btn-amber round btn-min-width mr-1 mb-1 float-right">Import Excel</a> --}}
                                            <button type="button" class="btn btn-amber dropdown-toggle dropdown-menu-right btn-sm float-right mr-1 mb-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-download-cloud white"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('importRelawan') }}" class="dropdown-item"><i class="ft-upload"></i> Import</a>
                                                <a href="#" class="dropdown-item"><i class="ft-download"></i> Export</a>
                                            </div>
                                        {{-- <span class="dropdown show">
                                            <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-amber dropdown-toggle dropdown-menu-right btn-sm float-right mr-1 mb-1"><i class="ft-download-cloud white"></i></button>
                                            <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right show" x-placement="bottom-end" style="position: absolute; transform: translate3d(-106px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a href="{{ route('importRelawan') }}" class="dropdown-item"><i class="ft-upload"></i> Import</a>
                                                <a href="#" class="dropdown-item"><i class="ft-download"></i> Export</a>
                                            </span>
                                        </span> --}}
                                    </div>
                                    @endhasanyrole
                                </div>
                                @if(auth()->user()->hasRole('super-admin'))
                                @include('relawans.table-superadmin')
                                @elseif(auth()->user()->hasRole('admin-kandidat-premium'))
                                @include('relawans.table-adminkandidat')
                                @elseif(auth()->user()->hasRole('admin-kandidat-free'))
                                @include('relawans.table-adminkandidatfree')
                                @else
                                @include('relawans.table-relawan')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

