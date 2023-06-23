@extends('layouts.app')

@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-amber p-2 media-middle">
                                    <i class="fa fa-pencil-square font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-1">
                                    <span class=" font-medium-5">Tambah Relawan</span><br>
                                    <span style="margin-top: -5px">Membuat Relawan Baru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class= "border-light-green border-darken-4 border-left-6 box-shadow-1 rounded">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                {!! Form::open(['route' => 'relawans.store']) !!}
                                <div class="form-body">
                                    @include('relawans.fields')
                                    <div class="form-actions center">
                                        <a href="{{ route('users.index') }}" class="btn btn-red mr-2">Batal</a>
                                        {!! Form::submit('Simpan', ['class' => 'btn btn-green']) !!}
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

