<div>
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('jenis_kandidat_id', 'Jenis Kandidat:') !!}
            {!! Form::select('jenis_kandidat_id', $jeniskandidats, null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 p-2','wire:model'=>'selectedJenis']) !!}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="id_wilayah">Provinsi</label>
            <select wire:model="selectedProvinsi" class="form-control border-light-green border-darken-4 border-left-6 p-2" name="id_wilayah">
                <option value="" selected>Pilih Provinsi</option>
                    @foreach($provinsis as $provinsi)
                <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                    @endforeach
            </select>
        </div>
    </div>

    @if ($selectedJenis == 7|| $selectedJenis == 8||$selectedJenis == 9)
        @if (!is_null($selectedProvinsi))
    <div class="col-12">
        <div class="form-group">
            <label for="id_wilayah">Kab/Kota</label>
            <select class="form-control border-light-green border-darken-4 border-left-6 p-2" wire:model="selectedKabkota" name="id_wilayah">
                <option value="" selected>Pilih Kab/Kota</option>
                @foreach($kabkotas as $kabkota)
                    <option value="{{ $kabkota->id }}">{{ $kabkota->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
    @endif
</div>

