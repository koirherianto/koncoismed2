@extends('layouts.app')

@section('content')
{{--    {{ Auth::user()->instansi_id }} - {{ Auth::user()->instansi->nama }}--}}
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                @canany(['superAdmin.index','userIndex.index','userAdm.index'])
                                    <div class="bg-green p-2 media-middle">
                                        <i class="fa fa-pencil-square font-large-2 text-white"></i>
                                    </div>
                                    <div class="media-body p-1">
                                        <span class="green font-medium-5 text-bold-700">Pembuatan Akun Baru</span><br>
                                        <span style="margin-top: -5px">
                                            {{ $title }}
                                        </span>
                                    </div>
                                @endcanany
                            </div>
                        </div>
                    </div>
{{--                    <div class="bs-callout-warning callout-bordered mt-1 mb-2">--}}
{{--                        <div class="media align-items-stretch">--}}
{{--                            <div class="media-body p-1">--}}
{{--                                <strong>UNTUK DIPERHATIKAN</strong>--}}
{{--                                <p>Penambahan akun dilakukan oleh pihak yang berwenang, jangan membuat akun baru tanpa mendapat wewenang dari pimpinan.</p>--}}
{{--                            </div>--}}
{{--                            <div class="media-right d-flex align-items-center bg-warning p-2">--}}
{{--                                <i class="fa fa-warning white font-medium-5"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')

                    {!! Form::open(['route' => 'users.store'], ['class' => 'form']) !!}
                    <div class="form-body">
                        @include('users.fields')
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('master/app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
@endsection
