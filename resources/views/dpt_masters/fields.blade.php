<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control', 'required', 'maxlength' => 45, 'maxlength' => 45]) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required', 'maxlength' => 225, 'maxlength' => 225]) !!}
</div>

<!-- Tps Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tps', 'Tps:') !!}
    {!! Form::text('tps', null, ['class' => 'form-control', 'required', 'maxlength' => 45, 'maxlength' => 45]) !!}
</div>

<!-- Id Wilayah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_wilayah', 'Id Wilayah:') !!}
    {!! Form::number('id_wilayah', null, ['class' => 'form-control', 'required']) !!}
</div>