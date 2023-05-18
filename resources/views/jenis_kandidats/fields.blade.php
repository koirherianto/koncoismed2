<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>
<!-- Tingkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tingkat', 'Tingkat:') !!}
    {!! Form::select('tingkat', ['pusat'=>'Pusat','provinsi'=>'Provinsi','kab/kota'=>'Kab/Kota'],null, ['class' => 'form-control']) !!}
</div>
<!-- Lembaga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lembaga', 'Lembaga:') !!}
    {!! Form::select('lembaga', ['eksekutif'=>'Eksekutif','legislatif'=>'Legislatif'],null, ['class' => 'form-control']) !!}
</div>