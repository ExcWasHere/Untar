<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">
        <div class="w-full px-6 py-4 mt-6 overflow-hidden sm:max-w-md sm:rounded-lg">
            <div class="flex justify-center mb-6">
                <a href="/" class="text-3xl font-bold text-blue-600">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            
            @yield('content')
        </div>
    </div>
</body>
</html>