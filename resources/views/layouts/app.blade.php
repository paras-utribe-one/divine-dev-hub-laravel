<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <script>document.documentElement.classList.add('js');</script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Divine Dev Hub — Software Development & Digital Engineering')</title>
        <meta name="description" content="@yield('description', 'Divine Dev Hub designs and builds cloud-native applications, AI-driven solutions and modern e-commerce platforms — end-to-end, from strategy to launch.')">
        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Divine Dev Hub">
        <meta property="og:title" content="@yield('title', 'Divine Dev Hub — Software Development & Digital Engineering')">
        <meta property="og:description" content="@yield('description', 'Divine Dev Hub designs and builds cloud-native applications, AI-driven solutions and modern e-commerce platforms — end-to-end, from strategy to launch.')">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('images/logo-divinedevhub.png') }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', 'Divine Dev Hub — Software Development & Digital Engineering')">
        <meta name="twitter:description" content="@yield('description', 'Divine Dev Hub designs and builds cloud-native applications, AI-driven solutions and modern e-commerce platforms — end-to-end, from strategy to launch.')">
        <meta name="twitter:image" content="{{ asset('images/logo-divinedevhub.png') }}">

        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        <link rel="icon" href="{{ asset('images/favicon-256.png') }}" type="image/png" sizes="256x256">
        <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

        @fonts

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                html { background-color: #ffffff; }
            </style>
        @endif
    </head>
    <body class="bg-background font-sans text-text-primary antialiased">
        <a
            href="#main-content"
            class="sr-only z-[100] rounded-md bg-primary px-4 py-2 text-sm font-semibold text-white focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
        >
            Skip to main content
        </a>

        <x-header />

        <main id="main-content">
            @yield('content')
        </main>

        <x-footer />

        <x-back-to-top />
    </body>
</html>
