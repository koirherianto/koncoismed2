<div>
    <div class="col-13">
        <!-- Status Field -->
            <div class="form-group">
            {!! Form::label('status', 'Status',['class'=>' text-uppercase']) !!}
            {!! Form::select('status', ['' => 'Pilih Status Relawan','kab/kota' => 'Kab/Kota', 'kecamatan' => 'Kecamatan','kel/desa' => 'Kel/Desa'], null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','wire:model'=>'selectedStatus']) !!}
            </div>
        </div>
    <div class="form-group row">
        <label for="provinsi">Provinsi</label>
        <div class="col-13">
            <select wire:model="selectedProvinsi" class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2">
                <option value="" selected>Pilih Provinsi</option>
                @foreach($provinsis as $provinsi)
                    <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>

@if ($selectedStatus == 'kab/kota'|| $selectedStatus == 'kecamatan'||$selectedStatus == 'kel/desa')
    @if (!is_null($selectedProvinsi))
        <div class="form-group row">
            <label for="id_wilayah">Kab/Kota</label>
  
            <div class="col-13">
                <select class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2"wire:model="selectedKabkota" name="id_wilayah">
                    <option value="" selected>Pilih Kab/Kota</option>
                    @foreach($kabkotas as $kabkota)
                        <option value="{{ $kabkota->id }}">{{ $kabkota->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    @endif

    @if (!is_null($selectedKabkota))
    @if ($selectedStatus == 'kecamatan'||$selectedStatus == 'kel/desa')
        <div class="form-group row">
            <label for="id_wilayah">Kecamatan</label>
            <div class="col-13">
                <select class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2" wire:model="selectedKecamatan" name="id_wilayah">
                    <option value="" selected>Pilih Kecamatan</option>
                    @foreach($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    @endif
    
    @if (!is_null($selectedKecamatan))
    @if ($selectedStatus == 'kel/desa')
        <div class="form-group row">
            <label for="id_wilayah">Kel/Desa</label>
            <div class="col-13">
                <select class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2" wire:model="selectedDesa" name="id_wilayah">
                    <option value="" selected>Pilih Kel/Desa</option>
                    @foreach($desas as $desa)
                        <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    @endif 
</div>