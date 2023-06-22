<div class="col-12">
    <!-- Nomor urut Field -->
    <div class="form-group">
        {!! Form::label('nomor_urut', 'Nomor Urut:') !!}
        {!! Form::number('nomor_urut', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
</div>
<div class="col-12">
    <!--  Field -->
    <div class="form-group">
        {!! Form::label('target_pendukung', 'Target Pendukung:') !!}
        {!! Form::number('target_pendukung', null, ['class' => 'form-control border-light-green border-darken-4 border-left-6']) !!}
    </div>
</div>


{{ Form::hidden('users_id', Auth::id()) }}

</div>
@livewire('selectwilayahkandidat')

