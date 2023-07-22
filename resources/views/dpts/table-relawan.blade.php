<table id="pendukung" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>KTP</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>No. HP</th>
            <th>Relawan ID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataRelawanDpt as $item)
        @foreach($item->dpts as $dataDpt)
        <tr>
            <td><img src="{{$dataDpt->getFirstMediaUrl()}}"width="80px"></td>
            <td>{{ $dataDpt->nama }}</td>
            <td>{{ $dataDpt->nik }}</td>
            <td>{{ $dataDpt->kontak }}</td>
            <td>{{ $dataDpt->relawan->users->name }}</td>
            <td  style="width: 120px">
                {!! Form::open(['route' => ['dpts.destroy', $dataDpt->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('dpts.show', [$dataDpt->id]) }}"class='btn btn-outline-success'><span class="fa fa-eye"></span></a>
                    @hasanyrole('relawan-free|relawan-premium')
                    <a href="{{ route('dpts.edit', [$dataDpt->id]) }}"class='btn btn-outline-warning'><span class="fa fa-pencil"></span> </a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endhasanyrole
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        @foreach($item->descendants as $data)
            @foreach($data->dpts as $dpt)
            <tr>
                <td><img src="{{$dpt->getFirstMediaUrl()}}"width="80px"></td>
                <td>{{ $dpt->nama }}</td>
                <td>{{ $dpt->nik }}</td>
                <td>{{ $dpt->kontak }}</td>
                <td>{{ $dpt->relawan->users->name }}</td>
                <td  style="width: 120px">
                    {{-- {!! Form::open(['route' => ['dpts.destroy', $dpt->id], 'method' => 'delete']) !!} --}}
                    <div class='btn-group'>
                        <a href="{{ route('dpts.show', [$dpt->id]) }}"
                        class='btn btn-outline-success'><span class="fa fa-eye"></span>
                        </a>
                        {{-- @hasanyrole('relawan-free|relawan-premium')
                        <a href="{{ route('dpts.edit', [$dpt->id]) }}"
                        class='btn btn-outline-warning'><span class="fa fa-pencil"></span>
                        </a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endhasanyrole
                    </div>
                    {!! Form::close() !!} --}}
                </td>
            </tr>
            @endforeach
        @endforeach
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>KTP</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>No. HP</th>
            <th>Relawan ID</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
