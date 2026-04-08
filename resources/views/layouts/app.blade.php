<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | Admin</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] { display: none !important; }
            
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f7fa;
            }

            /* Paksa Navbar berada di lapisan terdepan dari semua file */
            .main-nav-wrapper {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 9999999;
                pointer-events: auto !important;
            }

            /* Beri ruang agar konten tidak tertutup navbar fixed */
            .content-wrapper {
                position: relative;
                z-index: 1;
                padding-top: 96px; /* Tinggi Navbar kamu (h-24 = 96px) */
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            
            <div class="main-nav-wrapper">
                @include('layouts.navigation')
            </div>

            <div class="content-wrapper">
                @isset($header)
                    <header class="bg-white border-b border-slate-100">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-2xl font-black text-sulteng-blue uppercase">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <main>
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>