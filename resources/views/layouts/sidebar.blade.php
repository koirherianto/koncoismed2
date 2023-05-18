<div class="main-menu menu-fixed menu-light menu-bordered menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content ps-container ps-theme-light ps-active-y" data-ps-id="92f72c7f-278b-693b-c1a6-f3f03809223b" style="height: 543.906px;">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header mb-1 pl-0 bg-white">
                <span data-i18n="nav.category.support">
                    <div class="col-xl-12">
                        <div class="mr-0">
                            <div class="card-body p-0 text-center">
                                @if(empty(Auth::user()->foto))
                                    <img src="{{ asset('image/avatar.png') }}" alt="avatar" class="rounded-circle height-70"><i></i>
                                @else
                                    <img src="{{ asset(Auth::user()->foto) }}" alt="avatar" class="rounded-circle height-70" ><i></i>
                                @endif
                                <div class="user-name">{!! Auth::user()->name !!}</div>
                                <h3 class="font-small-2 grey darken-3 text-lowercase text-bold-300">
                                    {!! Auth::user()->email !!}<br>
                                </h3>
                            </div>
                        </div>
                    </div>
                </span>
            </li>
            @include('layouts.menu')
        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -1614.33px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 1617.33px; height: 544px; right: 3px;">
            <div class="ps-scrollbar-y" tabindex="0" style="top: 251px; height: 84px;"></div>
        </div>
    </div>
</div>
