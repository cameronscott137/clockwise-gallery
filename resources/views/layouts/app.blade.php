<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.typekit.net/vto7vtu.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#1f1f1f">
    <meta name="theme-color" content="#ffffff">

    <meta name="description" content="@yield('description', 'Clockwise is a custom apparel company that prints,
stitches, and ships in Pittsburgh, PA.')" />
    <link rel="canonical" href="{{ request()->url() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ config('app.name') }} | @yield('title')" />
    <meta property="og:description" content="@yield('description', 'Clockwise is a custom apparel company that prints,
stitches, and ships in Pittsburgh, PA.')" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:image" content="@yield('image', 'https://clockwiseprod.s3.amazonaws.com/media/gallery/_1573572895_sm.jpg')" />
    <meta property="og:image:alt" content="@yield('description', 'Clockwise is a custom apparel company that prints,
stitches, and ships in Pittsburgh, PA.')" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="@yield('description', 'Clockwise is a custom apparel company that prints,
stitches, and ships in Pittsburgh, PA.')" />
    <meta name="twitter:title" content="{{ config('app.name') }} | @yield('title')" />
    <meta name="twitter:site" content="{{ config('app.url') }}" />
    <meta name="twitter:image" content="@yield('image', 'https://clockwiseprod.s3.amazonaws.com/media/gallery/_1573572895_sm.jpg')" />
    <meta name="twitter:creator" content="@clockwisetees" />


    @if (auth()->guest())
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154014147-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-154014147-1');
    </script>
    @endif

</head>

<body class="bg-gray-100 h-screen antialiased leading-none">

    <div id="app">

        <header class="container lg:flex lg:items-center lg:justify-between mx-auto px-6 md:px-0 py-4">
            <div class="flex items-center w-full lg:w-auto lg:block">
                <a href="{{ url('/') }}">
                    <img class="w-48 sm:w-64 h-auto" src="{{ asset('img/icon-logo_with_text.svg') }}" alt="Clockwise Logo">
                </a>
                <a href="#" class="lg:hidden ml-auto" aria-label="Open up the mobile navigation menu" data-nav-toggle="">
                    <svg width="26" height="20" class="nav-primary__toggle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 10">
                        <path fill="#1f1f1f" d="M1.1 4h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1C.7 6 .3 5.7.3 5.2v-.4c0-.5.4-.8.8-.8zm0 3.6h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1c-.5 0-.9-.4-.9-.9v-.3c.1-.5.5-.9.9-.9zm0-7.3h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1c-.4 0-.8-.4-.8-.9v-.3c0-.5.4-.9.8-.9z"></path>
                    </svg>
                </a>
            </div>
            <div class="hidden lg:flex lg:items-center" data-nav-collapse="">
                <div class="menu-primary-container">
                    <nav itemscope="" itemtype="http://www.schema.org/SiteNavigationElement" class="lg:flex lg:flex-wrap lg:pl-30 py-4 lg:py-0">

                        <dropdown></dropdown>

                        <li class="px-3 lg:px-6 pb-3 lg:pb-0 relative list-none">
                            <a class="text-green font-futura uppercase text-base no-underline tracking-wider" href="https://gallery.clockwise.io" itemprop="url">Our Work</a>
                        </li>
                        <li class="px-3 lg:px-6 pb-3 lg:pb-0 relative list-none">
                            <a class="text-black font-futura uppercase text-base no-underline tracking-wider" href="https://clockwise.io/process/" itemprop="url">Process</a>
                        </li>
                        <li class="px-3 lg:px-6 pb-3 lg:pb-0 relative list-none">
                            <a class="text-black font-futura uppercase text-base no-underline tracking-wider" href="https://clockwise.io/testimonials/" itemprop="url">Testimonials</a>
                        </li>
                        <li class="px-3 lg:px-6 pb-3 lg:pb-0 relative list-none">
                            <a class="text-black font-futura uppercase text-base no-underline tracking-wider" href="https://clockwise.io/contact/" aria-current="page" itemprop="url">Contact</a>
                        </li>
                    </nav>
                </div>
                <li class="m-0 md:ml-4 p-0 list-none">
                    <a class="mb-4 md:mb-0 block text-base tracking-wide uppercase font-futura mx-2 bg-green text-white hover:text-white leading-none py-3 px-4 rounded" href="https://app.clockwise.io" itemprop="url" target="_blank">Order</a>
                </li>
            </div>
        </header>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Google Analytics-->
    @if (auth()->guest())
    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/5666570.js"></script>
    <!-- End of HubSpot Embed Code -->
    @endif

</body>

</html>