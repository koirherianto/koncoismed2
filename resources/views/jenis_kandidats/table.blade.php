<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="jenis-kandidats-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Lembaga</th>
                <th>Tingkat</th>
                <th colspan="3">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jenisKandidats as $jenisKandidat)
                <tr>
                    <td>{{ $jenisKandidat->nama }}</td>
                    <td>{{ $jenisKandidat->lembaga }}</td>
                    <td>{{ $jenisKandidat->tingkat }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['jenisKandidats.destroy', $jenisKandidat->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('jenisKandidats.show', [$jenisKandidat->id]) }}"
                               class='btn btn-success btn-xs'>
                                <i class="far fa-eye"></i>Lihat
                            </a> --}}
                            <a href="{{ route('jenisKandidats.edit', [$jenisKandidat->id]) }}"
                               class='btn btn-outline-warning btn-xs'><span class="fa fa-pencil"></span>
                            </a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $jenisKandidats])
        </div>
    </div>
</div>
