<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Admin CIKASDA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f4f7fa; 
            margin:0; 
        }

        /* 1. Navbar Fixed yang Mutlak Terdepan */
        .nav-fixed-container { 
            position: fixed; 
            top: 0; 
            width: 100%; 
            z-index: 999999; 
            pointer-events: auto !important; 
        }

        /* 2. Content Container Diberi Jarak Atas agar TIDAK MENINDIH Navbar */
        .main-content-container { 
            position: relative; 
            z-index: 10; 
            padding-top: 96px; /* 96px adalah tinggi h-24 Navbar kamu */
        }

        /* Desain Scrollbar Premium */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #003366; }
    </style>
</head>
<body class="antialiased selection:bg-amber-400 selection:text-sulteng-blue">
    <div class="min-h-screen">
        
        <div class="nav-fixed-container">
            @include('layouts.navigation')
        </div>

        <div class="main-content-container">
            @isset($header)
                <header class="bg-white/80 backdrop-blur-md border-b border-slate-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="text-[10px] font-black text-amber-500 uppercase tracking-[0.4em] mb-1">Administrator Area</div>
                        <div class="text-2xl font-black text-sulteng-blue tracking-tighter uppercase">
                            {{ $header }}
                        </div>
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