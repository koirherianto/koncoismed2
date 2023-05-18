<div>
    {{-- <label for="jenis_kandidat_id">Jenis Kandidat</label>
    <div class="section-field mb-20">
        <select class="form-control p-2" name="jenis_kandidat_id" wire:model="selectedJenis">
            <option value="" selected>Pilih Jenis Kandidat</option>
               @foreach($jeniskandidats as $jeniskandidat)
            <option value="{{ $jeniskandidat->id }}">{{ $jeniskandidat->nama }}</option>
               @endforeach
        </select>
    </div> --}}
    <div class="section-field mb-20">
        {!! Form::label('jenis_kandidat_id', 'Jenis Kandidat:') !!}
        {!! Form::select('jenis_kandidat_id', $jeniskandidats, null, ['class' => 'form-control p-2 rounded-pill','wire:model'=>'selectedJenis']) !!}
    </div>
<label for="id_wilayah">Provinsi</label>
    <div class="section-field mb-20">
        <select wire:model="selectedProvinsi" class="form-control p-2 rounded-pill" name="id_wilayah">
            <option value="" selected>Pilih Provinsi</option>
                @foreach($provinsis as $provinsi)
            <option value="{{ $provinsi->id }}">{{ $provinsi->provinsi }}</option>
                @endforeach
        </select>
    </div>

@if ($selectedJenis == 7|| $selectedJenis == 8||$selectedJenis == 9)
    @if (!is_null($selectedProvinsi))
            <label for="id_wilayah">Kab/Kota</label>
            <div class="section-field mb-20">
                <select class="form-control p-2 rounded-pill" wire:model="selectedKabkota" name="id_wilayah">
                    <option value="" selected>Pilih Kab/Kota</option>
                    @foreach($kabkotas as $kabkota)
                        <option value="{{ $kabkota->id }}">{{ $kabkota->kabkota }}</option>
                    @endforeach
                </select>
            </div>
    @endif
@endif
</div>

