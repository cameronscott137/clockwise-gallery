<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')"</title>

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
    <meta property="og:image" content="@yield('image', 'https://clockwiseprod.s3.amazonaws.com/media/gallery/_1573572895_lg.jpg')" />
    <meta property="og:image:alt" content="{{ config('app.name') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="@yield('description', 'Clockwise is a custom apparel company that prints,
stitches, and ships in Pittsburgh, PA.')" />
    <meta name="twitter:title" content="{{ config('app.name') }} | @yield('title')" />
    <meta name="twitter:site" content="{{ config('app.url') }}" />
    <meta name="twitter:image" content="@yield('image', 'https://clockwiseprod.s3.amazonaws.com/media/gallery/_1573572895_lg.jpg')" />
    <meta name="twitter:creator" content="@clockwisetees" />

</head>

<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>