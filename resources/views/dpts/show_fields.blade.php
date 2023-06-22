    <!-- Nama Field -->
<div class="row">
    <div class="col-sm-4">
        {!! Form::label('nama', 'Nama:') !!}
        <p>{{ $dpt->nama }}</p>
    </div>
    <!-- Nik Field -->
    <div class="col-sm-4">
        {!! Form::label('nik', 'Nik:') !!}
        <p>{{ $dpt->nik }}</p>
    </div>
    <!-- Tempat Lahir Field -->
    <div class="col-sm-4">
        {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
        <p>{{ $dpt->tempat_lahir }}</p>
    </div>
</div>
<div class="row">
    <!-- Tanggal Lahir Field -->
    <div class="col-sm-4">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        <p>{{ $dpt->tanggal_lahir }} - </p>
    </div>

    <!-- Email Field -->
    <div class="col-sm-4">
        {!! Form::label('email', 'Email:') !!}
        <p>{{ $dpt->email }}</p>
    </div>

    <!-- Kontak Field -->
    <div class="col-sm-4">
        {!! Form::label('kontak', 'Kontak:') !!}
        <p>{{ $dpt->kontak }}</p>
    </div>
</div>
<div class="row">
    <!-- Jenis Kelamin Field -->
    <div class="col-sm-4">
        {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
        <p>{{ $dpt->jenis_kelamin }}</p>
    </div>

    <!-- Agama Id Field -->
    <div class="col-sm-4">
        {!! Form::label('agama_id', 'Agama Id:') !!}
        <p>{{ $dpt->agama->nama}}</p>
    </div>

    <!-- Suku Field -->
    <div class="col-sm-4">
        {!! Form::label('suku', 'Suku:') !!}
        <p>{{ $dpt->suku->nama}}</p>
    </div>
</div>
<div class="row">
    <!-- Tps Field -->
    <div class="col-sm-4">
        {!! Form::label('tps', 'Tps:') !!}
        <p>{{ $dpt->tps }}</p>
    </div>

    <!-- Rt Field -->
    <div class="col-sm-4">
        {!! Form::label('rt', 'Rt:') !!}
        <p>{{ $dpt->rt }}</p>
    </div>

    <!-- Rw Field -->
    <div class="col-sm-4">
        {!! Form::label('rw', 'Rw:') !!}
        <p>{{ $dpt->rw }}</p>
    </div>
</div>
<div class="row">
    <!-- Wilayah Id Field -->
    <div class="col-sm-4">
        {!! Form::label('id_wilayah', 'Wilayah:') !!}
        <p>{{ $dpt->relawan->desa->nama }}</p>
    </div>

    <!-- Relawan Id Field -->
    <div class="col-sm-4">
        {!! Form::label('relawan_id', 'Relawan:') !!}
        <p>{{ $dpt->relawan->users->name }}</p>
    </div>
    <!-- Alamat Field -->
    <div class="col-sm-4">
        {!! Form::label('alamat', 'Alamat:') !!}
        <p>{{ $dpt->alamat }}</p>
    </div>
</div>


{{-- <!-- Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $dpt->keterangan }}</p>
</div> --}}



