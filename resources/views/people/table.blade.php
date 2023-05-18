<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="people-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                {{-- <th>Email</th> --}}
                {{-- <th>Kontak</th> --}}
                <th>Jenis Kelamin</th>
                {{--<th>Alamat</th>
                <th>Agama Id</th>
                <th>Suku Id</th>
                <th>Jabatan</th> --}}
                @hasanyrole('admin-kandidat-free|admin-kandidat-premium|super-admin')
                <th colspan="3">Action</th>
                @endhasanyrole
            </tr>
            </thead>
            <tbody>
            @foreach($people as $person)
                <tr>
                    <td>{{ $person->nama }}</td>
                    <td>{{ $person->nik }}</td>
                    <td>{{ $person->tempat_lahir }}</td>
                    <td>{{ $person->tanggal_lahir }}</td>
                    {{-- <td>{{ $person->email }}</td> --}}
                    {{-- <td>{{ $person->kontak }}</td> --}}
                    <td>{{ $person->jenis_kelamin }}</td>
                    {{--<td>{{ $person->alamat }}</td>
                    <td>{{ $person->agama->nama }}</td>
                    <td>{{ $person->suku->nama}}</td>
                    <td>{{ $person->jabatan }}</td> --}}
                    @hasanyrole('admin-kandidat-free|admin-kandidat-premium|super-admin')
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['people.destroy', $person->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('people.show', [$person->id]) }}"
                               class='btn btn-outline-success btn-xs'><span class="fa fa-eye"></span>
                            </a>
                           @hasanyrole('admin-kandidat-free|admin-kandidat-premium')
                            <a href="{{ route('people.edit', [$person->id]) }}"
                               class='btn btn-outline-warning btn-xs'><span class="fa fa-pencil"></span>
                            </a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endhasanyrole
                        </div>
                        {!! Form::close() !!}
                    </td>
                    @endhasanyrole
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $people])
        </div>
    </div>
</div>
