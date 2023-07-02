<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="dpt-masters-table">
            <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>TPS</th>
                <th>Wilayah</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dptMasters as $dptMaster)
                <tr>
                    <td>{{ $dptMaster->nik }}</td>
                    <td>{{ $dptMaster->nama }}</td>
                    <td>{{ $dptMaster->tps }}</td>
                    {{-- <td>{{ $dptMaster->id_wilayah }}</td> --}}
                    <td>{{ isset($dptMaster->id_wilayah)?$dptMaster->id_wilayah:"" }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['dpt-masters.destroy', $dptMaster->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('dpt-masters.show', [$dptMaster->id]) }}"
                                class='btn btn-outline-success'><span class="fa fa-eye"></span>
                            </a> --}}
                            <a href="{{ route('dpt-masters.edit', [$dptMaster->id]) }}"
                                class='btn btn-outline-warning'><span class="fa fa-pencil"></span>
                            </a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
