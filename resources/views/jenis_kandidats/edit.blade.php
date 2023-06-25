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
                                    <span class="amber font-medium-5">Perubahan Jenis Kandidat</span><br>
                                    <span style="margin-top: -5px">Melakukan Perubahan Jenis Kandidat </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                {!! Form::model($jenisKandidat, ['route' => ['jenisKandidats.update', $jenisKandidat->id], 'method' => 'patch']) !!}
                                <div class="form-body">
                                    @include('jenis_kandidats.fields')
                                    <div class="form-actions center">
                                        <a href="{{ route('jenisKandidats.index') }}" class="btn btn-red">Batal</a>
                                        {!! Form::submit('Simpan', ['class' => 'btn btn-green']) !!}
                                    </div>
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
