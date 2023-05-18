@extends('layouts.app')

@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-blue p-2 media-middle">
                                    <i class="fa fa-pencil-square font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-1">
                                    <span class="blue font-medium-5">Input Relawans</span><br>
                                    <span style="margin-top: -5px">Membuat Relawans Baru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class= "border-left-light-blue border-left-6 box-shadow-1 rounded">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                {!! Form::open(['route' => 'relawans.store']) !!}
                                <div class="form-body">
                                    @include('relawans.fields')
                                    <div class="form-actions center">
                                        <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
                                        {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

