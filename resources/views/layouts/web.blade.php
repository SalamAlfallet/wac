<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/preview/theme/hikers/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jul 2019 15:11:06 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>{{$data['title_value']}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">


    @yield('style')
</head>

<body>
    <div class="site-wrap">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <header class="site-navbar pt-3" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-6 col-xl-6 logo">
                        <h1 class="mb-0"><a href="{{route('home.page')}}" class="text-black h2 mb-0">{{$data['siteTitle']}}</a></h1>
                    </div>
                    <div class="col-6 mr-auto py-3 text-right" style="position: relative; top: 3px;">
                        <div class="social-icons d-inline">
                            <a href="{{$data['facebook']}}"><span class="icon-facebook"></span></a>
                            <a href="{{$data['twitter']}}"><span class="icon-twitter"></span></a>
                            <a href="{{$data['instagram']}}"><span class="icon-instagram"></span></a>
                        </div>
                        <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-xl-none"><span class="icon-menu h3"></span></a>
                    </div>
                </div>
                @php
                $catsmnue =App\Category::latest()->limit(5)->get();
                @endphp
                <div class="col-12 d-none d-xl-block border-top">
                    <nav class="site-navigation text-center " role="navigation">
                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block mb-0">
                            <li class="active"><a href="{{ route('home.page')}}">Homepage</a></li>
                            @foreach($catsmnue as $mnue)
                            <li><a href="{{ route('postsOfcategory', [ 'id' => $mnue->id ]) }}">{{$mnue->name}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
    </header>

    @yield('slider_item')



    @yield('content')

    <div class="site-footer">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <p>

                        Copyright &copy; <script type="610a7a4226ae0d1db738d91a-text/javascript">
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>

                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/jquery-migrate-3.0.1.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/popper.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/jquery.stellar.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/aos.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script src="{{asset('assets/js/main.js')}}" type="610a7a4226ae0d1db738d91a-text/javascript"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="610a7a4226ae0d1db738d91a-text/javascript"></script>
    <script type="610a7a4226ae0d1db738d91a-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="{{asset('assets/js/roket.min.js')}}" data-cf-settings="610a7a4226ae0d1db738d91a-|49" defer=""></script>

    @yield('script')
    </body>

<!-- Mirrored from colorlib.com/preview/theme/hikers/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jul 2019 15:11:14 GMT -->

</html>
