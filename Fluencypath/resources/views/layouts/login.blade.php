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

    <div class="min-h-screen md:flex-row flex flex-col sm:justify-center items-center pt-10 sm:pt-0 bg-primary-200 ">

        <div class="flex flex-row w-auto shadow-md bg-primary-900 xl:rounded-md">

            <div class="xl:w-[500px] xl:h-[600px] relative sm:rounded-l-md md:w-1/2">
                <a href="{{ route('/') }}">
                    <img src="{{URL::asset('images/logo-cor-branca-primaria-horizontal.svg')}}" alt="Logo" class="h-8 absolute w-auto object-contain m-8">
                </a>
                <h1 class="flex items-center absolute justify-center bottom-10 top-20 font-primary font-medium text-center text-4xl text-neutral-100 m-20">Seja bem-vindo de volta!</h1>
                <img src="{{URL::asset('images/login-bg.jpg')}}" class="w-full h-full">
            </div>

            <div class="w-full sm:w-[470px] xl:h-[600px] pt-30 px-12 py-12 bg-primary-100 overflow-hidden sm:rounded-r-md  md:w-1/2 ">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="w-full text-center text-sm text-neutral-500 p-10">
        <p>&copy; {{ date('Y') }} FluencyPath. Todos os direitos reservados.</p>
    </div>

</body>

</html>