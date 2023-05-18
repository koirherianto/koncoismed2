<div class="modal fade text-left" id="detailUser{{ $items->id }}" tabindex="-1" role="dialog" aria-labelledby="detailUser{{ $items->id }}"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue bg-darken-1">
                <label class="modal-title font-medium-1 text-text-bold-700 white" id="myModalLabel33">Detail User</label>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x"></i></span>
                </button>
            </div>
            <div class="card-body">
                <div class="font-medium-1 text-bold-800 black"><u>DETAIL AKUN</u></div>
                <div class="card-body">

                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Nama Lengkap</label>
                    <div class="col-md-9">
                        : <span>{{ $items['users']->name }}</span>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Username</label>
                    <div class="col-md-9">
                        : <span>{{ $items['users']->username }}</span>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Email</label>
                    <div class="col-md-9">
                        : <span>{{ $items['users']->email }}</span>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">No Telephone</label>
                    <div class="col-md-9">
                        : <span>{{ $items['users']->no_hp }}</span>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Alamat</label>
                    <div class="col-md-9">
                        : <span>{{ $items['users']->alamat }}</span>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Bergabung</label>
                    <div class="col-md-9">
                        : <span>{{ \Jenssegers\Date\Date::parse($items['users']->created_at)->format('d F Y') }}</span>
                    </div>
                </div>
                </div>
                    <div class="font-medium-1 text-bold-800 black"><u>DETAIL UNIT PELAKSANA</u></div>
                    <div class="card-body">
                        <div class="row mb-0">
                            <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Unit Tipe</label>
                            <div class="col-md-9">
                                : <span class="text-uppercase">{{ $items['unitType']['name'] }} </span>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Unit</label>
                            <div class="col-md-9">
                                : <span class="text-uppercase">{{ $items->nama }}</span>
                                <div class="card-body pt-0 pb-0">
                                    <div class="mb-0">
                                        -- <span class="text-uppercase"><span class="black text-bold-600">Alamat : </span> {{ $items->alamat }}</span><br>
                                        -- <span class="text-uppercase"><span class="black text-bold-600">No Telp : </span>{{ $items->no_telp }}</span><br>
                                        -- <span class="text-uppercase"><span class="black text-bold-600">Tujuan Umum : </span>{{ $items->tujuan_umum }}</span><br>
                                        -- <span class="text-uppercase"><span class="black text-bold-600">Tujuan Khusus : </span>{{ $items->tujuan_khusus }}</span><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!empty($items['instansi']))
                            <div class="row mb-1">
                                <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Instansi Pengampu</label>
                                <div class="col-md-9">
                                    : <span class="text-uppercase">{{ $items['instansi']['nama'] }}</span>
                                    <div class="card-body pt-0 pb-0">
                                        <div class="mb-0">
                                            -- <span class="text-uppercase"><span class="black text-bold-600">No Telp :</span> {{ $items['instansi']['no_telp'] }}</span><br>
                                            -- <span class="text-uppercase"><span class="black text-bold-600">No Hp :</span> {{ $items['instansi']['no_hp'] }}</span><br>
                                            -- <span class="text-uppercase"><span class="black text-bold-600">Pen. Jawab :</span> {{ $items['instansi']['penanggung_jawab'] }} - {{ $items['instansi']['jabatan'] }}</span><br>
                                            -- <span class="text-uppercase"><span class="black text-bold-600">Alamat :</span> {{ $items['instansi']['alamat'] }}</span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row mb-1">
                                <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Pengampu</label>
                                <div class="col-md-9">
                                    : <span class="text-uppercase">{{ $items['unit']['nama'] }}</span>
                                    <div class="card-body pt-0 pb-0">
                                        <div class="mb-0">
                                            -- <span class="text-uppercase"><span class="black text-bold-600">No Telp/Hp :</span> {{ $items['unit']['no_telp'] }}</span><br>
                                            -- <span class="text-uppercase"><span class="black text-bold-600">Alamat :</span> {{ $items['unit']['alamat'] }}</span><br>
                                            @foreach($items->ancestors as $item)
                                                @if(!empty($item['instansi']['nama']) || !empty($item['instansi']['penanggung_jawab']) || !empty($item['instansi']['jabatan']))
                                                    -- <span class="text-uppercase"><span class="black text-bold-600">Instansi :</span> {{ $item['instansi']->nama }}</span><br>
                                                    -- <span class="text-uppercase"><span class="black text-bold-600">Pen. Jawab :</span> {{ $item['instansi']->penanggung_jawab }} - {{ $item['instansi']->jabatan }}</span><br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
