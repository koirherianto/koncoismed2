<!-- Nama Field -->
<div class="row">
    <div class="col-sm-4">
        {!! Form::label('nama', 'Nama:') !!}
        <p>{{ $person->nama }}</p>
    </div>
    <!-- Jenis Kandidat ID Field -->
    <div class="col-sm-4">
        {!! Form::label('kandidat_id', 'Jenis Kandidat:') !!}
        <p>{{ $person->kandidat->jenisKandidat->nama }}</p>
    </div>
    <!-- NIK Field -->
    <div class="col-sm-4">
        {!! Form::label('nik', 'NIK:') !!}
        <p>{{ $person->nik }}</p>
    </div>
</div>
<!-- jenis_kelamin Field -->
<div class="row">
    <div class="col-sm-4">
        {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
        <p>{{ $person->jenis_kelamin }}</p>
    </div>
    <!-- Tempat Lahir Field -->
    <div class="col-sm-4">
        {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
        <p>{{ $person->tempat_lahir }}</p>
    </div>
    <!-- Tanggal Lahir Field -->
    <div class="col-sm-4">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        <p>{{ $person->tanggal_lahir }}</p>
    </div>
</div>
<!-- agama Field -->
<div class="row">
    <div class="col-sm-4">
        {!! Form::label('agama', 'Agama:') !!}
        <p>{{ $person->agama->nama }}</p>
    </div>
    <!-- Suku Field -->
    <div class="col-sm-4">
        {!! Form::label('suku', 'Suku:') !!}
        <p>{{ $person->suku->nama }}</p>
    </div>
    <!-- Alamat Field -->
    <div class="col-sm-4">
        {!! Form::label('alamat', 'Alamat:') !!}
        <p>{{ $person->alamat }}</p>
    </div>
</div>
<!-- email Field -->
<div class="row">
    <div class="col-sm-4">
        {!! Form::label('email', 'Email:') !!}
        <p>{{ $person->email}}</p>
    </div>
    <!-- kontak Field -->
    <div class="col-sm-4">
        {!! Form::label('kontak', 'Kontak:') !!}
        <p>{{ $person->kontak}}</p>
    </div>
    <!--  Field -->
    <div class="col-sm-4">
        {{-- {!! Form::label('alamat', 'Alamat:') !!}
        <p>{{ $person->alamat }}</p> --}}
    </div>
</div>