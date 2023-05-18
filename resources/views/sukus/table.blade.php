@can('list-suku')
<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="sukus-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sukus as $suku)
                <tr>
                    <td>{{ $suku->nama }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['sukus.destroy', $suku->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('sukus.show', [$suku->id]) }}"
                               class='btn btn-success btn-xs'>
                                <i class="far fa-eye"></i>Lihat
                            </a> --}}
                            @can('edit-suku')
                                
                            <a href="{{ route('sukus.edit', [$suku->id]) }}"
                               class='btn btn-outline-warning btn-xs'><span class="fa fa-pencil"></span>
                            </a>
                            @endcan
                            @can('delete-suku'){!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}@endcan
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
            @include('adminlte-templates::common.paginate', ['records' => $sukus])
        </div>
    </div>
</div>
@endcan
