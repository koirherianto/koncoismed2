@extends('layouts.app')

@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body d-flex rounded-1 box-shadow-0-1">
                        <a href="{!! url()->previous() !!}"><i class="fa fa-arrow-left text-bold-700 font-medium-5 red"></i> <span class="font-medium-5 text-bold-600 black pl-1">Perubahan Data Unit</span></a>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card rounded-1 box-shadow-0-1">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
                                <div class="form-body">
{{--                                    @include('units.fields_unit')--}}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
