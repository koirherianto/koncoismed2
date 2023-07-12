<div class="card rounded-2 box-shadow-1 mb-5">
    <div class="card-content">
        <div class="card-body">
            <div class="font-medium-2 text-bold-800 black mb-2"><i class="fa fa-pencil-square pr-1 green"></i> DATA AKUN</div>
                <div class="row">
                    <div class="col-6">
                        <!-- No KTA Field -->
                        <div class="form-group">
                            {!! Form::label('no_kta', 'No KTA',['class'=>' text-uppercase']) !!}
                            {!! Form::text('no_kta', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- NIK Field -->
                        <div class="form-group">
                            {!! Form::label('nik', 'NIK',['class'=>' text-uppercase']) !!}
                            {!! Form::text('nik', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- Jenis Kelamin Field -->
                        <div class="form-group">
                            {!! Form::label('jenis_kelamin', 'Jenis Kelamin',['class'=>' text-uppercase']) !!}
                            {!! Form::select('jenis_kelamin', [''=>'Pilih','Laki-laki'=>'Laki-Laki','Perempuan'=>'Perempuan'],null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Status Perkawinan Field -->
                        <div class="form-group">
                            {!! Form::label('status_perkawinan', 'Status Perkawinan',['class'=>' text-uppercase']) !!}
                            {!! Form::select('status_perkawinan', [''=>'Pilih', 'Pernah'=>'Pernah','Sudah'=>'Sudah', 'Belum'=>'Belum'],null, ['class' => 'form-control border-light-green border-darken-4 border-left-6 text-bold-600 black font-medium-2']) !!}
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
            @push('page_scripts')
            <script type="text/javascript">
                $('#tanggal_lahir').datepicker()
            </script>
            @endpush
            @livewire('select')

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
