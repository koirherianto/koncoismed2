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
                        <!-- No KTA Field -->
                        <div class="form-group">
                            {!! Form::label('no_kta', 'No KTA',['class'=>' text-uppercase']) !!}
                            {!! Form::text('no_kta', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- NIK Field -->
                        <div class="form-group">
                            {!! Form::label('nik', 'NIK',['class'=>' text-uppercase']) !!}
                            {!! Form::text('nik', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Jenis Kelamin Field -->
                        <div class="form-group">
                            {!! Form::label('jenis_kelamin', 'Jenis Kelamin',['class'=>' text-uppercase']) !!}
                            {!! Form::select('jenis_kelamin', [''=>'Pilih','Laki-laki'=>'Laki-Laki','Perempuan'=>'Perempuan'],null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- Tempat Lahir Field -->
                        <div class="form-group">
                            {!! Form::label('tempat_lahir', 'Tempat Lahir',['class'=>' text-uppercase']) !!}
                            {!! Form::text('tempat_lahir', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Tanggal Lahir Field -->
                        <div class="form-group">
                            {!! Form::label('tanggal_lahir', 'Tanggal Lahir',['class'=>' text-uppercase']) !!}
                            {!! Form::date('tanggal_lahir', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','id'=>'tanggal_lahir']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-13">
                    <!-- Status Perkawinan Field -->
                    <div class="form-group">
                        {!! Form::label('status_perkawinan', 'Status Perkawinan',['class'=>' text-uppercase']) !!}
                        {!! Form::select('status_perkawinan', [''=>'Pilih', 'Pernah'=>'Pernah','Sudah'=>'Sudah', 'Belum'=>'Belum'],null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                    </div>
                </div>
            @push('page_scripts')
            <script type="text/javascript">
                $('#tanggal_lahir').datepicker()
            </script>
            @endpush
                @livewire('select')
                <div class="col-14">
                <!-- Alamat Field -->
                    <div class="form-group">
                    {!! Form::label('alamat', 'Alamat',['class'=>' text-uppercase']) !!}
                    {!! Form::text('alamat', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                    </div>
                    {{-- <div class="form-group">
                        {!! Form::label('relawan', 'Foto Profil :') !!}
                        <div class="position-relative">
                            @if(!isset($relawan))
                                <x-media-library-attachment  multiple name="relawan" rules="mimes:png,jpeg"/>
                            @else
                                <x-media-library-collection :model="$relawan"  name="relawan" rules="mimes:png,jpeg"/>
                            @endif
                        </div>
                    </div> --}}
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
                                                    <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password" id="togglePassword"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            {!! Form::label('password_confirmation', 'Konfirmasi Password',['class'=>' text-uppercase']) !!}
                                            <div class="position-relative has-icon-right">
                                                {!! Form::password('password_confirmation', ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                                                <div class="form-control-position">
                                                    <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password_confirmation" id="togglePasswordCo"></i>
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
<script>
const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<script>
    const togglePasswordCo = document.querySelector('#togglePasswordCo');
      const password_confirmation = document.querySelector('#password_confirmation');
    
      togglePasswordCo.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password_confirmation.getAttribute('type') === 'password_confirmation' ? 'text' : 'password_confirmation';
        password_confirmation.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>

{!! Form::hidden('users_id',auth()->id(), ['class' => 'form-control']) !!}

@hasanyrole('admin-kandidat-free|admin-kandidat-premium')
{!! Form::hidden('relawan_id',!empty(auth()->user()->relawan)?auth()->user()->relawan->id : null, ['class' => 'form-control']) !!}
@endhasanyrole

@hasanyrole('relawan-free|relawan-premium')
{!! Form::hidden('relawan_id',auth()->user()->relawan->id, ['class' => 'form-control']) !!}
@endhasanyrole

@hasanyrole('admin-kandidat-free|admin-kandidat-premium')
{!! Form::hidden('kandidat_id',auth()->user()->kandidat->id, ['class' => 'form-control']) !!}
@endhasanyrole

@hasanyrole('relawan-free|relawan-premium')
{!! Form::hidden('kandidat_id',auth()->user()->relawan->kandidat->id, ['class' => 'form-control']) !!}
@endhasanyrole

    <!-- Wilayah Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('wilayah', 'Wilayah:') !!}
    {!! Form::select('wilayah_id',$wilayahs ,null, ['class' => 'form-control']) !!}
</div> --}}