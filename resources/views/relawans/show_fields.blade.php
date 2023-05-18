<!-- Nama Field -->
<div class="row">
    <div class="col-sm-4">
        {!! Form::label('nama', 'Nama:') !!}
        <p>{{ $relawan->users->name }}</p>
    </div>
    <!-- Relawan ID Field -->
    <div class="col-sm-4">
        {!! Form::label('relawan_id', 'Id Relawan:') !!}
        <p>{{ $relawan->id }}</p>
    </div>
    <!-- Status Relawan Field -->
    <div class="col-sm-4">
        {!! Form::label('status', 'Status Relawan:') !!}
        <p>{{ $relawan->status }}</p>
    </div>
</div>
<div class="row">
    <!-- Wilayah Field -->
    <div class="col-sm-4">
        {!! Form::label('id_wilayah', 'Desa:') !!}
        <p>{{ isset($relawan->desa->nama)?$relawan->desa->nama:""}}</p>
    </div>
    <div class="col-sm-4">
        {!! Form::label('id_wilayah', 'Kecamatan:') !!}
        <p>{{ isset($relawan->desa->kecamatan->nama)?$relawan->desa->kecamatan->nama:""}}</p>
    </div>

    <!-- No kta Field -->
    <div class="col-sm-4">
        {!! Form::label('no_kta', 'No KTA:') !!}
        <p>{{ $relawan->no_kta }}</p>
    </div>

   
</div>
<div class="row">
     <!-- NIK Field -->
     <div class="col-sm-4">
        {!! Form::label('nik', 'NIK:') !!}
        <p>{{ $relawan->nik }}</p>
    </div>
    <!-- Jenis Kelamin Field -->
    <div class="col-sm-4">
        {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
        <p>{{ $relawan->jenis_kelamin}}</p>
    </div>
    <!-- Tempat Lahir Field -->
    <div class="col-sm-4">
        {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
        <p>{{ $relawan->tempat_lahir}}</p>
    </div>
</div>
<div class="row">
    <!-- Tanggal Lahir Field -->
    <div class="col-sm-4">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        <p>{{ $relawan->tanggal_lahir}}</p>
    </div>
    <!-- Status Perkawinan Field -->
    <div class="col-sm-4">
        {!! Form::label('status_perkawinan', 'Status Perkawinan:') !!}
        <p>{{ $relawan->status_perkawinan}}</p>
    </div>

    <!-- Kontak Field -->
    <div class="col-sm-4">
        {!! Form::label('contact', 'Kontak:') !!}
        <p>{{ $relawan->users->contact}}</p>
    </div>

    <!-- Alamat Field -->
    <div class="col-sm-4">
        {!! Form::label('alamat', 'Alamat:') !!}
        <p>{{ $relawan->users->alamat}}</p>
    </div>
</div>