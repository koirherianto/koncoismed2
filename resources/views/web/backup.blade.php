<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webster - Responsive Multi-purpose HTML5 Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Gistaru Samarinda</title>

<!-- Favicon -->
<link rel="shortcut icon" href="assets/webster/images/favicon.ico" />

<!-- font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800">

<!-- Plugins -->
<link rel="stylesheet" type="text/css" href="assets/webster/css/plugins-css.css" />

<!-- revoluation -->
<link rel="stylesheet" type="text/css" href="assets/webster/revolution/css/settings.css" media="screen" />

<!-- Typography -->
<link rel="stylesheet" type="text/css" href="assets/webster/css/typography.css" />

<!-- Shortcodes -->
<link rel="stylesheet" type="text/css" href="assets/webster/css/shortcodes/shortcodes.css" />

<!-- Style -->
<link rel="stylesheet" type="text/css" href="assets/webster/css/style.css" />

<!-- Responsive -->
<link rel="stylesheet" type="text/css" href="assets/webster/css/responsive.css" />

{{-- Color --}}
<link rel="stylesheet" type="text/css" href="assets/webster/css/skins/skin-red.css" />

</head>

<body>

<div class="wrapper">

<!--=================================
 preloader -->

<div id="pre-loader">
    <img src="assets/webster/images/pre-loader/loader-01.svg" alt="">
</div>

<!--=================================
 preloader -->

 <!--=================================
 header -->

 <header id="header" class="header default">
  <div class="menu">
    <!-- menu start -->
     <nav id="menu" class="mega-menu">
      <!-- menu list items container -->
      <section class="menu-list-items">
       <div class="container">
        <div class="row">
         <div class="col-lg-12 col-md-12">
          <!-- menu logo -->
          <ul class="menu-logo">
              <li>
                  <a href="index-01.html"><img id="logo_img" src="assets/img/gistaru2.png" alt="logo"> </a>
              </li>
          </ul>
          <!-- menu links -->
          <div class="menu-bar">
           <ul class="menu-links">
           @if (Route::has('login'))
            @auth
           <li role="presentation"><a href="{{ route('home') }}" ><b>HOME</b></a></li>
          
           @else
              <li role="presentation"><a href="{{ route('login') }}" ><b>LOGIN</b></a></li> 
                  
              @if (Route::has('register'))
                <li role="presentation"><a href="#register"><b>REGISTER</b></a></li>
              @endif
            @endauth
            @endif
              
              </li>
              <li><a href="javascript:void(0)">News </a>
                  
              </li>
              <li><a href="javascript:void(0)">Announcement </a>
                  
              </li>
              <li><a href="javascript:void(0)">Portfolio </a>
                  
              </li>
              <li><a href="javascript:void(0)">Article </a>
              
               </li>
              <li><a href="{{ route('gistaru_map') }}"> Map </a>
                
              </li>
          </ul>
          <div class="search-cart">
            <div class="search">
              <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                   <form action="search.html" method="get">
                    <input type="text"  class="not-click form-control" name="search" placeholder="Search.." value="" >
                    <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                  </form>
             </div>
            </div>
            
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
  
  <!--=================================
   header -->
  
  <!--=================================
   banner -->
  
  <section class="slider-parallax popup-video-banner bg-overlay-black-50 parallax" data-jarallax='{"speed": 0.6}'  style="background: url(assets/img/jembatan.jpg);">
    <div class="slider-content-middle">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12">
           <div class="slider-content text-left">
             <p class="text-white mt-20">Flexible. Stunning. Lightweight.</p>
            <h1 class="text-white">We're the <span class="theme-color"> Webster </span> <br /> Your Business. Our Solutions.</h1>
             <div class="mt-20">
               <a class="button" href="#"> read more </a>
             </div>
            </div>
           </div>
          </div>
       </div>
    </div>
    <a class="scroll-down move" title="Scroll Down" href="#about-us"><i></i></a>
  </section>
  
  <!--=================================
   banner -->

<!--=================================
 About-->

 <section class="blockquote-section page-section-ptb">
  <div class="container">
     <div class="row no-gutter">
        <div class="col-md-7 text-left blockquote-section-left">
          <blockquote class="quote blockquote">
           For a first time entrepreneur, choosing a business that has a clear revenue path is extremely important.
          <cite>- Collis Ta’eed <span class="text-gray"> CEO of Envato</span></cite>
         </blockquote>
        </div>
        <div class="col-md-5 blockquote-section-right">
           <img class="img-fluid" src="
           {path}images/about/05.png" alt="">
        </div>
     </div>
     <div class="row">
       <div class="col-lg-4 col-md-6 mt-50 text-white pos-r">
         <div class="action-box small bg-overlay-black-60 parallax" style="background: url(images/bg/06.jpg);">
          <h3 class="text-white"><strong> Webster: </strong> The most powerful template ever on the market</h3>
          <p class="text-white">Create tailor-cut websites with the exclusive multi-purpose responsive template along with powerful features.</p>
          <p class="text-white">Collis Ta’eed Success isn’t really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse when things don’t go their way! After serving as chief executive of the bag and flexibles business from 1995 to 2001 For those of you who are serious about having more, doing more, giving more and being more.</p>
          <div class="social-icons color-hover clearfix mt-20"><ul>
            <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>
            <li class="social-youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li class="social-instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
          <a class="button button-border white" href="#">
            <span>Purchase Now</span>
            <i class="fa fa-download"></i>
         </a>
      </div>
       </div>
       <div class="col-lg-8 col-md-6 mt-50">
        <h5>Appointed</h5>
        <p>to the Executive committee in May 2011 and to the Boards in January 2014</p>
        <h5 class="mt-30">Committee memberships </h5>
        <p>Executive, sustainable development and social and ethics </p>
        <h5 class="mt-30">Qualifications </h5>
        <p>Graduated in law from the University of University of Melbourne and in business administration from Melbourne Business School </p>
        <h5 class="mt-30">Experience </h5>
        <p>Collis Ta’eed Success isn’t really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse when things don’t go their way! Pretty sad situation, to say the least. </p>
        <p>After serving as chief executive of the bag and flexibles business from 1995 to 2001 For those of you who are serious about having more, doing more, giving more and being more, success is achievable with some understanding of what to do.</p>
        <p>On 1 February 2016 Franklin’s extraordinary success in life and politics can be attributed to his perseverance to overcome his personal liabilities, and his desire to constantly become better. Next time you really want to achieve something, take time to focus on your own personal journal. What is your temptation that is standing in your way to greatness? What can you do to form the habit of becoming a success?</p>
       </div>

     </div>
  </div>
</section>

<!--=================================
 About-->



<!--=================================
Content -->

<section class="our-services page-section-ptb gray-bg">
  <div class="container">
     <div class="row">
       <div class="col-lg-12 col-md-12">
          <div class="section-title text-center">
            <h6>Look Up</h6>
              <h2 class="title-effect">Our Project </h2>
          </div>
        </div>
         

        <section class="white-bg page-section-ptb">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              {{-- Content Space --}} <h1>CONTENT</h1> @yield('content')
            </div>
          </div>
          
        </div>
        </section>

      </div>            
  </div>  
</section>

<!--=================================
Content -->


<!--=================================
 portfolio-->

<section class="service white-bg page-section-ptb" id="portfolio">
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                <h6>We're Good At </h6>
                <h2 class="title-effect">Our Works</h2>
                <p>We're do everything we can to make our best project!</p>
              </div>
          </div>

        </div>
        <!-- ============================================ -->
      <div class="service-3">
        

        <div class="row">
        
          <!--=================================
        portfolio-->
        
        
      
        <!-- ============================================ -->
        
        <div class="col-lg-6">
            <div class="row">
            <div class="col-lg-5 col-md-6 xs-mt-30 xs-mb-30 mt-lg-5 ">
                <img class="img-fluid full-width d-flex" src="assets/img/gambar-1-A.jpg" alt="">
              </div>
                <div class="col-lg-7 col-md-6 xs-mt-30 xs-mb-30">
                  <div class="service-blog left text-left">
                    <h3 class="theme-color">rbsyervgesresrgsefg</h3>
                      <ul class="list list-unstyled">
                        <li>vthrdthdrthdrthrdhtdrgfghfgh</li>
                      </ul>
                      <p>bdgthhth</p>    
                  </div>
              </div>
            </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
          <div class="col-lg-5 col-md-6 xs-mt-30 xs-mb-30 mt-lg-5 ">
              <img class="img-fluid full-width d-flex" src="assets/img/gambar-1-A.jpg" alt="">
            </div>
              <div class="col-lg-7 col-md-6 xs-mt-30 xs-mb-30">
                <div class="service-blog left text-left">
                  <h3 class="theme-color">rbsyervgesresrgsefg</h3>
                    <ul class="list list-unstyled">
                      <li>vthrdthdrthdrthrdhtdrgfghfgh</li>
                    </ul>
                    <p>bdgthhth</p>    
                </div>
            </div>
          </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
        <div class="col-lg-5 col-md-6 xs-mt-30 xs-mb-30 mt-lg-5 ">
            <img class="img-fluid full-width d-flex" src="assets/img/gambar-1-A.jpg" alt="">
          </div>
            <div class="col-lg-7 col-md-6 xs-mt-30 xs-mb-30">
              <div class="service-blog left text-left">
                <h3 class="theme-color">rbsyervgesresrgsefg</h3>
                  <ul class="list list-unstyled">
                    <li>vthrdthdrthdrthrdhtdrgfghfgh</li>
                  </ul>
                  <p>bdgthhth</p>    
              </div>
          </div>
  </div>
            </div>
                <!-- ============================================ -->
                
            </div>


              
              </div>
  </div>
</section>



















<!--=================================
 portfolio -->

 <section class="white-bg masonry-main page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
           <div class="section-title text-center">
              <h6>Super creative</h6>
              <h2 class="title-effect">Our Latest Works</h2>
            </div>
         </div>
       </div>
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="isotope-filters">
       <button data-filter="" class="active">All</button>
       <button data-filter=".photography">photography</button>
       <button data-filter=".illustration">illustration</button>
       <button data-filter=".branding">branding</button>
       <button data-filter=".web-design">web-design</button>
     </div>
    <div class="masonry columns-3 popup-gallery">
     <div class="grid-sizer"></div>
      <div class="masonry-item photography illustration">
              <div class="portfolio-item">
                    <img src="images/portfolio/masonry/01.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/01.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
     <div class="masonry-item photography">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/02.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/02.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
      <div class="masonry-item photography branding">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/03.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/03.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
     <div class="masonry-item web-design">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/04.gif" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/04.gif"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
     <div class="masonry-item photography illustration">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/05.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/05.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
     <div class="masonry-item photography">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/06.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/06.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
     <div class="masonry-item">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/07.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/07.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
       <div class="masonry-item photography branding">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/08.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/08.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
      <div class="masonry-item illustration">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/09.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/09.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
      <div class="masonry-item illustration">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/10.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/10.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
     <div class="masonry-item">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/01.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/01.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
     <div class="masonry-item branding">
             <div class="portfolio-item">
                    <img src="images/portfolio/masonry/02.jpg" alt="">
                     <div class="portfolio-overlay">
                         <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                         <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                     </div>
                     <a class="popup portfolio-img" href="images/portfolio/masonry/02.jpg"><i class="fa fa-arrows-alt"></i></a>
             </div>
     </div>
 
      </div>
     </div>
    </div>
  </div>
 </section>
 
 <!--=================================
  portfolio -->



<!--=================================
 Our activities -->

<section class="our-activities page-section-ptb">
  <div class="container">
     <div class="row">
      <div class="col-lg-7 ">
         <div class="section-title">
            <h6>Let's have a look at</h6>
            <h2 class="title-effect">Our Activities And Skills</h2>
            <p>Consectetur adipisicing elit. Lorem ipsum dolor, consectetur adipisicing elit lorem ipsum dolor sit amet.</p>
          </div>
            <div class="skill">
              <div class="skill-bar medium" data-percent="85" data-delay="0" data-type="%">
               <div class="skill-title">HTML5</div>
              </div>
            </div>
            <div class="skill">
              <div class="skill-bar medium" data-percent="90" data-delay="0" data-type="%">
               <div class="skill-title">CSS3</div>
              </div>
            </div>
            <div class="skill">
              <div class="skill-bar medium" data-percent="80" data-delay="0" data-type="%">
               <div class="skill-title">Javascript / jQuery</div>
              </div>
            </div>
       </div>
      <div class="col-lg-5 xs-mt-30">
     <div class="accordion shadow mb-30">
          <div class="acd-group acd-active">
              <a href="#" class="acd-heading">CAPABILITIES</a>
              <div class="acd-des">Neque porro quisquam est, <span class="theme-color" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">blog layout</span> ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
          </div>
          <div class="acd-group">
              <a href="#" class="acd-heading">Mission</a>
              <div class="acd-des">Dolorem ipsum quia dolor sit amet neque porro quisquam est, qui, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
          </div>
          <div class="acd-group">
              <a href="#" class="acd-heading">Value</a>
              <div class="acd-des">Consectetur, adipisci velit neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
          </div>
       </div>
      </div>
    </div>
 </div>
</section>

<!--=================================
our activities -->


<!-- News -->
<section  class="page-section-ptb">
  <div class="container">
  <div class="row mt-70 justify-content-center" id="news">
           <div class="col-lg-8">
              <div class="section-title text-center">
              <h6>Whats Up Today ?</h6>
              <h2 class="title-effect">Catch up our latest update!</h2>
              <p>Check our news, we're be here for you</p>
            </div>
        </div>
  
      </div>
  <div class="row">
          <div class="col-lg-12 col-md-12">               
               <div class="owl-carousel bottom-right-dots" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="20" width=""> 
                            <div class="item">
                               <div class="blog-overlay">
                                   <div class="blog-image" style="max-height: 500px;">
                                        <img class="img-fluid" src="assets/img/gambar-3-B.jpg" alt="">
                                 </div>
                                 <div class="blog-name">
                                       <a class="tag" href="#">gcauyvgcuksbgcu  </a>
                                        <h4 class="mt-15 text-white"><a href="#"></a></h4>
                                        <span class="text-white">csgbdcugscg</a></span>
                                        </div>
                                  </div>
                             </div>
                             <div class="item">
                              <div class="blog-overlay">
                                  <div class="blog-image" style="max-height: 500px;">
                                       <img class="img-fluid" src="assets/img/gambar-3-B.jpg" alt="">
                                </div>
                                <div class="blog-name">
                                      <a class="tag" href="#">gcauyvgcuksbgcu  </a>
                                       <h4 class="mt-15 text-white"><a href="#"></a></h4>
                                       <span class="text-white">csgbdcugscg</a></span>
                                       </div>
                                 </div>
                            </div>
           </div>
          </div>
       </div>
       </div>
</section>     
<!-- News -->











<!--=================================
 team  -->

<section class="gray-bg page-section-ptb">
  <div class="container">
     <div class="row">
     <div class="col-lg-12 col-md-12">
         <div class="section-title text-center">
            <h6>Meet our Superheros </h6>
              <h2 class="title-effect">Our creative team</h2>
          </div>
       </div>
    </div>
     <div class="row">
        <div class="col-lg-3 col-sm-6 sm-mb-30">
           <div class="team team-round full-border white-bg">
              <div class="team-photo">
                <img class="img-fluid mx-auto" src="images/team/01.jpg" alt="">
              </div>
              <div class="team-description">
                <div class="team-info">
                     <h5><a href="team-single.html"> Martin Smith</a></h5>
                     <span>CEO</span>
                </div>
                <div class="team-contact">
                  <span class="call"> +(704) 279-1249</span>
                  <span class="email"> <a href="#"> <i class="fa fa-envelope-o"></i> </a> </span>
                </div>
               </div>
           </div>
          </div>
          <div class="col-lg-3 col-sm-6 sm-mb-30">
           <div class="team team-round full-border white-bg">
              <div class="team-photo">
                <img class="img-fluid mx-auto" src="images/team/02.jpg" alt="">
              </div>
              <div class="team-description">
                <div class="team-info">
                     <h5><a href="team-single.html"> Paul Flavius</a></h5>
                     <span>Design</span>
                </div>
                <div class="team-contact">
                  <span class="call"> +(704) 279-1249</span>
                  <span class="email"> <a href="#"> <i class="fa fa-envelope-o"></i> </a> </span>
                </div>
               </div>
           </div>
          </div>
          <div class="col-lg-3 col-sm-6 xs-mb-30">
           <div class="team team-round full-border white-bg">
              <div class="team-photo">
                <img class="img-fluid mx-auto" src="images/team/06.jpg" alt="">
              </div>
              <div class="team-description">
                <div class="team-info">
                     <h5><a href="team-single.html"> Anne Smith</a></h5>
                     <span>Community</span>
                </div>
                <div class="team-contact">
                  <span class="call"> +(704) 279-1249</span>
                  <span class="email"> <a href="#"> <i class="fa fa-envelope-o"></i> </a> </span>
                </div>
               </div>
           </div>
          </div>
          <div class="col-lg-3 col-sm-6">
           <div class="team team-round full-border white-bg">
              <div class="team-photo">
                <img class="img-fluid mx-auto" src="images/team/04.jpg" alt="">
              </div>
              <div class="team-description">
                <div class="team-info">
                     <h5><a href="team-single.html"> Sara Lisbon</a></h5>
                     <span>Graphic Designer</span>
                </div>
                <div class="team-contact">
                  <span class="call"> +(704) 279-1249</span>
                  <span class="email"> <a href="#"> <i class="fa fa-envelope-o"></i> </a> </span>
                </div>
               </div>
           </div>
          </div>
       </div>
   </div>
 </section>

<!--=================================
 team -->



<!--=================================
 footer -->

<footer class="footer page-section-pt black-bg">
 <div class="container">
  <div class="row">
      <div class="col-lg-2 col-sm-6 sm-mb-30">
      <div class="footer-useful-link footer-hedding">
        <h6 class="text-white mb-30 mt-10 text-uppercase">Navigation</h6>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Service</a></li>
          <li><a href="#">Team</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div class="col-lg-2 col-sm-6 sm-mb-30">
      <div class="footer-useful-link footer-hedding">
        <h6 class="text-white mb-30 mt-10 text-uppercase">Useful Link</h6>
        <ul>
          <li><a href="#">Create Account</a></li>
          <li><a href="#">Company Philosophy</a></li>
          <li><a href="#">Corporate Culture</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">Client Management</a></li>
        </ul>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 xs-mb-30">
    <h6 class="text-white mb-30 mt-10 text-uppercase">Contact Us</h6>
    <ul class="addresss-info">
        <li><i class="fa fa-map-marker"></i> <p>Address: 17504 Carlton Cuevas Rd, Gulfport, MS, 39503</p> </li>
        <li><i class="fa fa-phone"></i> <a href="tel:7042791249"> <span>+(704) 279-1249 </span> </a> </li>
        <li><i class="fa fa-envelope-o"></i>Email: letstalk@webster.com</li>
      </ul>
    </div>
    <div class="col-lg-4 col-sm-6">
      <h6 class="text-white mb-30 mt-10 text-uppercase">Subscribe to Our Newsletter</h6>
        <p>Sign Up to our Newsletter to get the latest news and offers.</p>
         <div class="footer-Newsletter">
          <div id="mc_embed_signup_scroll">
            <form action="php/mailchimp-action.php" method="POST" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate">
             <div id="msg"> </div>
              <div id="mc_embed_signup_scroll_2">
                <input id="mce-EMAIL" class="form-control" type="text" placeholder="Email address" name="email1" value="">
              </div>
              <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_b7ef45306f8b17781aa5ae58a_6b09f39a55" tabindex="-1" value="">
                </div>
                <div class="clear">
                  <button type="submit" name="submitbtn" id="mc-embedded-subscribe" class="button button-border mt-20 form-button">  Get notified </button>
                </div>
              </form>
            </div>
            </div>
         </div>
       </div>

       

      <div class="footer-widget mt-20">
        <div class="row">
          <div class="col-lg-6 col-md-6 xs-mb-20">
           <p class="mt-15"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#"> Webster </a> All Rights Reserved </p>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="social-icons color-hover float-left float-md-right pt-10">
             <ul>
              <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="social-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i> </a></li>
              <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i> </a></li>
             </ul>
           </div>
          </div>
        </div>
      </div>
  </div>
</footer>

<!--=================================
 footer -->

</div>



<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>

<!--=================================
 jquery -->

<!-- jquery -->
<script src="assets/webster/js/jquery-3.4.1.min.js"></script>

<!-- plugins-jquery -->
<script src="assets/webster/js/plugins-jquery.js"></script>

<!-- plugin_path -->
<script>var plugin_path = 'assets/webster/js/';</script>

<!-- REVOLUTION JS FILES -->
<script src="assets/webster/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/webster/revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="assets/webster/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/webster/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/webster/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/webster/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/webster/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/webster/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/webster/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/webster/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/webster/revolution/js/extensions/revolution.extension.video.min.js"></script>
<!-- revolution custom -->
<script src="assets/webster/revolution/js/revolution-custom.js"></script>

<!-- custom -->
<script src="assets/webster/js/custom.js"></script>



</body>
</html>





{{-- Tambahan Kemaren --}}
<div class="section-title line-dabble">
  <h4 class="title">Today's highlights</h4>
</div>
<div class="owl-carousel bottom-right-dots" data-nav-dots="true" data-items="1"
  data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">


  <div class="item">

      <div class="blog-overlay">
          @if (isset($recentnews))
              <div class="blog-image">
                  <img class="img-fluid" src={{ $recentnews->getFirstMediaUrl() }} alt="">

              </div>
              <div class="blog-name">
                  <a class="tag"
                      href="/webnews/{{ $recentnews->slug }}">{{ $recentnews->name }} </a>
                  <h4 class="mt-15 text-white"><a
                          href="/webnews/{{ $recentnews->slug }}">{{ $recentnews->name }}</a>
                  </h4>
                  <span class="text-white">({{$recentnews->username}})
                          </span>
              </div>
          @else
              <div class="blog-image"></div>
              <img class="img-fluid" src={{ asset('image/bg/back-berita.png') }} alt="">
              <div class="blog-name">
                  <a class="tag" href="#"> </a>
                  <h4 class="mt-15 text-white"><a href="#">-</a></h4>
                  <span class="text-white">By adimn / <a href="#">Business</a></span>
              </div>

      </div>

      @endif
  </div>
</div>


{{-- Announcement Carousel Backup --}}



<section class="white-bg page-section-ptb">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
              {{-- Announcement --}}
              <section class="white-bg my-5">
                  <div class="container">
                      <div class="row justify-content-start">
                          <div class="col-lg-12">
                              <div class="section-title line-dabble text-left">
                                  <h4 class="title">See The Announcement Here !</h4>
                              </div>
                          </div>

                      </div>


                      <div class="row no-gutters">
                          <div class="col-lg-12">
                              <div class="owl-carousel bottom-right-dots" data-nav-dots="true" data-items="1"
                                  data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1"
                                  data-space="0">
                                  @foreach ($announcements as $announcement)



                                      <div class="item">
                                          <div class="blog-overlay">
                                              <div class="blog-image">
                                                  @if ($announcement->getFirstMediaUrl())
                                                      <img class="img-fluid"
                                                          src="{{ $announcement->getFirstMediaUrl() }}" alt="">
                                                  @else
                                                      <img class="img-fluid"
                                                          src="{{ asset('image/bg/back-berita.png') }}" alt="">
                                                  @endif
                                              </div>
                                              <div class="blog-name">
                                                  <a class="tag" href="#"> Style </a>
                                                  <h4 class="mt-15 text-white"><a
                                                          href="{{ route('announcements.show', $announcement->slug) }}">{{ $announcement->name }}</a>
                                                  </h4>
                                                  <span class="text-white">By adimn / <a href="#">Business</a></span>
                                              </div>
                                          </div>
                                      </div>

                                  @endforeach
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              {{-- Announcement --}}
          </div>
      </div>

  </div>
</section>
