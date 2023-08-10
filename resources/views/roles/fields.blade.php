<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <div class="position-relative">
        {!! Form::text('guard_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', 'Desc:') !!}
    <div class="position-relative">
        {!! Form::text('desc', null, ['class' => 'form-control']) !!}
    </div>
</div>
//
<div class="form-group row">
    {!! Form::label('s_permission_id', 'Permission',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        <div class="row skin skin-flat">
            @foreach($sPermissions as $item)
                <div class="col-md-6">
                    <fieldset>
                        {!! Form::checkbox('permission_id[]', $item->id, in_array($item->id, $permissions)?true:false,['id'=>'input-'.$item->id]) !!}
                        <label for="input-{{$item->id}}">{!! $item->name !!}</label>
                    </fieldset>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('roles.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

