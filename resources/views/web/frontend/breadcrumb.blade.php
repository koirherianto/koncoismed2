<ol class="breadcrumb gray-bg mb-4">
    <li class="breadcrumb-item"><span class="white darken-2 bg-green rounded-1 p-0-1 pl-1 pr-1 font-medium-1">Beranda</span>
    </li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= '/'.$segment; ?>
        <li class="breadcrumb-item active">
            <span class="white darken-2 bg-green rounded-1 p-0-1 pl-1 pr-1 font-medium-1">{{$segment}}</span>
        </li>
    @endforeach
    @if(empty($sub))
    @else
        <li class="breadcrumb-item">
            <span class="white darken-2 bg-green rounded-1 p-0-1 pl-1 pr-1 font-medium-1">
                {{ $sub }}
            </span>
        </li>
    @endif
</ol>
