<!-- Nomor Urut Field -->
<div class="section-field mb-20"">
    {!! Form::label('nomor_urut', 'Nomor Urut:') !!}
    {!! Form::number('nomor_urut', null, ['class' => 'form-control']) !!}
</div>
{{ Form::hidden('users_id', Auth::id()) }}
{{-- <!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user', 'User:') !!}
    {!! Form::select('users_id',$users ,null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Jenis Kandidat Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('jenis_kandidat_id', 'Jenis Kandidat:') !!}
    {!! Form::select('jenis_kandidat_id',$jenis_kandidats ,null, ['class' => 'form-control']) !!}
</div> --}}
@livewire('selectwilayahkandidat')

