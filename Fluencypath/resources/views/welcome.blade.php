<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FluencyPath</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-primary-100 antialiased flex flex-col min-h-screen">
    <div class="flex-grow">
        <nav x-data="{ open: false }" class="bg-primary-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-[80px]">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            </a>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                                {{ __('Quem somos') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <div class="inline-flex justify-center items-center gap-5">
                        <div class="space-x-2">
                            <a
                                href="{{ route('login') }}"
                                class="w-[120px] h-[40px] font-primary font-semibold text-primary-700  text-center text-base hover:text-primary-400 focus:text-primary-800 px-6 py-4">
                                {{ __('Entrar') }}
                            </a>

                        </div>

                        <div class="space-x-2">
                            <a
                                href="{{ route('register') }}"
                                class="w-[120px] h-[40px] font-primary text-primary-300  text-center text-base bg-primary-700 hover:bg-primary-400 focus:bg-primary-800 px-6 py-4 rounded-lg">
                                {{ __('Cadastre-se') }}
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main class="mt-10">
        <div class="container mx-auto px-2">
            <section class="w-full h-[820px] mt-10">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-center">
                        <div class="flex flex-col w-[710px] h-[650px] justify-start mr-5">
                            <div class="py-10 mb-10">
                                <h1 class="text-cyan-950 font-primary font-bold text-5xl py-10">
                                    Uma nova forma de aprender inglês, baseada em ciência!
                                </h1>
                                <p class="font-secondary font-normal text-lg text-neutral-400">
                                    Baseado na teoria da aquisição da linguagem de Stephen Krashen.
                                </p>
                            </div>
                            <div class="py-10 mt-10">
                                <div class="w-full h-[50px] flex justify-start items-start">
                                    <a
                                        href="{{ route('register') }}"
                                        class="w-[170px] h-[50px] font-primary text-primary-300  text-center text-base bg-primary-700 hover:bg-primary-400 focus:bg-primary-800 px-6 py-4 rounded-lg">
                                        Comece Agora
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-center bg-stone-50 rounded-3xl shadow-lg w-[530px] h-[650px] ml-5">
                            <img src="{{URL::asset('images/student-photo.png')}}" alt="Mulher" class="w-full h-full object-cover rounded-3xl">
                        </div>
                    </div>
                </div>
            </section>

            <section class="my-16">
                <div class="flex flex-col">
                    <div class="text-center py-10">
                        <h2 class="text-cyan-950 font-primary font-bold text-4xl py-10">Domine o Inglês: Leia, Ouça e Pratique</h2>
                        <p>Combine leitura, escuta e prática para um aprendizado completo</p>
                    </div>
                    <div>
                        <div class="flex flex-row">
                            <div class="w-xs h-[110px] bg-stone-50 rounded-lg p-4">
                                <div class="flex flex-row mb-2">
                                    <span class="m-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                                        </svg>
                                    </span>
                                    <span class="m-1">Textos com áudio</span>
                                </div>
                                <div class="m-1">
                                    <p>Estude textos com áudios sincronizados.</p>
                                </div>
                            </div>

                            <div class="">
                                <img src="{{URL::asset('images/woman.png')}}" alt="Mulher">
                            </div>

                            <div class="w-xs h-[110px] bg-stone-50 rounded-lg p-4">
                                <div class="flex flex-row mb-2">
                                    <span class="m-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                                        </svg>
                                    </span>
                                    <span class="m-1">Flashcards</span>
                                </div>
                                <div class="m-1">
                                    <p>Revise palavras dando foco para elas.</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-xs h-[110px] bg-stone-50 rounded-lg p-4">
                            <div class="flex flex-row mb-2">
                                <span class="m-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                                    </svg>
                                </span>
                                <span class="m-1">SparkPath</span>
                            </div>
                            <div class="m-1">
                                <p>Acompanhe o seu desempenho através do SparkPath.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="w-full h-[620px]">
                <div class="items-center justify-center flex flex-col py-10">
                    <h2 class="text-cyan-950 text-center font-primary font-bold text-4xl">Entre em contato</h2>
                    <form action="{{ route('contact.send') }}" method="POST" class="w-full max-w-lg mt-5 bg-white p-6 rounded-lg shadow-lg">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700">Nome</label>
                            <input type="text" name="name" required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email</label>
                            <input type="email" name="email" required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Assunto</label>
                            <input type="text" name="subject" required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Mensagem</label>
                            <textarea name="message" required class="w-full p-2 border rounded"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary-700 text-white p-2 rounded-lg hover:bg-primary-500">Enviar</button>
                    </form>
                </div>
            </section>

            <section class="w-full h-[800px]">
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-cyan-950 text-center font-primary font-bold text-4xl">Depoimentos</h2>
                    <div class="grid grid-cols-4 gap-5 my-20">
                        <div class="p-4">
                            <div class="flex flex-col">
                                <h3>Fácil aprendizagem</h3>
                                <p>Uma plataforma simples de se usar e fluída.</p>
                                <hr>
                            </div>
                            <div class="flex flex-row">
                                <img src="{{URL::asset('images/woman-photo1.jpeg')}}" alt="Mulher" class="w-14 h-14 rounded-full object-cover">
                                <span>Roberta Miranda</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex flex-col">
                                <h3>Abordagem excepcional</h3>
                                <p>Textos sincronizados foi diferencial na maneira de entendimento.</p>
                                <hr>
                            </div>
                            <div class="flex flex-row">
                                <img src="{{URL::asset('images/man-photo1.jpg')}}" alt="Homem" class="w-14 h-14 rounded-full object-cover">
                                <span>Paulo Henrique</span>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="flex flex-col">
                                <h3>Favoritar</h3>
                                <p>Adorei a possibilidade de favoritar os textos do meu interesse.</p>
                                <hr>
                            </div>
                            <div class="flex flex-row">
                                <img src="{{URL::asset('images/woman-photo2.jpg')}}" alt="Mulher" class="w-14 h-14 rounded-full object-cover">
                                <span>Julia Almeida</span>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="flex flex-col">
                                <h3>Flashcards</h3>
                                <p>Senti uma grande evolução no meu vocabulário.</p>
                                <hr>
                            </div>
                            <div class="flex flex-row">
                                <img src="{{URL::asset('images/man-photo2.jpg')}}" alt="Homem" class="w-14 h-14 rounded-full object-cover">
                                <span>José Felipe</span>
                            </div>
                        </div>

                    </div>

                    <div class="py-10 mt-10">
                        <div class="w-full h-[50px] flex justify-center items-center">
                            <a
                                href="{{ route('register') }}"
                                class="w-[170px] h-[50px] font-primary text-primary-300  text-center text-base bg-primary-700 hover:bg-primary-400 focus:bg-primary-800 px-6 py-4 rounded-lg">
                                Aprenda Já
                            </a>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    </div>
    @include('layouts.footer')
</body>

</html>
