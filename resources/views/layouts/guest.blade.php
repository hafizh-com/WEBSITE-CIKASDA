<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website CIKASDA Sulteng</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-900 overflow-x-hidden">
    
    @include('layouts.guest-navigation')

    <main>
        {{ $slot }}
    </main>

    @include('layouts.guest-footer')

</body>
</html>