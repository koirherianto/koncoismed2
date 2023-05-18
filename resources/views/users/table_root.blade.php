<ul class="nav nav-tabs nav-topline no-hover-bg nav-justified">
    <li class="nav-item">
        <a class="nav-link text-bold-700 active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
           aria-expanded="true" >Akun Dikelola</a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-bold-700" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
           aria-expanded="false">Semua Akun</a>
    </li>
</ul>

<div class="tab-content px-1 pt-1">
    <div class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
        <table class="table table-responsive table-hover table-bordered table-striped default table-responsive">
            <thead>
            <tr>
                <th><code>#</code></th>
                <th>Nama/Username</th>
                <th>Akses</th>
                <th>Kontak</th>
                <th>Pengelola</th>
                <th style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($users as $items)
                @foreach($items->roles as $item)
                    @if($item->name == 'ROOT' || $item->name == 'ADM')
                        <tr>
                            <td>{!! $no++ !!}</td>
                            <td>
                                <span class="text-bold-800 black">{!! $items->name !!}</span><br>
                                {!! $items->username !!}
                            </td>
                            <td>
                                @foreach($items->roles as $item)
                                    <span class="badge badge-primary" style="margin: 2px" title="{{ $item->desc }}">{!! $item->name !!}</span>
                                @endforeach
                            </td>
                            <td>
                                {!! $items->no_hp !!}<br>
                                {!! $items->email !!}
                            </td>
                            <td class="font-small-3">
                                @if($items['instansi'] != null)
                                    <span class="black text-bold-600">>>Instansi</span><br>
                                    <a href="#">{!! $items['instansi']->nama !!}</a><br>
                                @endif
                                @if($items['unit'] != null)
                                    <span class="black text-bold-600">>>Unit Pelaksana</span><br>
                                    <a href="#" class="pink">{!! $items['unit']['instansi']->nama !!}</a>
                                @endif
                            </td>
                            <td>
                                @include('users.modal.detail')
                                {!! Form::open(['route' => ['users.destroy', $items->id], 'method' => 'delete']) !!}
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{--                    <a href="{!! route('users.show', [$users->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>--}}
                                    <a data-target="#detailUser{{ $items->id }}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    {{--                            @if(Auth::user()->hasRole('ROOT'))--}}
                                    {{--                                @if($items->unit_id == null)--}}
                                    {{--                                    <a href="{!! route('users.edit', [$items->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>--}}
                                    {{--                                @endif--}}
                                    {{--                            @else--}}
                                    <a href="{!! route('users.edit', [$items->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                    {{--                            @endif--}}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
        <div class="table-responsive">
            <table class="table table-responsive table-hover table-bordered table-striped default">
                <thead>
                <tr>
                    <th><code>#</code></th>
                    <th>Nama/Username</th>
                    <th>Akses</th>
                    <th>Kontak</th>
                    <th>Pengelola</th>
                    <th style="text-align: center">Action</th>
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
                            @foreach($items->roles as $item)
                                <span class="badge badge-primary" style="margin: 2px" title="{{ $item->desc }}">{!! $item->name !!}</span>
                            @endforeach
                        </td>
                        <td>
                            {!! $items->no_hp !!}<br>
                            {!! $items->email !!}
                        </td>
                        <td class="font-small-3">
                            @if($items['instansi'] != null)
                                <span class="black text-bold-600">>>Instansi</span><br>
                                <a href="#">{!! $items['instansi']->nama !!}</a><br>
                            @endif
                            @if($items['unit'] != null)
                                <span class="black text-bold-600">>>Unit Pelaksana</span><br>
                                <a href="#" class="pink">{!! $items['unit']['instansi']->nama !!}</a>
                            @endif
                        </td>
                        <td>
                            @include('users.modal.detail')
                            {!! Form::open(['route' => ['users.destroy', $items->id], 'method' => 'delete']) !!}
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{--                    <a href="{!! route('users.show', [$users->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>--}}
                                <a data-target="#detailUser{{ $items->id }}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                {{--                            @if(Auth::user()->hasRole('ROOT'))--}}
                                {{--                                @if($items->unit_id == null)--}}
                                {{--                                    <a href="{!! route('users.edit', [$items->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>--}}
                                {{--                                @endif--}}
                                {{--                            @else--}}
                                <a href="{!! route('users.edit', [$items->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                {{--                            @endif--}}
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

