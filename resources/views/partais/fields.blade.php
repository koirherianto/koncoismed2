<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto :') !!}
    <div class="position-relative">
        @if(!isset($partai))
            <x-media-library-attachment  multiple name="partai" rules="mimes:png,jpeg"/>
        @else
            <x-media-library-collection :model="$partai"  name="partai" rules="mimes:png,jpeg"/>
        @endif
    </div>
</div>