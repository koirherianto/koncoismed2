<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="horz-layout-colored-controls">Masukkan Kandidat</h4>
                <a class="heading-elements-toggle"><i class="ft ft-user font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-text">
                        <p>Informasi kandidat</p>
                    </div>
                    <form class="form form-horizontal">
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft ft-user"></i> Kandidat</h4>
                            {!! Form::open(['route' => 'kandidats.store']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="nomor_urut">No Urut</label>
                                        <div class="col-md-9">
                                            {!! Form::number('nomor_urut', null, ['class' => 'form-control border-primary','placeholder' =>"Nomor Urut"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="users_id">Admin Kandidat</label>
                                        <div class="col-md-9">
                                            {!! Form::select('users_id',$users ,null, ['class' => 'form-control border-primary','placeholder' =>"Admin Kandidat"]) !!}
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="jenis_kandidat_id">Jenis Kandidat</label>
                                        <div class="col-md-9">
                                            {!! Form::select('jenis_kandidat_id',$jenis_kandidats ,null, ['class' => 'form-control border-primary', 'placeholder'=>"Jenis Kandidat"]) !!}
                                        </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="wilayah_id">Wilayah</label>
                                        <div class="col-md-9">
                                            {!! Form::select('wilayah_id',$wilayahs ,null, ['class' => 'form-control border-primary','placeholder'=>"Wilayah"]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::open(['route' => 'people.store']) !!}
                            <h4 class="form-section"><i class="ft-clipboard"></i> Informasi calon legislatif 1</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="nama">Nama</label>
                                        <div class="col-md-9">
                                            {!! Form::text('nama', null, ['class' => 'form-control border-primary','placeholder'=>"Nama"]) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="nik">NIK</label>
                                        <div class="col-md-9">
                                            {!! Form::text('nik', null, ['class' => 'form-control border-primary','placeholder'=>"NIK"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Tempat Lahir</label>
                                        <div class="col-md-9">
                                            {!! Form::text('tempat_lahir', null, ['class' => 'form-control border-primary','placeholder'=>"Tempat Lahir"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Tanggal Lahir</label>
                                        <div class="col-md-9">
                                             {!! Form::date('tanggal_lahir', null, ['class' => 'form-control border-primary','id'=>'tanggal_lahir','placeholder'=>"Tanggal Lahir"]) !!}
                                        </div>
                                    </div>
                                    @push('page_scripts')
                                        <script type="text/javascript">
                                            $('#tanggal_lahir').datepicker()
                                        </script>
                                    @endpush
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="jenis_kelamin">Jenis Kelamin</label>
                                        <div class="col-md-9">
                                            {!! Form::select('jenis_kelamin', ['pria'=>'Pria','wanita'=>'Wanita'],null, ['class' => 'form-control border-primary','placeholder'=>"Jenis Kelamin"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="agama_id">Agama</label>
                                        <div class="col-md-9">
                                             {!! Form::select('agama_id',$agamas ,null, ['class' => 'form-control border-primary','placeholder'=>"Agama"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="suku_id">Suku</label>
                                        <div class="col-md-9">
                                            {!! Form::select('suku_id',$sukus ,null, ['class' => 'form-control border-primary','placeholder'=>"Suku"]) !!}
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="email">Email</label>
                                        <div class="col-md-9">
                                             {!! Form::email('email', null, ['class' => 'form-control border-primary','placeholder'=>"Email"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="kontak">No HP</label>
                                        <div class="col-md-9">
                                            {!! Form::text('kontak', null, ['class' => 'form-control border-primary','placeholder'=>"No HP"]) !!}
                                        </div>
                                    </div><div class="form-group row">
                                        <label class="col-md-3 label-control" for="jabatan">Jabatan</label>
                                        <div class="col-md-9">
                                            {!! Form::text('jabatan', null, ['class' => 'form-control border-primary','placeholder'=>"Jabatan"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="kandidat_id">Kandidat ID</label>
                                        <div class="col-md-9">
                                            {!! Form::text('kandidat_id', null, ['class' => 'form-control border-primary','placeholder'=>"Kandidat ID"]) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="alamat">Alamat</label>
                                        <div class="col-md-9">
                                            {!! Form::textarea('alamat', null, ['class' => 'form-control border-primary', 'rows'=>"6",'placeholder'=>"Alamat"]) !!}
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            {!! Form::open(['route' => 'people.store']) !!}
                            <h4 class="form-section"><i class="ft-clipboard"></i> Informasi calon legislatif 2</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="nama">Nama</label>
                                        <div class="col-md-9">
                                            {!! Form::text('nama', null, ['class' => 'form-control border-primary border-primary','placeholder'=>"Nama"]) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="nik">NIK</label>
                                        <div class="col-md-9">
                                            {!! Form::text('nik', null, ['class' => 'form-control border-primary','placeholder'=>"NIK"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Tempat Lahir</label>
                                        <div class="col-md-9">
                                            {!! Form::text('tempat_lahir', null, ['class' => 'form-control border-primary','placeholder'=>"Tempat Lahir"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Tanggal Lahir</label>
                                        <div class="col-md-9">
                                             {!! Form::date('tanggal_lahir', null, ['class' => 'form-control border-primary','id'=>'tanggal_lahir','placeholder'=>"Tanggal Lahir"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="jenis_kelamin">Jenis Kelamin</label>
                                        <div class="col-md-9">
                                            {!! Form::select('jenis_kelamin', ['pria'=>'Pria','wanita'=>'Wanita'],null, ['class' => 'form-control border-primary','placeholder'=>"Jenis Kelamin"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="agama_id">Agama</label>
                                        <div class="col-md-9">
                                             {!! Form::select('agama_id',$agamas ,null, ['class' => 'form-control border-primary','placeholder'=>"Agama"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="suku_id">Suku</label>
                                        <div class="col-md-9">
                                            {!! Form::select('suku_id',$sukus ,null, ['class' => 'form-control border-primary','placeholder'=>"Suku"]) !!}
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="email">Email</label>
                                        <div class="col-md-9">
                                             {!! Form::email('email', null, ['class' => 'form-control border-primary','placeholder'=>"Email"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="kontak">No HP</label>
                                        <div class="col-md-9">
                                            {!! Form::text('kontak', null, ['class' => 'form-control border-primary','placeholder'=>"No HP"]) !!}
                                        </div>
                                    </div><div class="form-group row">
                                        <label class="col-md-3 label-control" for="jabatan">Jabatan</label>
                                        <div class="col-md-9">
                                            {!! Form::text('jabatan', null, ['class' => 'form-control border-primary','placeholder'=>"Jabatan"]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="kandidat_id">Kandidat ID</label>
                                        <div class="col-md-9">
                                            {!! Form::text('kandidat_id', null, ['class' => 'form-control border-primary','placeholder'=>"Kandidat ID"]) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="alamat">Alamat</label>
                                        <div class="col-md-9">
                                            {!! Form::textarea('alamat', null, ['class' => 'form-control border-primary', 'rows'=>"6",'placeholder'=>"Alamat"]) !!}
                                        </div>
                                    </div> 
                                </div>
                            </div>

                        </div>
                        <div class="form-actions right">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </form>
                    {!! Form::close() !!}
                    {!! Form::close() !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
