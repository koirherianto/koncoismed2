<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-responsive table-hover table-bordered default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Name</th>
        <th>Guard Name</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($permissions as $permission)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $permission->name !!}</td>
            <td>{!! $permission->guard_name !!}</td>
            <td>
                {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('permissions.show', [$permission->id]) !!}" class="btn btn-sm btn-outline-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('permissions.edit', [$permission->id]) !!}" class="btn btn-sm btn-outline-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-outline-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
