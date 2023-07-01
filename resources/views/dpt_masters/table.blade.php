<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped default" id="dpt-masters-table">
            <thead>
            <tr>
                <th>Nik</th>
                <th>Nama</th>
                <th>Tps</th>
                <th>Id Wilayah</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dptMasters as $dptMaster)
                <tr>
                    <td>{{ $dptMaster->nik }}</td>
                    <td>{{ $dptMaster->nama }}</td>
                    <td>{{ $dptMaster->tps }}</td>
                    <td>{{ $dptMaster->id_wilayah }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['dpt-masters.destroy', $dptMaster->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('dpt-masters.show', [$dptMaster->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('dpt-masters.edit', [$dptMaster->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $dptMasters])
        </div>
    </div>
</div>
