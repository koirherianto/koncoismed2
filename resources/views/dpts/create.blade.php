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
                                    <span class="amber font-medium-5">Tambah Pendukung</span><br>
                                    <span style="margin-top: -5px">Membuat Data Baru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class="card-content collpase show border-left-green border-left-6 box-shadow-1 rounded">
                            <div class="card-body">
                                {!! Form::open(['route' => 'dpts.store']) !!}
                                <div class="form-body">
                                    @include('dpts.fields')
                                    <div class="form-actions center">
                                        <a href="{{ route('dpts.index') }}" class="btn btn-red">Batal</a>
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

@push('scripts')
<script>
    $('#suku').select2();
</script>
@endpush

