<header id="header" class="header text-dark white-bg fullWidth">
  <div class="menu onepage-hover-01  " id="onepagenav">
  <!-- menu start -->
   <nav id="menu" class="mega-menu" style="">
    <!-- menu list items container -->
    <section class="menu-list-items" style="height: 90px;">
     <div class="container-fluid">
      <div class="row">
       <div class="col-lg-12 col-md-12 position-relative">
        <!-- menu logo -->
        <ul class="menu-logo">
            <li>
                <a href="index-01.html"><img class="img-fluid" src="{{asset('image/gelora.png')}}" alt=""> </a>
            <div class="menu-mobile-collapse-trigger"><span></span></div></li>
        </ul>
        <!-- menu links -->
        <div class="menu-bar">
         <ul class="menu-links" style="display: none; max-height: 400px; overflow: auto;">
          <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Home</b></a></li>
              <li class="{{ request()->is('/') ?  : '' }}"><a href="{{ url('/') }}" ><b>Visi & Misi</b></a></li>
              <li class="{{ request()->is('/') ?  : '' }}"><a href="{{ url('/') }}" ><b>Portofolio</b></a></li>
              <li class="{{ request()->is('/') ?  : '' }}"><a href="{{ url('/') }}" ><b>Relawan</b></a></li>
              <li class="{{ request()->is('/') ?  : '' }}"><a href="{{ url('/') }}" ><b>Kontak</b></a></li>
              <li class="divider pt-2"><h5 style="color: white">|</h5></li>
              @if (Route::has('login'))
              @auth
             <li class="{{ request()->is('home') ? 'active' : '' }}" role="presentation"><a href="{{ route('home') }}" ><b>DASHBOARD</b></a></li>

             @else
                <li role="presentation"><a href="{{ route('login') }}" ><b>LOGIN</b></a></li>

              @endauth
              @endif
            {{-- <li class="active"><a href="#homesection">Home</a></li>
            <li class=""><a href="#about-us">About us</a></li>
            <li class=""><a href="#facts">Facts</a></li>
            <li class=""><a href="#gallery">gallery</a></li>
            <li class=""><a href="#testimonial">testimonial</a></li> --}}
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