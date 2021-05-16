<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dart Vaders ') }}@yield('title')
    </title>

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="favicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">


    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NSKH3WX');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F6DZ94FNWZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-F6DZ94FNWZ');
    </script>

</head>
<!-- body -->
<body class="main-layout">
<!-- loader  -->

<!--
<div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="" /></div>
</div>
-->

<!-- end loader -->
<!-- header -->
<header>
    <!-- header inner -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 logo_section">
                <div class="full">
                    <div class="center-desk">
                        <div class="logo"> <a href="/"><img class="img-fluid" style="max-height: 7rem" src="/img/logo.jpeg" alt="LOGO"></a> </div>
                    </div>
                </div>
            </div>
            <div class="col">
                @include('layouts.navigation')
            </div>
        </div>
    </div>
    <!-- end header inner -->
</header>
<!-- end header -->
<!-- section -->
<div class="section layout_padding">
    <div class="container">
        @yield('content')
    </div>
</div>
<!-- end section -->
<!-- footer -->
<footer>
    <div class="container">
    </div>
</footer>
<div class="cpy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><a href="/page/impressum">Impressum</a> | <a href="/page/datenschutz">Datenschutz</a> | Copyright © {{ date('Y') }} DartVaders</p>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
<!-- Javascript files-->
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery-3.0.0.min.js"></script>
<script src="/js/plugin.js"></script>
<!-- Scrollbar Js Files -->
<script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/custom.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?theme=momh&tracking=1&always=1&showNoConsent=1&noConfirm=1&remember=365&privacyPage=%2Fpage%2Fdatenschutz"></script>
</body>
</html>
