<!-- Nomor Urut Field -->
<div class="section-field mb-20">
    {!! Form::label('nomor_urut', 'Nomor Urut:') !!}
    {!! Form::number('nomor_urut', null, ['class' => 'form-control']) !!}
</div>
<div class="section-field mb-20">
    {!! Form::label('target_pendukung', 'Target Pendukung:') !!}
    {!! Form::number('target_pendukung', null, ['class' => 'form-control']) !!}
</div>
{{ Form::hidden('users_id', Auth::id()) }}

</div>
@livewire('selectwilayahkandidat')

