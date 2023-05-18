<header id="header" class="header light">
    <div class="menu">
      <!-- menu start -->
       <nav id="menu" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items" style="height: 90px;">
            <div class="container">
             <div class="row">
              <div class="col-lg-12 col-md-12 position-relative">
               <!-- menu logo -->
               <ul class="menu-logo">
                <li>
                    <a href="/"><img id="logo_img" src="{{asset('image/britech.png')}}" alt="logo"> </a>
                   <div class="menu-mobile-collapse-trigger"><span></span></div></li>
               </ul>
               <!-- menu links -->
               <div class="menu-bar">
                <ul class="menu-links" style="display: none; max-height: 400px; overflow: auto;">
                   {{-- <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>HOME</b></a></li> --}}
                   <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Tentang</b></a></li>
                   <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Fitur</b></a></li>
                   <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Aplikasi</b></a></li>
                   <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Screenshots</b></a></li>
                   <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Kontak Kami</b></a></li>

                   {{--                <li  class="{{ request()->is('gistaru') ? 'active' : '' }}"><a href="{{ route('gistaru_map') }}"> Map </a></li>--}}
                   {{--                <li class="{{ request()->is('webnews') ? 'active' : '' }}"><a href="{{ route('webnews') }}">News </a></li>--}}
                   {{--                <li  class="{{ request()->is('webtutorials') ? 'active' : '' }}"><a href="{{ route('webtutorials') }}">Panduan </a></li>--}}
                   {{--                <li  class="{{ request()->is('ruledoc') ? 'active' : '' }}"><a href="{{ route('ruledoc') }}">Dokumen Aturan </a></li>--}}
                   {{--                <li  class="{{ request()->is('webreport') ? 'active' : '' }}"><a href="{{ route('webreport') }}"> Report </a></li>--}}
                   {{--                <li  class="{{ request()->is('dokumentasi') ? 'active' : '' }}"><a href="{{ route('dokumentasi') }}"> Dokumentasi API </a></li>--}}
                                   <li class="divider pt-2"><h5 style="color: white">|</h5></li>
                                   @if (Route::has('login'))
                                   @auth
                                  <li class="{{ request()->is('home') ? 'active' : '' }}" role="presentation"><a href="{{ route('home') }}" ><b>DASHBOARD</b></a></li>
                   
                                  @else
                                     <li role="presentation"><a href="{{ route('login') }}" ><b>LOGIN</b></a></li>
                   
                                   @endauth
                                   @endif
                 </ul>
               </div>
              </div>
             </div>
            </div>
           </section>
       </nav>
      <!-- menu end -->
     </div>
    </header>  
