@extends('web.frontend.layouts.app_map')

@section('content')
    <section class="slider-parallax listing-bannerpt-30" style="background-image: url({{ asset('master/asset-web/image_slider/banner_default2.jpg') }});background-size: cover;background-position: bottom;background-repeat: no-repeat">
        <div class="slider-content-middle">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="slider-content">
                            <h3 class="d-block theme-color text-bold-600">Selamat Datang di</h3>
                            <h1 class="theme-color-dark text-bold-800 font-large-3 mt-20">Website Konco Ismed <br></h1>
                            <span class="typer font-large-2 pt-20" data-delay="150" data-words="Merawat Persatuan,Dengan Pembangunan"
                                  data-colors="#049d64, #049d64, #049d64, #049d64"></span>
                            <span class="cursor font-large-2" data-cursorDisplay="|" data-owner="some-id"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-30 parallax mt-0" data-jarallax='{"speed": 0.3}' style="background-image: url({{asset('image/bg/white_abs_ppp.jpg')}}); background-size: contain;">
        <div class="container" style="margin-top: -100px">
            <div class="row">
                <div  class="col-md-6 col-sm-12 mb-20">
                    <div class="card rounded-2 shadow-lg pt-20 pb-20 pl-20 pr-20 mb-20 text-center border-0" style="height: 100%">
                        <div class="mb-30">
                            <span class="ti-stats-up theme-color font-large-5" aria-hidden="true"></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="theme-color">Profesional</h5>
                            <p>Mewujudkan DPRD Kaltim sebagai lembaga yang profesional, proposional, berkualitas
                                dan anti korupsi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-20">
                    <div class="card rounded-2 shadow-lg pt-20 pb-20 pl-20 pr-20 mb-20 text-center border-0" style="height: 100%">
                        <div class="mb-30">
                            <span class="ti-shield theme-color-secondary font-large-5" aria-hidden="true"></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="theme-color-secondary">Bebas KKN</h5>
                            <p>Mendorong terwujudnya tata pemerintahan yang kuat, berkualitas dan bebas <span
                                    class="theme-color-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="" data-bs-original-title="Tooltip on top">KKN</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-20">
                    <div class="card rounded-2 shadow-lg pt-20 pb-20 pl-20 pr-20 mb-20 text-center border-0" style="height: 100%">
                        <div class="mb-30">
                            <span class="ti-shield theme-color-secondary font-large-5" aria-hidden="true"></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="theme-color-secondary">Bebas KKN</h5>
                            <p>Mendorong terwujudnya tata pemerintahan yang kuat, berkualitas dan bebas <span
                                    class="theme-color" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="" data-bs-original-title="Tooltip on top">KKN</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-20">
                    <div class="card rounded-2 shadow-lg pt-20 pb-20 pl-20 pr-20 mb-20 text-center border-0" style="height: 100%">
                        <div class="mb-30">
                            <span class="ti-stats-up theme-color font-large-5" aria-hidden="true"></span>
                        </div>
                        <div class="feature-info">
                            <h5>Profesional</h5>
                            <p>Mewujudkan DPRD Kaltim sebagai lembaga yang profesional, proposional, berkualitas
                                dan anti korupsi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- portofolio --}}
    <section id="history" class="law-timeline white-bg page-section pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="mb-50">Profil Zaenab - Calon Legislatif DPRD</h1>
                    <ul class="list list list-unstyled">
                        <li><i class="fa fa-dot-circle-o"></i>Zaenab, S.Tr.Kom, M.Bus., PhD</li>
                        <li><i class="fa fa-dot-circle-o"></i>Lahir di Loa Janan, 17 Agustus 2001</li>
                        {{-- <li><i class="fa fa-dot-circle-o"></i>Ensure everything goes precisely to plan</li>
                        <li><i class="fa fa-dot-circle-o"></i>Touch every sense</li>
                        <li><i class="fa fa-dot-circle-o"></i>Ensure everything goes precisely to plan</li> --}}
                    </ul>
                    <br>
                    <h3 class="mb-50 title-effect text-dark-grey mb-0"><i class=" fa fa-black-tie"></i> <mark>Riwayat Pendidikan</mark></h3>
                    <ul class="list list list-unstyled">
                        <li><i class="fa fa-dot-circle-o"></i>MI Ar-Rahmah (2007)</li>
                        <li><i class="fa fa-dot-circle-o"></i>SMP Nabil Husein (2013)</li>
                        <li><i class="fa fa-dot-circle-o"></i>SMAN 7 Samarinda (2016)</li>
                        <li><i class="fa fa-dot-circle-o"></i>D4, Jurusan Teknik dan Informatika, Politeknik Pertanian Negeri Samarinda (2019)</li>
                        {{-- <li><i class="fa fa-dot-circle-o"></i>Ensure everything goes precisely to plan</li>
                        <li><i class="fa fa-dot-circle-o"></i>Touch every sense</li>
                        <li><i class="fa fa-dot-circle-o"></i>Ensure everything goes precisely to plan</li> --}}
                    </ul>
                    <div class="mt-30">
                        <img class="img-fluid full-width" src="{{asset('master/asset-web/images/8.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 sm-mt-40 pt-50">
                    <div class="timeline-centered">
                        <div class="timeline-entry">
                            <div class="timeline-entry-inner">
                                <div class="timeline-year"> <b>2018 - Sekarang</b></div>
                                <div class="timeline-icon">
                                    <i class="fa fa-eercast"></i>
                                </div>
                                <div class="timeline-label pt-10">
                                    <h3><mark> Gubernur Kaltim</mark></h3>
                                    <p> Ia adalah wakil dari Gubernur Kalimantan Timur, Dr. Ir. H. Isran Noor, M.Si.</p><p>
                                    </p></div>
                            </div>
                        </div>
                        <div class="timeline-entry">
                            <div class="timeline-entry-inner">
                                <div class="timeline-year"> <b>2014 - 2018</b></div>
                                <div class="timeline-icon">
                                    <i class="fa fa-eercast"></i>
                                </div>
                                <div class="timeline-label pt-10">
                                    <h3><mark> Ketua Komisi VII DPR RI</mark></h3>
                                    <p>An arrest for any criminal charge including domestic violence, DUI or drug possession can easily change your life. The stakes are so high that you must invest in a quality defense.</p><p>
                                    </p></div>
                            </div>
                        </div>
                        <div class="timeline-entry">
                            <div class="timeline-entry-inner">
                                <div class="timeline-year"> <b>2009 - 2014</b></div>
                                <div class="timeline-icon">
                                    <i class="fa fa-eercast"></i>
                                </div>
                                <div class="timeline-label pt-10">
                                    <h3><mark> Ketua DPRD Kaltim</mark></h3>
                                    <p>An arrest for any criminal charge including domestic violence, DUI or drug possession can easily change your life. The stakes are so high that you must invest in a quality defense.</p><p>
                                    </p></div>
                            </div>
                        </div>
                        <div class="timeline-entry">
                            <div class="timeline-entry-inner">
                                <div class="timeline-year"> <b>2004 - 2009</b></div>
                                <div class="timeline-icon">
                                    <i class="fa fa-eercast"></i>
                                </div>
                                <div class="timeline-label pt-10">
                                    <h3 class="text-dark-blue"><mark> Komisi 1 DPRD Kaltim</mark></h3>
                                    <p>An arrest for any criminal charge including domestic violence, DUI or drug possession can easily change your life. The stakes are so high that you must invest in a quality defense.</p><p>
                                    </p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- galeri --}}
    <section class="white-bg page-section pt-30 pb-30 o-hidden">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="section-title text-center">
                        <h6 class="text-theme"> Super Galeri</h6>
                        <h2 class="text-dark-grey"> <i class="fa fa-camera-retro"></i> Our Latest Works</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    {{-- <div class="isotope-filters">
                       <button data-filter="" class="active">All</button> --}}
                    {{-- <button data-filter=".photography">photography</button>
                    <button data-filter=".illustration">illustration</button>
                    <button data-filter=".branding">branding</button>
                    <button data-filter=".web-design">web-design</button> --}}
                    {{-- </div> --}}
                    <div class="isotope columns-4 popup-gallery no-padding" style="position: relative; height: 1342.38px;">
                        <div class="grid-item photography branding" style="position: absolute; left: 0px; top: 0px;">
                            <div class="portfolio-item">
                                <img src="{{asset('master/app-assets/images/slide/1.jpg')}}" alt="">
                                <div class="portfolio-overlay">
                                    <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                                    <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                                </div>
                                <a class="popup portfolio-img" href="{{asset('master/app-assets/images/slide/1.jpg')}}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                        <div class="grid-item illustration" style="position: absolute; left: 469px; top: 0px;">
                            <div class="portfolio-item">
                                <img src="{{asset('master/app-assets/images/slide/2.jpg')}}" alt="">
                                <div class="portfolio-overlay">
                                    <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                                    <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                                </div>
                                <a class="popup portfolio-img" href="{{asset('master/app-assets/images/slide/2.jpg')}}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                        <div class="grid-item illustration" style="position: absolute; left: 0px; top: 335px;">
                            <div class="portfolio-item">
                                <img src="{{asset('master/app-assets/images/slide/3.jpg')}}" alt="">
                                <div class="portfolio-overlay">
                                    <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                                    <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                                </div>
                                <a class="popup portfolio-img" href="{{asset('master/app-assets/images/slide/3.jpg')}}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                        <div class="grid-item branding illustration" style="position: absolute; left: 469px; top: 335px;">
                            <div class="portfolio-item">
                                <img src="{{asset('master/app-assets/images/slide/4.jpg')}}" alt="">
                                <div class="portfolio-overlay">
                                    <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                                    <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                                </div>
                                <a class="popup portfolio-img" href="{{asset('master/app-assets/images/slide/4.jpg')}}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                        <div class="grid-item branding illustration" style="position: absolute; left: 0px; top: 671px;">
                            <div class="portfolio-item">
                                <img src="{{asset('master/app-assets/images/slide/5.jpg')}}" alt="">
                                <div class="portfolio-overlay">
                                    <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                                    <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                                </div>
                                <a class="popup portfolio-img" href="{{asset('master/app-assets/images/slide/5.jpg')}}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                        <div class="grid-item web-design photography" style="position: absolute; left: 469px; top: 671px;">
                            <div class="portfolio-item">
                                <img src="{{asset('master/app-assets/images/slide/6.jpg')}}" alt="">
                                <div class="portfolio-overlay">
                                    <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                                    <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                                </div>
                                <a class="popup portfolio-img" href="{{asset('master/app-assets/images/slide/6.jpg')}}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                        <div class="grid-item web-design photography" style="position: absolute; left: 0px; top: 1006px;">
                            <div class="portfolio-item">
                                <img src="{{asset('master/app-assets/images/slide/7.jpg')}}" alt="">
                                <div class="portfolio-overlay">
                                    <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                                    <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                                </div>
                                <a class="popup portfolio-img" href="{{asset('master/app-assets/images/slide/7.jpg')}}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                        <div class="grid-item web-design photography" style="position: absolute; left: 469px; top: 1006px;">
                            <div class="portfolio-item">
                                <img src="{{asset('master/app-assets/images/slide/8.jpg')}}" alt="">
                                <div class="portfolio-overlay">
                                    <h4 class="text-white"> <a href="portfolio-single-01.html"> Your title here </a> </h4>
                                    <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                                </div>
                                <a class="popup portfolio-img" href="{{asset('master/app-assets/images/slide/8.jpg')}}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


               {{-- visi caleg --}}

<section class="page-section-ptb">
    <div class="container pt-80">
       <div class="row">
           <div class="col-lg-6">
              {{-- <div class="owl-carousel bottom-center-dots owl-loaded owl-drag" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">  
            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1893px, 0px, 0px); transition: all 1s ease 0s; width: 4420px;"><div class="owl-item cloned" style="width: 601.333px; margin-right: 30px;"><div class="item"> --}}
                  <img class="img-fluid" src="{{asset('master/app-assets/images/slide/cth.png')}}" alt="">
                {{-- </div></div><div class="owl-item cloned" style="width: 601.333px; margin-right: 30px;"><div class="item">
                  <img class="img-fluid" src="{{asset('master/app-assets/images/slide/4.jpg')}}" alt="">
                </div></div><div class="owl-item" style="width: 601.333px; margin-right: 30px;"><div class="item">
                  <img class="img-fluid" src="{{asset('master/app-assets/images/slide/3.jpg')}}" alt="">
                </div></div><div class="owl-item active" style="width: 601.333px; margin-right: 30px;"><div class="item">
                  <img class="img-fluid" src="{{asset('master/app-assets/images/slide/1.jpg')}}" alt="">
                </div></div><div class="owl-item" style="width: 601.333px; margin-right: 30px;"><div class="item">
                  <img class="img-fluid" src="{{asset('master/app-assets/images/slide/4.jpg')}}" alt="">
                </div></div><div class="owl-item cloned" style="width: 601.333px; margin-right: 30px;"><div class="item">
                  <img class="img-fluid" src="{{asset('master/app-assets/images/slide/3.jpg')}}" alt="">
                </div></div><div class="owl-item cloned" style="width: 601.333px; margin-right: 30px;"><div class="item">
                  <img class="img-fluid" src="{{asset('master/app-assets/images/slide/1.jpg')}}" alt="">
                </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left fa-2x"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right fa-2x"></i></button></div><div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div> --}}
           </div>
           <div class="col-lg-6 sm-mt-30">
              <div class="section-title">
              {{-- <h6>Selamat datang di Kawal Data</h6> --}}
              <h2 class="text-dark-blue"><mark> Visi</mark> Calon Legislatif DPR RI</h2>
              <p>Mendorong terwujudnya penyelenggaraan pemerintahan yang transparan, bersih dan akuntabel.</p>
            </div>
              <p>Mewujudkan Dewan Perwakilan Rakyat Republik Indonesia sebagai lembaga legislatif yang <mark>kuat, merakyat, dinamis dan transparan</mark></p>
             <div class="mt-30">
                <a class="button button-border icon" target="_blank" href="#">
                <span>Lanjut</span>
                <i class="fa fa-hand-o-right"></i>
                </a>
              </div>
            </div>
       </div>
    </div>
  </section>
        </div>
        </div>
        </div>
    </section>

{{-- video --}}

<section class="page-section-1-ptb bg-overlay-black-70 popup-gallery o-hidden parallax" data-jarallax='{"speed": 0.6}' style="background-image: url(master/asset-web/images/8.jpg);">
    <div class="container">
     <div class="row justify-content-center">
       <div class="col-lg-8">
        <div class="section-title mb-30 text-center">
          <h6 class="text-white">Ingin tahu tentang kami!</h6>
          <h2 class="text-white">Cek video di bawah ini dan jadi bagian dari koncoismed.</h2>
        </div>
      </div>
     </div>
     <div class="row">
       <div class="col-lg-12">
         <div class="play-video text-center"> <a class="view-video popup-youtube" href="https://youtu.be/qVa-mdp7W5Y"> <i class="fa fa-play"></i> </a></div>
       </div>
    </div>
    </div>
   </section>


    {{-- <section id="screenshot" class="page-section-ptb">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h6>Screenshots Mobile App</h6>
                        <h2>Gambaran Visual Kawal Data</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-sm-12">
                    <div class="owl-carousel" data-nav-dots="true" data-items="4" data-sm-items="3" data-xs-items="2"
                         data-xx-items="1">
                        <div class="item">
                            <img class="img-fluid" src="{{asset('master/app-assets/images/ss/1.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{asset('master/app-assets/images/ss/2.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{asset('master/app-assets/images/ss/3.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{asset('master/app-assets/images/ss/4.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{asset('master/app-assets/images/ss/5.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

 {{-- join relawan --}}

<section class="page-section pt-50 pb-30">
    <div class="container">
     <div class="row">
       <div class="col-lg-6 sm-mt-30">
           <div class="section-title line lef mb-20">
             <h6 class="subtitle">Bergabung Menjadi Relawan</h6>
             <h2 class="title-effect">WUJUDKAN INDONESIA KITA</h2>
             <p class="mt-30">Ayo menjadi bagian dari koncoismed menuju Indonesia yang kita cita-citakan.</p>
           </div>
           <p class="text">Menyatukan dan melibatkan seluruh elemen kekuatan rakyat</p>
           <p class="dark-blue text-white">Digerakkan oleh rakyat dan untuk rakyat. Karena rakyat adalah pelaku utama sejarah yang berhak dan berkewajiban menentukan masa depan dan jalan sejarahnya sendiri.</p>
          <div class="row mt-30">
             <div class="col-sm-6 col-xs-6 col-xx-12">
               <ul class="list list-hand">
                 <li> Menuju Kejayaan</li>
                 <li> Membangun Kekuatan </li>
               </ul>
             </div>
             <div class="col-sm-6 col-xs-6 col-xx-12">
               <ul class="list list-hand">
                 <li> Menyatukan Rakyat</li>
                 <li> Arah Maju Indonesia  </li>
               </ul>
             </div>
            </div>
            <div class="mt-30">
              <a class="button button-border icon" target="_blank" href="#">
              <span>Gabung</span>
              <i class="fa fa-hand-o-right"></i>
              </a>
            </div>
       </div>
       <div class="col-lg-6">
        <img class="img-fluid" src="{{asset('master/asset-web/images/gabung2.png')}}" alt="">
      </div>
     </div>
    </div>
   </section>

    {{-- map --}}
    <section class="google-map theme">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="lacks-heading d-none">Lacks Heading</h6> <!-- lacks heading for w3c -->
                    <div class="map-icon">
                    </div>
                </div>
            </div>
        </div>
        <div class="map-open">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8351288872545!2d144.9556518!3d-37.8173306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1443621171568" style="border:0; width: 100%; height: 300px;"></iframe>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();


                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('.ctgry_shp').html(data);
                }).fail(function () {
                    alert('Category SHP could not be loaded.');
                });
            }
        });

    </script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0"
            nonce="NlKpG7xt"></script>
@endsection
