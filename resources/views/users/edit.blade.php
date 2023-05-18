@extends('layouts.app')

@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden rounded-2 box-shadow-1">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-warning bg-darken-1 p-2 media-middle" style="border-top-left-radius: 0.5em;border-bottom-left-radius: 0.5em">
                                    <i class="fa fa-pencil-square font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-1">
                                    <span class="warning darken-1 font-medium-5 text-bold-700">Perubahan Data Akun</span><br>
{{--                                    <span style="margin-top: -5px">{{ $title }} </span>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')

                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
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
