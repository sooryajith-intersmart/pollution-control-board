<!doctype html>
<html lang="en" dir="ltr">
<!-- <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script> -->
<!-- 
 ██╗███╗░░██╗████████╗███████╗██████╗░░██████╗███╗░░░███╗░█████╗░██████╗░████████╗
 ██║████╗░██║╚══██╔══╝██╔════╝██╔══██╗██╔════╝████╗░████║██╔══██╗██╔══██╗╚══██╔══╝
 ██║██╔██╗██║░░░██║░░░█████╗░░██████╔╝╚█████╗░██╔████╔██║███████║██████╔╝░░░██║░░░
 ██║██║╚████║░░░██║░░░██╔══╝░░██╔══██╗░╚═══██╗██║╚██╔╝██║██╔══██║██╔══██╗░░░██║░░░
 ██║██║░╚███║░░░██║░░░███████╗██║░░██║██████╔╝██║░╚═╝░██║██║░░██║██║░░██║░░░██║░░░
 ╚═╝╚═╝░░╚══╝░░░╚═╝░░░╚══════╝╚═╝░░╚═╝╚═════╝░╚═╝░░░░░╚═╝╚═╝░░╚═╝╚═╝░░╚═╝░░░╚═╝░░░
 -->

<head>
    <title>@yield('title')</title>
    <style>
    /* Inline critical CSS here */
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon"> -->
    <meta name="description" itemprop="description" content="">
    <link rel="canonical" href="">

    <meta name="keywords" itemprop="keywords" content="Home">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token"
        content="E4DghxYW3Gt8dec_9UV3TyEK_kfhikX92nxw5mSwSyxD0anze3KIBzMYuFaWNU8-TH_MIqf9fLiOKkeIJ4U6ew==">
    <!-- <meta name="robots" content="noindex, nofollow"> -->

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <!-- <meta property="og:image" content="space.webp" />
    <meta property="og:image:width" content="2334">
    <meta property="og:image:height" content="1646">
    <meta property="og:image:type" content="image/webp"> -->
    <meta property="og:site_name" content="Real-time Pollution Monitor" />

    <meta name="robots" content="max-image-preview:large" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="og_img.png" />
    <meta name="twitter:image:alt" content="AQI" />


    <meta name="mobile-web-app-capable" content="yes">

    <!-- <link rel="manifest" href="manifest.webmanifest" /> -->

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#000000">

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "Real-time Pollution Monitor",
        "description": ""
    }
    </script>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <!-- INCLUDES -->
    <!-- <link rel="stylesheet preload" type="text/css" href="{{ asset('frontend/css/app.min.css') }}" as="style" media="all"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/app.min.css') }}">
    @stack('css')
</head>

<body>

    <div id="viewport">
        @yield('content')
    </div>

    <script async type="text/javascript" src="{{ asset('frontend/js/app.js') }}"></script>
    <script async type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>
    @stack('js')
</body>

</html>