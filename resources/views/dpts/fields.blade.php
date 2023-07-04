<div class="row">
    <!-- Nama Field -->
    <div class="form-group col-md-3">
        {!! Form::label('nama', 'Nama Lengkap:') !!}
        {!! Form::text('nama', null, ['class' => 'form-control border-light-green border-darken-4 round round']) !!}
    </div>
    <!-- Nik Field -->
    <div class="form-group col-md-3">
        {!! Form::label('nik', 'NIK:') !!}
        {!! Form::text('nik', null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
    <!-- Tempat Lahir Field -->
    <div class="form-group col-md-3">
        {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
     <!-- Tanggal Lahir Field -->
     <div class="form-group col-sm-3">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control border-light-green border-darken-4 round','id'=>'tanggal_lahir']) !!}
    </div>
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_lahir').datepicker()
    </script>
@endpush

<div class="row">
     <!-- Jenis Kelamin Field -->
     <div class="form-group col-md-3">
        {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
        {!! Form::select('jenis_kelamin', [''=>'- Pilih - ','Laki-laki'=>'Laki-laki','Perempuan'=>'Perempuan'],null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
     <!-- Agama Id Field -->
     <div class="form-group col-sm-3">
        {!! Form::label('agama', 'Agama:') !!}
        {!! Form::select('agama_id',$agamas ,null, ['class' => 'form-control border-light-green border-darken-4 round','placeholder'=>'- Pilih - ']) !!}
    </div>
    <!-- Suku Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('suku_id', 'Suku:') !!}
        {!! Form::select('suku_id', $sukus, null, ['class' => 'form-control border-light-green border-darken-4 round','id'=>'suku','placeholder'=>'- Pilih - ']) !!}
    </div>
    <!-- Kontak Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('kontak', 'No Telepon:') !!}
        {!! Form::text('kontak', null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
</div>
<div class="row">
     <!-- Email Field -->
     <div class="form-group col-sm-3">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
    <!-- Tps Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('tps', 'TPS:') !!}
        {!! Form::number('tps', null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
    <!-- Rt Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('rt', 'RT:') !!}
        {!! Form::number('rt', null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
    <!-- Rw Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('rw', 'RW:') !!}
        {!! Form::number('rw', null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('dpt', 'Foto KTP :') !!}
        <div class="position-relative">
            @if(!isset($dpt))
                <x-media-library-attachment  multiple name="dpt" rules="mimes:png,jpeg"/>
            @else
                <x-media-library-collection :model="$dpt"  name="dpt" rules="mimes:png,jpeg"/>
            @endif
        </div>
    </div>
    <!-- Alamat Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('alamat', 'Alamat:') !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control border-light-green border-darken-4 round']) !!}
    </div>
</div>

{!! Form::hidden('id_wilayah',auth()->user()->relawan->id_wilayah, ['class' => 'form-control']) !!}
{!! Form::hidden('kandidat_id',auth()->user()->relawan->kandidat_id, ['class' => 'form-control']) !!}
{!! Form::hidden('relawan_id',auth()->user()->relawan->id, ['class' => 'form-control']) !!}