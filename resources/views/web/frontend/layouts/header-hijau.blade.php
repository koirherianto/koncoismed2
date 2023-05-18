<header id="header" class="header light topbar-dark">
    <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 xs-mb-10">
          <div class="topbar-call text-center text-md-start">
            <ul>
              <li><i class="fa fa-envelope-o theme-color"></i> zaenabteam@icloud.com</li>
               <li><i class="fa fa-phone"></i> <a href="tel:+7042791249"> <span>+(704) 279-1249 </span> </a> </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="topbar-social text-center text-md-end">
            <ul>
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-instagram"></span></a></li>
              <li><a href="#"><span class="fa fa-google"></span></a></li>
              <li><a href="#"><span class="ti-twitter"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
              <li><a href="#"><span class="ti-dribbble"></span></a></li>
            </ul>
          </div>
        </div>
       </div>
    </div>
  </div>
  <!--=================================
   mega menu -->
  
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
                  <a href="index-01.html"><img id="logo_img" src="{{asset('image/ppp.png')}}" alt="logo"> </a>
              <div class="menu-mobile-collapse-trigger"><span></span></div></li>
          </ul>
          <!-- menu links -->
          <div class="menu-bar">
           <ul class="menu-links" style="display: none; max-height: 400px; overflow: auto;">
  
           <li class="hoverTrigger"><a href="javascript:void(0)">Beranda <div class="mobileTriggerButton"></div></a>
                  <!-- drop down full width -->
              </li>
              <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Tentang</b></a></li>
              <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Visi & Misi</b></a></li>
              <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Portofolio</b></a></li>
              <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" ><b>Kontak</b></a></li>
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
       </div>
      </section>
     </nav>
    <!-- menu end -->
   </div>
  </header>