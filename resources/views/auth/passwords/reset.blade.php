<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="britech base project" />
<meta name="description" content="britech base project" />
<meta name="author" content="britech.id" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Login || {{ env('APP_NAME') }}</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('image/logo/small-icon.png') }}" />

<!-- font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
{{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800">--}}

    @include('web.frontend.layouts.css')

    @yield('css')

</head>
    <body>
        <body class="wide-layout">	
            <div class="header-preview" style="display: none;">
                <div class="preview-logo"><a href="https://1.envato.market/rNEb3"><img width="152" src="https://themes.potenzaglobalsolutions.com/images/envato_market-logo.svg" alt="Envato Market Logo"></a></div>
                <div class="preview-actions">
                    <div class="actions-buy"><a class="primary-btn" href="https://1.envato.market/rNEb3">Buy Now $17</a></div>
                    <div class="actions-remove"><a class="frame-close" href="javascript:void(0)"><span>Remove Frame</span></a></div>
                </div>
            </div>
            <style>
            body{padding:0; margin:0;}
            .header-preview {height: 55px;  background-color:#262626;  z-index: 99; line-height: 55px;}
            .preview-logo {margin-left:20px; float:left;}
            .preview-logo a{vertical-align: top;}
        
            /*------------------------*/
            /* Buy Button */
            /*------------------------*/
            .preview-actions{float:right;}
            .actions-buy{display: inline-block; padding: 0 20px;}
            .actions-buy .primary-btn{box-shadow:0 2px 0 #6f9a37; background-color:#82b440; position:relative; font-size:14px; padding:5px 20px; line-height:1.5;
                color: #ffffff; text-decoration:none !important; display:inline-block; margin:0; border:0; border-radius:4px; -webkit-transition: all .25s ease; -moz-transition: all .25s ease;  transition: all .25s ease;}
            .actions-buy .primary-btn:hover {background-color: #7aa93c;}
                
            /*------------------------*/
            /* Close Frame */
            /*------------------------*/
            .actions-remove{display: inline-block; padding: 0 20px; border-left: 1px solid #333;}
            .actions-remove a{position: relative; padding-left: 20px; color: #999; font-size:12px; text-decoration: none; font-weight:500; line-height:20px;
            -webkit-transition: all .25s ease; -moz-transition: all .25s ease;  transition: all .25s ease;}
            .actions-remove a:hover{color:#ffffff;}
        
            .actions-remove a:before, 
            .actions-remove a:after{position: absolute; left: 5px; top: 3px; content:""; height: 12px; width:3px; background-color:#ffffff;}
            .actions-remove a:before{transform: rotate(45deg);}
            .actions-remove a:after {transform: rotate(-45deg);}
        
            /*------------------------*/
            /* Responsive */
            /*------------------------*/
            @media (max-width: 600px) { 
                .preview-logo a{width:130px; height:18px; background-size: 130px 18px;}
                .actions-buy, .actions-remove{padding: 0 10px;}
                .actions-buy .primary-btn{font-size: 12px; padding: 5px 10px;}
                .actions-remove a span{display:none !important;}
            }
            @media(max-width:479px) { 
                .preview-logo {
                   display: none;
                }
            }
            </style>
        
        
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-557RCPW"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        
         <div class="wrapper">
        
        <!--=================================
         preloader -->
        
        <div id="pre-loader" style="display: none;">
            <img src="images/pre-loader/loader-01.svg" alt="">
        </div>
        
        <!--=================================
         preloader -->
        
        
        <!--=================================
         login-->
        
        <section class="height-100vh d-flex align-items-center page-section-ptb login login-gradient">
          <div class="container">
               <div class="col-lg-4 col-md-6 white-bg">
                <div class="login-fancy pb-40 clearfix">
                <form method="post" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                <h3 class="mb-30">Reset Password</h3>
                 <div class="section-field mb-20">
                     <label class="mb-10" for="name">Email* </label>
                     <input id="email" 
                     value="{{ $email ?? old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           type="text" placeholder="Masukkan Email" name="email">
                    </div>
                    <div class="section-field mb-20">
                     <label class="mb-10">New Password* </label>
                     <input id="password" class="form-control  @error('password') is-invalid @enderror" type="password" placeholder="New Password" name="password">
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="section-field mb-20">
                        <label class="mb-10">Confirm Password* </label>
                        <input id="password_confirmation" class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
                       </div>
                    <div class="section-field">
                    </div>
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                        <p class="mt-20 mb-0">Don't have an account? <a href="{{ url('/register') }}"> Create one here</a></p>
                </div>
              </div>
            </form>
          </div>
        </section>
        </div>
     @include('layouts.js')

     @include("web.frontend.layouts.js")

     @yield("scripts")
     <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

</body>
</html>

