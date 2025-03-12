<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FluencyPath') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-primary-200">
        <div class="w-full sm:w-[550px] sm:h-[700px] mt-6 pt-30 py-12 bg-primary-100 shadow-xl  overflow-hidden sm:rounded-md px-14">
            @yield('content')
        </div>
        <div class="text-center text-sm text-neutral-600 p-10">
            <p>&copy; {{ date('Y') }} FluencyPath. Todos os direitos reservados.</p>
        </div>
    </div>
</body>

</html>