<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="relawans-table">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Atasan</th>
                <th>NIK</th>
                <th>KTA</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($relawans as $relawan)
                <tr>
                    <td><img src="{{$relawan->getFirstMediaUrl()}}"width="80px"></td>
                    <td>{{ $relawan->users->name }}</td>
                    <td>{{ isset($relawan->relawanParent)?$relawan->relawanParent->users->name:"" }}</td>
                    {{-- <td> --}}
                        {{-- {{$relawan->descendants}} untuk mengambil turunan di bawahnya--}}
                        {{-- <ul>
                            @foreach($relawan->descendants as $item)
                            <li>{{$item->users->name}}</li>
                            @endforeach
                        </ul> --}}
                        
                    {{-- </td> --}}
                    <td>{{ $relawan->users->contact }}</td>
                    <td>{{ $relawan->no_kta}}</td>
                    {{-- <td>{{ $relawan->id_wilayah}}</td> --}}
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
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $relawans])
        </div>
    </div>
</div>
