<ol class="breadcrumb">
    <li class="breadcrumb-item"><span class="white darken-2 bg-green rounded-1 p-0-1 pl-1 pr-1 font-small-2">Beranda</span>
    </li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= '/'.$segment; ?>
        <li class="breadcrumb-item active">
            <span class="white darken-2 bg-green rounded-1 p-0-1 pl-1 pr-1 font-small-2">{{$segment}}</span>
        </li>
    @endforeach
    @if(empty($sub))
    @else
        <li class="breadcrumb-item">
            <span class="white darken-2 bg-green rounded-1 p-0-1 pl-1 pr-1 font-small-2">
                {{ $sub }}
            </span>
        </li>
    @endif
</ol>
