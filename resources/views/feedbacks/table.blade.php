<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="kandidats-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Judul</th>
                <th>Feedback</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->users->name}}</td>
                    <td>{{ $feedback->judul_feedback}}</td>
                    <td>{{ $feedback->feedback}}</td>
                    {{-- nama var, nama func model,nama field yg ingin ditampilkan --}}
                    <td  style="width: 120px">
                        {{-- {!! Form::open(['route' => ['feedbacks.destroy', $feedback->id], 'method' => 'delete']) !!}
                        <div class='btn-group'> --}}
                            {{-- <a href="{{ route('kandidats.show', [$kandidat->id]) }}"
                               class='btn btn-success btn-xs'>
                                <i class="far fa-eye"></i>Lihat
                            </a> --}}
                            {{-- <a href="{{ route('kandidats.edit', [$kandidat->id]) }}"
                               class='btn btn-success'><span class="bi bi-pen-fill"></span>
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
            @include('adminlte-templates::common.paginate', ['records' => $feedbacks])
        </div>
    </div>
</div>
