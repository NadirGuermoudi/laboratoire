<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Mots cles" />
        <meta name="description" content="Une desc" />
        <meta name="author" content="NHB" />
        <link rel="icon" type="image/png" href="{{asset('easy.png')}}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>{{ $title or 'Laboratoire de recherche' }}</title>

        <!-- Favicon -->
        {{-- <link rel="shortcut icon" href="images/favicon.ico" /> --}}

        <!-- font -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800">

        <!-- Plugins -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins-css.css') }}" />

        <!-- revoluation -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/settings.css') }}" media="screen" />

        <!-- Typography -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/typography.css') }}" />

        <!-- Shortcodes -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/shortcodes/shortcodes.css') }}" />

        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

        <!-- Responsive -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    </head>

    <body>

        <div class="wrapper">

            <div id="pre-loader">
                <img src="loader.svg" alt="">
            </div>

            <header id="header" class="header transparent">
                @include('layouts/front/partials/_topbar')
                @include('layouts/front/partials/_menu')
            </header>
            <br/><br/><br/><br/><br/><br/><br/>
            @yield('content', 'pas de contenue')

        </div>
        <div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>

        <!--=================================
         jquery -->

        <!-- jquery -->
        <script type="text/javascript" src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

        <!-- plugins-jquery -->
        <script type="text/javascript" src="{{ asset('js/plugins-jquery.js') }}"></script>

        <!-- plugin_path -->
        <script type="text/javascript">var plugin_path = 'js/';</script>
         

        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

        <!-- revolution custom --> 
        <script type="text/javascript" src="{{ asset('revolution/js/revolution-custom.js') }}"></script> 

        <!-- custom -->
        <script type="text/javascript" src="{{ asset('js/revolution/custom.js') }}"></script>

    </body>
</html>