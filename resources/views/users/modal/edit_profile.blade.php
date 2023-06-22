<div class="modal fade text-left" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="editProfil"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title font-medium-1 text-text-bold-700 black" id="myModalLabel33">Perubahan Data Akun</label>
                <button type="button" class="close danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x"></i></span>
                </button>
            </div>
            <div class="card-body">
                {!! Form::model($user, ['url' => 'updateProfile/'.$user->id, 'method' => 'patch','class'=>'form form-horizontal','files' => true]) !!}
                    <div class="form-body">
                        <div class="text-center mb-3">
{{--                            <img src="{{ asset('master/app-assets/images/gallery/user_profil.png') }}" class="img-fluid rounded width-120"><br>--}}

                            <div v-if="foto.length > 0">
                                <img id="logo_review" :src="foto" alt="your image" class="height-200 rounded"/>
                            </div>
                            <div v-else>
                                <img id="logo_review" src="{{asset($user->foto)}}" alt="your image" class="height-200 rounded"/>
                            </div>
                            <div class="mt-1">
                                <input id="foto" type="file" name="foto" accept="image/*" @change="previewFoto">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <!-- Name Field -->
                                <div class="form-group">
                                    {!! Form::label('name', 'Nama Lengkap',['class'=>' text-uppercase']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- No Hp Field -->
                                <div class="form-group">
                                    {!! Form::label('contact', 'No Hp/Telephone',['class'=>' text-uppercase']) !!}
                                    {!! Form::number('contact', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- Email Field -->
                                <div class="form-group">
                                    {!! Form::label('email', 'Email Aktif',['class'=>' text-uppercase']) !!}
                                    {!! Form::email('email', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- Alamat Field -->
                                <div class="form-group">
                                    {!! Form::label('alamat', 'Alamat Lengkap',['class'=>' text-uppercase']) !!}
                                    {!! Form::textarea('alamat', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','rows'=>'3','maxlength'=>'255']) !!}
                                </div>

                            </div>

                            @if(!empty(Auth::user()['unit']))
                                <div class="font-medium-2 text-bold-800 black mb-2 col-12 border-top-2 border-top-grey pt-1"><i class="fa fa-pencil-square green pr-1"></i>DATA UNIT</div>
                                <div class="col-md-6 mb-2">
                                    <!-- Nama Field -->
                                    <div class="form-group mb-1">
                                        {!! Form::label('nama', 'Nama Unit',['class'=>'text-uppercase']) !!}
                                        <input name="nama" id="nama" type="text" class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2 " value="{{ $user['unit']->nama }}">
                                    </div>

                                    <!-- Alamat Field -->
                                    <div class="form-group mb-1">
                                        {!! Form::label('alamat', 'Alamat Lengkap',['class'=>'text-uppercase']) !!}
                                        <textarea name="alamat" id="alamat" class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2" rows="3">{{ $user['unit']->alamat }}</textarea>
                                    </div>

                                    <!-- No Telp Field -->
                                    <div class="form-group mb-1">
                                        {!! Form::label('no_telp', 'No Telp/Hp',['class'=>'text-uppercase']) !!}
                                        <input name="no_telp" id="no_telp" type="number" class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2" value="{{ $user['unit']->no_telp }}">
                                    </div>

                                    <!-- Unit Type Id Field -->
                                    <div class="form-group mb-1">
                                        {!! Form::label('unit_type_id', 'Tipe Unit',['class'=>'text-uppercase']) !!}
                                        <select class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2" name="unit_type_id" id="unit_type_id">
                                            @foreach($unitType as $item)
                                                <option value="{{ $item->id }}"
                                                        @if($user['unit']->unit_type_id == $item->id)
                                                        selected
                                                    @endif
                                                >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Tujuan Umum Field -->
                                    <div class="form-group mb-1">
                                        {!! Form::label('tujuan_umum', 'Tujuan Umum',['class'=>'text-uppercase']) !!}
                                        <textarea class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2" name="tujuan_umum" id="tujuan_umum" rows="6">{{ $user['unit']->tujuan_umum }}</textarea>
                                    </div>
                                    <!-- Tujuan Khusus Field -->
                                    <div class="form-group mb-1">
                                        {!! Form::label('tujuan_khusus', 'Tujuan Khusus',['class'=>'text-uppercase']) !!}
                                        <textarea class="form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2" name="tujuan_khusus" id="tujuan_khusus" rows="6">{{ $user['unit']->tujuan_khusus }}</textarea>
                                    </div>
                                </div>
                            @endif

                            <div class="col-12">
                                <div class="card">
                                    <div id="heading1" class="card-header p-1 rounded-2 border-left-6 border-left-green box-shadow-0-1 cursor-pointer" role="tab" data-toggle="collapse" data-parent="#accordionWrapa1" href="#steap1">
                                        <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#steap1" aria-expanded="false" aria-controls="accordion1" class="font-small-3 text-bold-800 black text-uppercase">
                                            <i class="fa fa-gears green mr-1"></i> Pengaturan Kata Sandi
                                        </a>
                                    </div>
                                    <div id="steap1" role="tabpanel" aria-labelledby="heading1" class="collapse">
                                        <div class="card-content">
                                            <div class="card-body rounded-0-5">
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        {!! Form::label('current_password', 'Password Lama',['class'=>' text-uppercase']) !!}
                                                        <div class="position-relative has-icon-right">
                                                            {!! Form::password('current_password', ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                                                            <div class="form-control-position">
                                                                <i class="fa fa-eye font-medium-3 toggle-password" toggle="#current_password"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        {!! Form::label('password', 'Password Baru',['class'=>' text-uppercase']) !!}
                                                        <div class="position-relative has-icon-right">
                                                            {!! Form::password('password', ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                                                            <div class="form-control-position">
                                                                <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        {!! Form::label('password_confirmation', 'Konfirmasi Password Baru',['class'=>' text-uppercase']) !!}
                                                        <div class="position-relative has-icon-right">
                                                            {!! Form::password('password_confirmation', ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                                                            <div class="form-control-position">
                                                                <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password_confirmation"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="text-right">
                    {!! Form::submit('Simpan Perubahan', ['class' => 'btn btn-green rounded-2 btn-glow mr-1']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
