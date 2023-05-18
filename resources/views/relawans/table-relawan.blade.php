<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="relawans-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Atasan</th>
                {{-- <th>Turunan</th> --}}
                <th>Kandidat Id</th>
                <th>Wilayah</th>
                {{-- <th colspan="3">Action</th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach($dataRelawanRelawan->descendants as $dataRelawan)
                <tr>
                    <td>{{ $dataRelawan->users->name }}</td>
                    <td>{{ isset($dataRelawan->relawanParent)?$dataRelawan->relawanParent->users->name:"" }}</td>
                    {{-- <td> --}}
                        {{-- {{$relawan->descendants}} untuk mengambil turunan di bawahnya--}}
                        {{-- <ul>
                            @foreach($relawan->descendants as $item)
                            <li>{{$item->users->name}}</li>
                            @endforeach
                        </ul> --}}
                        
                    {{-- </td> --}}
                    <td>{{ $dataRelawan->kandidat->id }}</td>
                    <td>{{ $dataRelawan->id_wilayah}}</td>
                    <td  style="width: 120px">  
                        {!! Form::open(['route' => ['relawans.destroy', $dataRelawan->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('relawans.show', [$relawan->id]) }}"
                               class='btn btn-success btn-xs'>
                                <i class="far fa-eye"></i>Lihat
                            </a> --}}
                            {{-- <a href="{{ route('relawans.edit', [$dataRelawan->id]) }}"
                               class='btn btn-outline-warning btn-xs'><span class="fa fa-pencil"></span>
                            </a> --}}
                            {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
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
            {{-- @include('adminlte-templates::common.paginate', ['records' => $relawans]) --}}
        </div>
    </div>
</div>
