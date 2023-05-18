<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container ">
        {{-- //////////////////////////////// --}}


        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-colored-controls">Masukkan Kandidat</h4>
                        <a class="heading-elements-toggle"><i class="ft ft-user font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text">
                                <p>Masukan infromasi tentang kandidat yang anda ingin calonkan</p>
                            </div>
                            <div class="form-body">
                                {!! Form::open(['route' => 'kandidats.store']) !!}
                                <div class="row">
                                    <div class="col-md-10 my-2">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="nomor_urut">No Urut</label>
                                            <div class="col-md-9">
                                                {!! Form::number('nomor_urut', null, ['class' => 'form-control border-primary', 'placeholder' => 'Nomor Urut']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    {{ Form::hidden('users_id', Auth::id()) }}

                                </div>
                                <div class="row">
                                    <div class="col-md-10 my-2">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="jenis_kandidat_id">Jenis
                                                Kandidat</label>
                                            <div class="col-md-9">
                                                {!! Form::select('jenis_kandidat_id', $jenis_kandidats, null, [
                                                    'class' => 'form-control border-primary',
                                                    'placeholder' => 'Jenis Kandidat',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10 my-2">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="lembaga">Lembaga</label>
                                            <div class="col-md-9">
                                                {!! Form::select('lembaga', ['eksekutif' => 'Eksekutif', 'legislatif' => 'Legislatif'], null, [
                                                    'class' => 'form-control',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10 my-2">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="wilayah_id">Wilayah</label>
                                            <div class="col-md-9">
                                                {!! Form::select('wilayah_id', $wilayahs, null, [
                                                    'class' => 'form-control border-primary',
                                                    'placeholder' => 'Wilayah',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{-- ////////////////////////////////////////// --}}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
</body>

</html>
