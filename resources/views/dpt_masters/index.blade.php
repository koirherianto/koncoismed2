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
                                            <span class="content-header-title mb-0 d-inline-block font-medium-4"><b>DPT</b></span>
                                            <div class="breadcrumbs-top d-inline-block">
                                                <div class="breadcrumb-wrapper">
                                                    @include('layouts.breadcrumb')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-2 text-right">
                                        <a href="{{ route('dpt-masters.create') }}" class="btn btn-sm btn-green">Tambah Data
                                        </a>
                                    </div> --}}
                                    <div class="form-group right">
                                        <a href="{{ route('dpt-masters.create') }}" class="btn btn-sm btn-green btn-min-width mr-1 mb-1 float-right">+ Tambah Data</a>
                                            <button type="button" class="btn btn-amber dropdown-toggle dropdown-menu-right btn-sm float-right mr-1 mb-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-download-cloud white"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('import-dpt-masters') }}" class="dropdown-item"><i class="ft-upload"></i> Import</a>
                                                <a href="{{ route('dpt-masters.import')}}" class="dropdown-item"><i class="ft-download"></i> Export Excel</a>
                                            </div>
                                </div>
                                @include('dpt_masters.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

