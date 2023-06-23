    <!-- Nama Field -->
<div class="row">
    <div class="col-md-3">
        {!! Form::label('nama', 'Nama:') !!}
        <p class="font-weight-bold">{{ $dpt->nama }}</p>
    </div>
    <!-- Nik Field -->
    <div class="col-md-3">
        {!! Form::label('nik', 'NIK:') !!}
        <p class="font-weight-bold">{{ $dpt->nik }}</p>
    </div>
    <!-- Tempat Lahir Field -->
    <div class="col-md-3">
        {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
        <p class="font-weight-bold">{{ $dpt->tempat_lahir }}</p>
    </div>
    <!-- Tanggal Lahir Field -->
    <div class="col-sm-3">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        <p class="font-weight-bold">{{ $dpt->tanggal_lahir }} - </p>
    </div>
</div>
<div class="row">
      <!-- Jenis Kelamin Field -->
      <div class="col-md-3">
        {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
        <p class="font-weight-bold">{{ $dpt->jenis_kelamin }}</p>
    </div>
     <!-- Agama Id Field -->
     <div class="col-md-3">
        {!! Form::label('agama_id', 'Agama:') !!}
        <p class="font-weight-bold">{{ $dpt->agama->nama}}</p>
    </div>
     <!-- Suku Field -->
     <div class="col-md-3">
        {!! Form::label('suku', 'Suku:') !!}
        <p class="font-weight-bold">{{ $dpt->suku->nama}}</p>
    </div>
     <!-- Kontak Field -->
     <div class="col-md-3">
        {!! Form::label('kontak', 'Kontak:') !!}
        <p class="font-weight-bold">{{ $dpt->kontak }}</p>
    </div> 
</div>
<div class="row">
       <!-- Email Field -->
       <div class="col-md-3">
        {!! Form::label('email', 'Email:') !!}
        <p class="font-weight-bold">{{ $dpt->email }}</p>
    </div>
    <!-- Tps Field -->
    <div class="col-md-3">
        {!! Form::label('tps', 'Tps:') !!}
        <p class="font-weight-bold">{{ $dpt->tps }}</p>
    </div>
    <!-- Rt Field -->
    <div class="col-md-3">
        {!! Form::label('rt', 'Rt:') !!}
        <p class="font-weight-bold">{{ $dpt->rt }}</p>
    </div>
    <!-- Rw Field -->
    <div class="col-md-3">
        {!! Form::label('rw', 'Rw:') !!}
        <p class="font-weight-bold">{{ $dpt->rw }}</p>
    </div>
</div>
<div class="row">
    <!-- Wilayah Id Field -->
    <div class="col-md-3">
        {!! Form::label('id_wilayah', 'Desa:') !!}
        <p class="font-weight-bold">{{ $dpt->relawan->desa->nama }}</p>
    </div>
    <!-- Wilayah Id Field -->
    <div class="col-md-3">
        {!! Form::label('id_wilayah', 'Kecamatan:') !!}
        <p class="font-weight-bold">{{ $dpt->relawan->desa->kecamatan->nama }}</p>
    </div>

    <!-- Relawan Id Field -->
    <div class="col-md-3">
        {!! Form::label('relawan_id', 'Relawan:') !!}
        <p class="font-weight-bold">{{ $dpt->relawan->users->name }}</p>
    </div>
    <!-- Alamat Field -->
    <div class="col-md-3">
        {!! Form::label('alamat', 'Alamat:') !!}
        <p class="font-weight-bold">{{ $dpt->alamat }}</p>
    </div>
</div>



