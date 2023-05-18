<ul class="nav nav-tabs nav-topline no-hover-bg nav-justified">
    <li class="nav-item">
        <a class="nav-link text-bold-700 active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
           aria-expanded="true" >Akun Dikelola</a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-bold-700" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
           aria-expanded="false">Semua Akun Pelaksana</a>
    </li>
</ul>

<div class="tab-content px-1 pt-1">
    <div class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
        <div class="table-responsive">
            <!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
            <table class="table table-responsive table-hover table-bordered table-striped default">
                <thead>
                <tr>
                    <th><code>#</code></th>
                    <th>Nama/Username</th>
                    <th>Akses</th>
                    <th>Kontak</th>
                    <th>Pengelola</th>
                    <th>Unit Tipe</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($myUser as $items)
                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>
                            <span class="text-bold-800 black">{!! $items['users']->name !!}</span><br>
                            {!! $items['users']->username !!}
                        </td>
                        <td>
                            @foreach($items['users']->roles as $item)
                                <span class="badge badge-primary" style="margin: 2px" title="{{ $item->desc }}">{!! $item->name !!}</span>
                            @endforeach
                        </td>
                        <td>
                            {!! $items['users']->no_hp !!}<br>
                            {!! $items['users']->email !!}
                        </td>
                        <td class="font-small-3">
                            @if($items['instansi'] != null)
                                <span class="black text-bold-600">>>Instansi</span><br>
                                <a href="#">{!! $items['instansi']->nama !!}</a><br>
                            @endif
                            <span class="black text-bold-600">>>Unit</span><br>
                            <a href="#" class="pink">{!! $items->nama !!}</a>
                        </td>
                        <td>
                            <span class="badge badge-danger text-uppercase" title="Unit Tipe">{!! $items['unitType']['name'] !!}</span>
                        </td>
                        <td>
                            @include('users.modal.detail_user')
                            {!! Form::open(['route' => ['users.destroy', $items['users']->id], 'method' => 'delete']) !!}
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{--                    <a href="{!! route('users.show', [$users->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>--}}
                                <a data-target="#detailUser{{ $items->id }}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm btn-success"><i class="icon-eye"></i></a>
    {{--                            @if(Auth::user()->hasRole('ROOT'))--}}
    {{--                                @if($items->unit_id == null)--}}
    {{--                                    <a href="{!! route('users.edit', [$items['users']->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>--}}
    {{--                                @endif--}}
    {{--                            @else--}}
    {{--                            @endif--}}
                                <a href="{!! route('users.edit', [$items['users']->id]) !!}" class="btn btn-sm btn-warning"><i class="icon-pencil"></i></a>
                                {!! Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
        <!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
        <table class="table table-responsive table-hover table-bordered table-striped default  table-responsive">
            <thead>
            <tr>
                <th><code>#</code></th>
                <th>Nama/Username</th>
                <th>Akses</th>
                <th>Kontak</th>
                <th>Pen. Jawab</th>
                <th>Unit Tipe</th>
                <th style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($users as $items)
                @foreach($items->roles as $item)
                    @if($item->name != 'ADM' && $item->name != 'ROOT')
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
    {{--                            @if($items['unit'] != null)--}}
    {{--                                <span class="black text-bold-600">>> Pengampu</span><br>--}}
    {{--                                <a href="#" class="pink">{!! $items['unit']['instansi']->nama !!}</a>--}}
    {{--                            @endif--}}

                                @if($items['unit'] != null)
                                    <span class="black text-bold-600">>> Pengampu</span><br>
                                    @if(!empty($items['unit']['instansi']))
                                        <a href="#" class="pink">{!! $items['unit']['instansi']->nama !!}</a>
                                    @else
                                        <a href="#" class="pink">
                                            @foreach($items['unit']['unit']['parent'] as $item)
                                                {{ $item['unit']->nama }}
                                            @endforeach
                                        </a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($items->unit_id != null)
                                    {{--                    {!! $users['unit']->nama !!}<br>--}}
                                    <span class="badge badge-danger text-uppercase" title="Unit Tipe">{!! $items['unit']['unitType']['name'] !!}</span>
                                @endif
                            </td>
                            <td>
    {{--                            @include('users.modal.detail')--}}
                                {!! Form::open(['route' => ['users.destroy', $items->id], 'method' => 'delete']) !!}
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{--                    <a href="{!! route('users.show', [$users->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>--}}
                                    <a data-target="#detailUser{{ $items->id }}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
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
</div>
