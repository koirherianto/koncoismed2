<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="agamas-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($agamas as $agama)
                <tr>
                    <td>{{ $agama->nama }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['agamas.destroy', $agama->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('agamas.show', [$agama->id]) }}"
                               class='btn btn-success btn-xs'>
                                <i class="far fa-eye"></i>Lihat
                            </a> --}}
                            <a href="{{ route('agamas.edit', [$agama->id]) }}"
                               class='btn btn-outline-warning'><span class="fa fa-pencil"></span>
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
            @include('adminlte-templates::common.paginate', ['records' => $agamas])
        </div>
    </div>
</div>
