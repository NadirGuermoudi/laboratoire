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
        <title>@yield('title')</title>

        <!-- Favicon -->
        {{-- <link rel="shortcut icon" href="images/favicon.ico" /> --}}

        <!-- font -->

        {{-- ibrahim: JQuery include, must be in before bootstrap insclude I guess, so I've added it before --}}

        

        <link rel="stylesheet" type="text/css" href="{{asset('css/plugins-css.css')}}" />

        <!-- Plugins -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/plugins-css.css')}}" />

        <!-- revoluation -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/settings.css')}}" media="screen" />

        <!-- Typography -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/typography.css')}}" />

        <!-- Shortcodes -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/shortcodes/shortcodes.css')}}" />

        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />

        <!-- Responsive -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}" />
    </head>

    <body>
       

        <div class="wrapper">

            <div id="pre-loader">
                <img src="loader.svg" alt="">
            </div>

            <header id="header" class="header transparent">
                @include('layouts/front/partials/_topbar')
                @include('layouts/front/partials/_menu')
                @yield('header')
            </header>
            <br/><br/><br/><br/><br/><br/><br/>
            @yield('content')

        </div>
        <div id="back-to-top"><a class="top arrow" href="{{asset('#top')}}"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>

        <!--=================================
         jquery -->

         {{-- jquery's comment --}}
        <script type="text/javascript" src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

        {{-- plugins-jquery comment --}}
        <script type="text/javascript" src="{{ asset('js/plugins-jquery.js') }}"></script>

        {{-- plugin_path comment --}}
        <script type="text/javascript">var plugin_path = '{{url('/')}}/js/';</script>

        {{-- REVOLUTION JS FILES comment --}}
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

        {{-- revolution custom comment --}}
        <script type="text/javascript" src="{{ asset('revolution/js/revolution-custom.js') }}"></script>

        {{-- custom comment --}}
        <script type="text/javascript" src="{{ asset('js/revolution/custom.js') }}"></script>

    </body>
</html>