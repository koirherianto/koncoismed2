<table id="pendukung" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>No. HP</th>
            <th>Relawan ID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dpts as $dpt)
        <tr>
            <td>{{ $dpt->nama }}</td>
            <td>{{ $dpt->nik }}</td>
            <td>{{ $dpt->kontak }}</td>
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
    <tfoot>
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>No. HP</th>
            <th>Relawan ID</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
