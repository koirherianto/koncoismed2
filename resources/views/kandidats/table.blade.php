<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="kandidats-table">
            <thead>
            <tr>
                <th>Nomor Urut</th>
                <th>Admin Kandidat</th>
                <th>Jenis Kandidat</th>
                {{-- <th>Wilayah</th> --}}
                @hasanyrole('admin-kandidat-free|admin-kandidat-premium')
                <th colspan="3">Action</th>
                @endhasanyrole
            </tr>
            </thead>
            <tbody>
            @foreach($kandidats as $kandidat)
                <tr>
                    <td>{{ $kandidat->nomor_urut }}</td>
                    <td>{{ $kandidat->users->name}}</td>
                    <td>{{ $kandidat->jenisKandidat->nama}}</td>
                    {{-- <td>{{ $kandidat->id_wilayah}}</td> --}}
                    {{-- nama var, nama func model,nama field yg ingin ditampilkan --}}

                    @hasanyrole('admin-kandidat-free|admin-kandidat-premium')
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['kandidats.destroy', $kandidat->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('kandidats.show', [$kandidat->id]) }}"
                               class='btn btn-success btn-xs'>
                                <i class="far fa-eye"></i>Lihat
                            </a> --}}
                            <a href="{{ route('kandidats.edit', [$kandidat->id]) }}"
                               class='btn btn-outline-warning'><span class="fa fa-pencil"></span>
                            </a>
                            @hasanyrole('admin-kandidat-free|admin-kandidat-premium')
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
            @include('adminlte-templates::common.paginate', ['records' => $kandidats])
        </div>
    </div>
</div>
