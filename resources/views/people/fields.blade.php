<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('nama', 'Nama:') !!}
        {!! Form::text('nama', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
    <!-- Nik Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nik', 'NIK:') !!}
        {!! Form::text('nik', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
</div>
<div class="row">
    <!-- Tempat Lahir Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
    <!-- Tanggal Lahir Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6', 'id' => 'tanggal_lahir']) !!}
    </div>

    @push('page_scripts')
        <script type="text/javascript">
            $('#tanggal_lahir').datepicker()
        </script>
    @endpush
</div>
<div class="row">
    <!-- Jenis Kelamin Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
        {!! Form::select('jenis_kelamin', ['pria' => 'Pria', 'wanita' => 'Wanita'], null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
    <!-- Agama Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('agama_id', 'Agama:') !!}
        {!! Form::select('agama_id', $agamas, null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
</div>
<div class="row">
    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>

    <!-- Kontak Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('kontak', 'Kontak:') !!}
        {!! Form::text('kontak', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
</div>
<div class="row">
    <!-- Suku Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('suku_id', 'Suku:') !!}
        {!! Form::select('suku_id', $sukus, null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
    <!-- Jabatan Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('jabatan', 'Jabatan:') !!}
        {!! Form::text('jabatan', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
</div>
<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
</div>

{{ Form::hidden('kandidat_id',  Auth::user()->kandidat->id) }}
