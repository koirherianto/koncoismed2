<!-- Sudah di modifikasi -->
@extends('layouts.app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">
                                Ganti Password Anda
                            </h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">

                                @include('adminlte-templates::common.errors')

                                <div class="card-text">
                                    <p>Isi bidang isian dibawah dengan data yang <code>valid dan benar</code>.</p>
                                </div>

                                {!! Form::open(['route' => 'store_change_password'], ['class' => 'form']) !!}

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-body">

                                            @include('users.fields_change_password')

                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
