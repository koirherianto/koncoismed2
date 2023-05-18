<html lang="en" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"><head>
  <head> 
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Webster - Responsive Multi-purpose HTML5 Template">
    <meta name="author" content="potenzaglobalsolutions.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Form Kandidat</title>
    <link rel="shortcut icon" href="{{ asset('image\britech.png') }}" />
    @include('web.frontend.layouts.css')
    @livewireStyles

    @yield('css')
  </head>
    
    <section class="white-bg page-section-ptb">
        <div class="container">
          <div class="row">
             <div class="col-lg-12 col-md-12">
              <div class="section-title text-center">
                  <h6 class="">Masukkan informasi kandidat terlebih dahulu</h6>
                  <h2 class="title-effect">Form Kandidat</h2>
                </div>
            </div>
          </div>
           <div class="row justify-content-center">
             <div class="col-lg-6 col-md-8">
              <div class="pb-50 clearfix">
                {!! Form::open(['route' => 'kandidats.store']) !!}
                   <div class="section-field mb-20">
                     <label class="mb-10" for="name">Nomor Urut </label>
                     {!! Form::number('nomor_urut', null, ['class' => 'form-control rounded-pill border-primary', 'placeholder' => 'Nomor Urut']) !!}
                    </div>
                    {{ Form::hidden('users_id', Auth::id()) }}
                     {{-- <div class="section-field mb-20 col-sm-6">
                     <label class="mb-10" for="name">Jenis Kandidat* </label>
                     {!! Form::select('jenis_kandidat_id', $jenis_kandidats, null, ['class' => 'form-control p-2 border-primary','placeholder' => 'Jenis Kandidat','wire:model'=>'selectedJenisKandidat']) !!}
                    </div> --}}
                  {{-- </div> --}}
                  {{-- <div class="section-field mb-20">
                       <label class="mb-10" for="name">Lembaga* </label>
                       {!! Form::select('lembaga', ['eksekutif' => 'Eksekutif', 'legislatif' => 'Legislatif'], null, [
                        'class' => 'form-control p-2 border-primary',
                    ]) !!} --}}
                   {{-- </div> --}}
                   @livewire('selectwilayahkandidat')
                  {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                  {!! Form::close() !!}
                   <p class="mt-20 mb-0">Tekan simpan untuk lanjut ke form selanjutnya</a></p>
                </div>
                 <hr>
              </div>
            </div>
        </div>
      </section>
     
    
    <!--=================================
     style-customizer  -->
   
    <!--=================================
     jquery -->
    
    <!-- jquery -->
    <script src="js/jquery-3.6.0.min.js"></script>
    
    <!-- plugins-jquery -->
    <script src="js/plugins-jquery.js"></script>
    
    <!-- plugin_path -->
    <script>var plugin_path = 'js/';</script>
    
    <!-- Style Customizer -->
    <script src="js/style-customizer.min.js"></script>
    
    <!-- custom -->
    <script src="js/custom.js"></script>
    {{-- @include('layouts.js') --}}

    @include("web.frontend.layouts.js")
    @livewireScripts

  </body></html>