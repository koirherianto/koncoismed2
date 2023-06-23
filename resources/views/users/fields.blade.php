
<div class="card rounded-2 box-shadow-1 mb-5">
    <div class="card-content">
        <div class="card-body">
            <div class="font-medium-2 text-bold-800 black mb-2"><i class="fa fa-pencil-square pr-1 green"></i> DATA AKUN</div>
            {{--<select name="unit_id" id="unit_id">--}}
            {{--    <option value="">null</option>--}}
            {{--</select>--}}
            <div class="row">
                <div class="col-6">
                    <!-- Name Field -->
                    <div class="form-group">
                        {!! Form::label('name', 'Nama Lengkap',['class'=>' text-uppercase']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                    </div>
                </div>
                <div class="col-6">
                    <!-- No HP Field -->
                    <div class="form-group">
                        {!! Form::label('contact', 'No HP Aktif',['class'=>' text-uppercase']) !!}
                        {!! Form::text('contact', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-6">
                        <!-- Email Field -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email',['class'=>' text-uppercase']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Alamat Field -->
                        <div class="form-group">
                            {!! Form::label('alamat', 'Alamat',['class'=>' text-uppercase']) !!}
                            {!! Form::text('alamat', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card box-shadow-0-1 mt-1">
                        <div id="heading1" class="card-header rounded-2 border-left-6 border-left-green box-shadow-0-1 cursor-pointer" role="tab" data-toggle="collapse" data-parent="#accordionWrapa1" href="#steap1">
                            <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#steap1" aria-expanded="false" aria-controls="accordion1" class="font-medium-2 text-bold-800 black text-uppercase">
                                <i class="fa fa-lock green mr-1"></i> Kata Sandi Akun
                            </a>
                        </div>
                        <div id="steap1" role="tabpanel" aria-labelledby="heading1" class="collapse show">
                            <div class="card-content">
                                <div class="card-body rounded-0-5 p-3">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            {!! Form::label('password', 'Password',['class'=>' text-uppercase']) !!}
                                            <div class="position-relative has-icon-right">
                                                {!! Form::password('password', ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                                                <div class="form-control-position">
                                                    <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            {!! Form::label('password_confirmation', 'Konfirmasi Password',['class'=>' text-uppercase']) !!}
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


        {{--<!-- Email Verified At Field -->--}}
        {{--<div class="form-group">--}}
        {{--    {!! Form::label('email_verified_at', 'Email Verified At:') !!}--}}
        {{--    <div class="position-relative">--}}
        {{--        {!! Form::date('email_verified_at', null, ['class' => 'form-control']) !!}--}}
        {{--    </div>--}}
        {{--</div>--}}

        {{--<!-- Remember Token Field -->--}}
        {{--<div class="form-group">--}}
        {{--    {!! Form::label('remember_token', 'Remember Token:') !!}--}}
        {{--    <div class="position-relative">--}}
        {{--        {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}--}}
        {{--    </div>--}}
        {{--</div>--}}
        <!---->

            <div class="card bg-grey bg-lighten-4 rounded-2">
                <div class="d-flex pt-1 pb-1">
                    {!! Form::label('s_role_id', 'Hak Akses Diberikan',['class' => 'col-md-3 label-control text-uppercase mb-0']) !!}
                    <div class="skin skin-flat">
                        @foreach($sRoles as $item)
                            <fieldset>
                                {!! Form::radio('s_role_id[]', $item->id, in_array($item->id, $roles)?true:false,['id'=>'input-'.$item->id]) !!}
                                <label for="input-{{$item->id}}" class="ml-1 text-bold-700 black text-uppercase">{!! $item->name !!} - {!! $item->desc !!}</label>
                            </fieldset>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer fixed-bottom footer-light navbar-border navbar-shadow">
    <div class="form-group row mb-0">
        <div class="col-lg-6 align-self-center">
        </div>
        <div class="col-lg-6 text-right">
            <a href="{!! route('users.index') !!}" class="btn btn-danger rounded-2"> <i class="fa fa-close"></i> Batal</a>
            {!! Form::submit('Simpan', ['class' => 'btn btn-green rounded-2 btn-glow mr-1']) !!}
        </div>
    </div>
</footer>

