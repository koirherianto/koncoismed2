@can('list-partai')
<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="partais-table">
            <thead class="table-light">
            <tr class="table-light">
                <th width="20%">Logo</th>
                <th style data-field="id" scope="col">
                    <div class="th-inner">Nama</div>
                    <div class="fht-cell"></div>
                </th>
                <th style data-field="id" scope="col">
                    <div class="th-inner">Aksi</div>
                    <div class="fht-cell"></div>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($partais as $partai)
                <tr>
                    <td><img src="{{$partai->getFirstMediaUrl()}}"width="60px"></td>
                    <td>{{ $partai->nama }}</td>
                    <td  style="width: 60px">
                        {!! Form::open(['route' => ['partais.destroy', $partai->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('partais.show', [$partai->id]) }}"
                               class='btn btn-success btn-xs'>
                                <i class="far fa-eye"></i> Lihat
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <span class="bi-search"></span> Search
                            </button> --}}
                            @can('edit-partai')   
                            <a href="{{ route('partais.edit', [$partai->id]) }}"
                               class='btn btn-outline-warning'><span class="fa fa-pencil"></span>
                            </a>
                            @endcan
                            @can('delete-partai'){!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} @endcan
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
            @include('adminlte-templates::common.paginate', ['records' => $partais])
        </div>
    </div>
</div>
@endcan
