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
        <div class="flex flex-row sm:w-[1000px] sm:h-[700px] shadow-md bg-primary-100 sm:rounded-md">
            <div class="sm:w-[530px] bg-gradient-to-r from-primary-400 via-primary-500 to-primary-600 sm:rounded-l-md">

                <h1 class="font-primary text-4xl text-neutral-100">Seja bem-vindo de volta!</h1>
            </div>

            <div class="w-full sm:w-[470px] mt-6 pt-30 px-12 py-12 bg-primary-100 overflow-hidden sm:rounded-r-md">
                @yield('content')
            </div>
        </div>

        <div class="mt-10 text-center text-sm text-neutral-500">
            <p>&copy; {{ date('Y') }} FluencyPath. Todos os direitos reservados.</p>
        </div>
    </div>
</body>

</html>