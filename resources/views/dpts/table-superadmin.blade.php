<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="dpts-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Wilayah</th>
                <th>Relawan</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dpts as $dpt)
                <tr>
                    <td>{{ $dpt->nama }}</td>
                    <td>{{ $dpt->nik }}</td>
                    <td>{{ $dpt->id_wilayah }}</td>
                    <td>{{ $dpt->relawan->users->name }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['dpts.destroy', $dpt->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('dpts.show', [$dpt->id]) }}"
                               class='btn btn-outline-success'><span class="fa fa-eye"></span>
                            </a>
                            @role('relawan')
                            <a href="{{ route('dpts.edit', [$dpt->id]) }}"
                               class='btn btn-outline-warning'><span class="fa fa-pencil"></span>
                            </a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endrole
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
            @include('adminlte-templates::common.paginate', ['records' => $dpts])
        </div>
    </div>
</div>
