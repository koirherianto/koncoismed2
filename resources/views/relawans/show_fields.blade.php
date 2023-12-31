<div class="row">
    <div class="col-xl-3 col-md-6 col-6">
        <div class="card">
            <div class="text-center">
                <div class="card-body">
                    @if(empty($relawan->users->foto))
                    <img src="{{ asset('image/avatar.png') }}" alt="avatar" class="rounded-circle  height-150" alt="Card image"><i></i>
                    @else
                        <img src="{{ asset($relawan->users->foto) }}" alt="avatar" class="rounded-circle  height-150" alt="Card image" ><i></i>
                    @endif
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $relawan->users->name }}</h4>
                    @if($relawan->status == 'kel/desa')
                        <h6 class="card-subtitle text-muted">{{ isset($relawan->desa->nama)?$relawan->desa->nama:""}}</h6>
                    @elseif($relawan->status == 'kecamatan')
                        <h6 class="card-subtitle text-muted">{{ isset($relawan->desa->kecamatan->nama)?$relawan->desa->kecamatan->nama:""}}</h6>
                    @elseif($relawan->status == 'kab/kota')
                        <h6 class="card-subtitle text-muted">{{ isset($relawan->desa->kecamatan->kabkota->nama)?$relawan->desa->kecamatan->kabkota->nama:""}}</h6>
                    @else
                        <h6 class="card-subtitle text-muted">{{""}}</h6>
                    @endif
                </div>
                <div class="text-center">
                    <a href="https://wa.me/{{ $relawan->users->contact }}" class="btn btn-social-icon mr-1 mb-1 btn-outline-green"><span class=" fa fa-phone"></span></a>
                    <a href="mailto:{{ $relawan->users->email }}" class="btn btn-social-icon mr-1 mb-1 btn-outline-red"><span class="fa fa-envelope font-medium-4"></span></a>
                    <a href="https://www.google.com/maps/@ {{ $relawan->desa->latitude }},{{ $relawan->desa->longitude }},15z" class="btn btn-social-icon mb-1 btn-outline-blue"><span class="fa fa-map-marker"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-md-6 col-6">
        <div class="row">
                <!-- Nama Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('nama', 'Nama:') !!}
                <p class="font-weight-bold">{{ $relawan->users->name }}</p>
            </div>
            <!-- Relawan ID Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('relawan_id', 'Atasan:') !!}
                <p class="font-weight-bold">{{ isset($relawan->relawanParent)?$relawan->relawanParent->users->name:"" }}</p>
            </div>
            <!-- Status Relawan Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('status', 'Status Relawan:') !!}
                <p class="font-weight-bold">{{ $relawan->status }}</p>
            </div>

            <!-- Desa Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('id_wilayah', 'Desa:') !!}
                <p class="font-weight-bold">{{ isset($relawan->desa->nama)?$relawan->desa->nama:""}}</p>
            </div>
        </div>
        <div class="row">
            <!-- Kecamatan Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('id_wilayah', 'Kecamatan:') !!}
                <p class="font-weight-bold">{{ isset($relawan->desa->kecamatan->nama)?$relawan->desa->kecamatan->nama:""}}</p>
            </div>
            <!-- kabkota Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('id_wilayah', 'kabkota:') !!}
                <p class="font-weight-bold">{{ isset($relawan->desa->kecamatan->kabkota->nama)?$relawan->desa->kecamatan->kabkota->nama:""}}</p>
            </div>
            <!-- No KTA Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('no_kta', 'No KTA:') !!}
                <p class="font-weight-bold">{{ $relawan->no_kta }}</p>
            </div>
            <!-- NIK Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('nik', 'NIK:') !!}
                <p class="font-weight-bold">{{ $relawan->nik }}</p>
            </div>
        </div>
        <div class="row">
            <!-- Jenis Kelamin Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
                <p class="font-weight-bold">{{ $relawan->jenis_kelamin}}</p>
            </div>
            <!-- Tempat Lahir Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
                <p class="font-weight-bold">{{ $relawan->tempat_lahir}}</p>
            </div>
            <!-- Tanggal Lahir Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
                <p class="font-weight-bold">{{ $relawan->tanggal_lahir}}</p>
            </div>
            <!-- Status Perkawinan Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('status_perkawinan', 'Status Perkawinan:') !!}
                <p class="font-weight-bold">{{ $relawan->status_perkawinan}}</p>
            </div>
        </div>
        <div class="row">
            <!-- Kontak Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('contact', 'Kontak:') !!}
                <p class="font-weight-bold">{{ $relawan->users->contact}}</p>
            </div>
            <!-- Alamat Field -->
            <div class="col-xl-3 col-md-6 col-6">
                {!! Form::label('alamat', 'Alamat:') !!}
                <p class="font-weight-bold">{{ $relawan->users->alamat}}</p>
            </div>
        </div>
    </div>
    </div>
</div>