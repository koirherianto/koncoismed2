<table id="example" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Atasan</th>
            <th>NIK</th>
            <th>KTA</th>
            <th>Status</th>
            <th>Wilayah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($relawans as $relawan)
        <tr>
            <td>
                <div class="media">
                    <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle">
                        @if(empty($relawan->users->foto))
                            <img src="{{ asset('image/avatar.png') }}" alt="avatar"><i></i>
                        @else
                            <img src="{{ asset($relawan->users->foto) }}" alt="avatar"><i></i>
                        @endif
                    </span>
                    </div>
                    <div class="media-body media-middle">
                        <a href="{{ route('relawans.show', [$relawan->id]) }}" class="text green darken-4">{{ $relawan->users->name }}</a>
                    </div>
                </div>
            </td>
            <td>{{ isset($relawan->relawanParent)?$relawan->relawanParent->users->name:"" }}</td>
            <td>{{ $relawan->users->contact }}</td>
            <td>{{ $relawan->no_kta}}</td>
            <td>{{ isset($relawan->status)?$relawan->status:"" }}</td>
            <td>{{ isset($relawan->desa->nama)?$relawan->desa->nama:"" }}</td>
            <td  style="width: 120px">
                {{-- {!! Form::open(['route' => ['relawans.destroy', $relawan->id], 'method' => 'delete']) !!} --}}
                <div class='btn-group'>
                    <a href="{{ route('relawans.show', [$relawan->id]) }}"
                       class='btn btn-outline-success'>
                        <i class="fa fa-eye"></i>
                    </a>
                    {{-- <a href="{{ route('relawans.edit', [$relawan->id]) }}"
                       class='btn btn-success btn-xs'><span class="bi bi-pen-fill"></span>
                    </a> --}}
                    {{-- {!! Form::button('<i class="bi bi-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Nama</th>
            <th>Atasan</th>
            <th>NIK</th>
            <th>KTA</th>
            <th>Status</th>
            <th>Wilayah</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>