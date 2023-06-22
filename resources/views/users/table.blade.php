<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<div class="table-responsive">
    <table class="table table-responsive table-hover table-bordered default">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-7">
        </colgroup>
        <thead>
        <tr>
            <th><code>#</code></th>
            <th>Nama</th>
            <th>Akses</th>
            <th>No HP & Email</th>
            <th style="text-align: center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($users as $items)
            <tr>
                <td>{!! $no++ !!}</td>
                <td>
                    <span class="text-bold-800 black">{!! $items->name !!}</span><br>
                    {!! $items->username !!}
                </td>
                <td>
                    @if(!empty($items->roles))
                        @foreach($items->roles as $item)
                            <span class="badge badge-warning" style="margin: 2px" title="{{ $item->desc }}">{!! $item->name !!}</span>
                        @endforeach
                    @endif
                </td>
                <td>
                    {!! $items->contact !!}<br>
                    {!! $items->email !!}
                </td>
                <td>
{{--                    @include('users.modal.detail_user')--}}
                    {!! Form::open(['route' => ['users.destroy', $items->id], 'method' => 'delete']) !!}
                    <div class="btn-group" role="group" aria-label="Basic example">
    {{--                    <a href="{!! route('users.show', [$items->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>--}}
                        <a data-target="#detailUser{{ $items->id }}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm btn-outline-success"><i class="fa fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$items->id]) !!}" class="btn btn-sm btn-outline-warning"><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-outline-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
