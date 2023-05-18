<!-- Password Field -->
<div class="form-group col-md-12">
    {!! Form::label('password', 'Password :') !!}
    {!! Form::password('password', ['placeholder'=>'Password lama anda','class' => 'form-control']) !!}
</div>

<div class="form-group col-md-12">
    {!! Form::label('password_new', 'Password Baru :') !!}
    {!! Form::password('password_new', ['placeholder'=>'Minimal 8 karakter','class' => 'form-control']) !!}
</div>

<div class="form-group col-md-12">
    {!! Form::label('password_new_confirmation', 'Password Baru Ulangi :') !!}
    {!! Form::password('password_new_confirmation', ['placeholder'=>'Minimal 8 karakter','class' => 'form-control']) !!}
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    {!! Form::submit('Ubah Password', ['class' => 'btn btn-success mr-1']) !!}
    <a href="{!! route('home') !!}" class="btn btn-warning"> <i class="icon-cross2"></i> Batal</a>
</div>
