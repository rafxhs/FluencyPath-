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
            <div class="max-w-7xl mx-auto px-4 sm:px-2 lg:px-2">
                <div class="flex justify-between h-[80px]">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('/') }}">
                            <img src="{{URL::asset('images/logo-primaria-horizontal.svg')}}" alt="Logo" class="h-10 w-auto object-contain">
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
                                <div class="flex gap-7">
                                    <p class="font-secondary font-normal text-lg text-neutral-400">
                                        Baseado na teoria da aquisição da linguagem de Stephen Krashen.
                                    </p>
                                    <a href="{{ 'about' }}">
                                        <x-heroicon-s-arrow-top-right-on-square class="w-6 h-6 text-primary-400" />
                                    </a>
                                </div>
                            </div>
                            <div class="py-10 mt-10">
                                <div class="w-full h-[50px] flex justify-start items-start">
                                    <a
                                        href="{{ route('register') }}"
                                        class="w-[170px] h-[50px] font-primary text-primary-300 items-center text-center text-base bg-primary-700 hover:bg-primary-400 focus:bg-primary-800 py-3 rounded-lg">
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

            <section class="my-16 py-0 mt-0">
                <div class="flex flex-col  justify-center items-center">
                    <div class="text-center py-10">
                        <h2 class="text-cyan-950 font-primary font-bold text-4xl py-10">Domine o Inglês: Leia, Ouça e Pratique</h2>
                        <p>Combine leitura, escuta e prática para um aprendizado completo</p>
                    </div>
                    <div>
                        <div class="flex flex-row justify-center items-center relative ">

                            <div class="w-xs h-[110px] bg-stone-50 border-2 border-[#9FE6E6] rounded-lg p-4 flex flex-col items-center mt-[-150px]">
                                <div class="flex flex-row mb-1">
                                    <span class="m-1">
                                    <x-heroicon-s-speaker-wave class="w-6 h-6 text-primary-400" />
                                    </span>
                                    <span class="m-1">Textos com áudio</span>
                                </div>
                                <div class="m-1 text-center mb-5 mt-0">
                                    <p>Estude textos com áudios sincronizados.</p>
                                </div>
                            </div>

                            <!-- Meio círculo com imagem dentro -->
                            <div class="relative flex justify-center items-center w-[670px] h-[355px] bg-[#9FE6E6] rounded-t-full top-10 ">
                                <img src="{{URL::asset('images/woman.png')}}" alt="Mulher" class="w-auto absolute bottom-0 top-50 right-11 ">

                                <div class="w-[300px] h-[110px] bg-stone-50 border-2 border-[#9FE6E6] rounded-lg p-4 flex flex-col items-center absolute right-8 bottom-6 top-50 ">
                                <div class="flex flex-row mb-1">
                                    <span class="m-1 text-primary-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                                        </svg>
                                    </span>
                                    <span class="m-1">SparkPath</span>
                                </div>
                                <div class="m-1 text-center mb-5 mt-0 ">
                                    <p>Acompanhe o seu desempenho através do SparkPath.</p>
                                </div>
                            </div>

                            </div>
                            
                            <div class="w-xs h-[110px] bg-stone-50 border-2 border-[#9FE6E6] rounded-lg p-4 flex flex-col items-center mt-[-150px]">
                                <div class="flex flex-row items-center mb-1">
                                    <span class="m-1">
                                    <x-heroicon-s-clipboard-document-check class="w-6 h-6 text-primary-400" />
                                    </span>
                                    <span class="m-1">Flashcards</span>
                    
                                </div>
                                <div class="m-1 mb-5 mt-0">
                                    <p>Revise palavras dando foco para elas.</p>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </section>

            <section class="w-full h-auto py-20 bg-primary-300">
                <div class="flex flex-col md:flex-row items-center justify-center px-5">
                    <div class="w-full md:w-1/2 text-center md:text-left px-6 left-10">
                        <h2 class="text-cyan-950 text-center font-primary font-bold text-4xl">Precisa de ajuda? Entre em contato pelo email</h2>
                        <p class="text-gray-700 text-center  mt-2">Envie suas dúvidas, sugestões ou qualquer outro feedback. Sua opinião é muito importante para nós.</p>
                    </div class="w-full md:w-1/2 flex justify-center px-6">
                    <form action="{{ route('contact.send') }}" method="POST" class="w-full max-w-lg mt-5 bg-white p-6 rounded-lg shadow-lg">
                        @csrf
                        <div class="flex flex-row items-center justify-center mb-1 mb-5">
                        <p class="text-cyan-950 font-primary">FluencyPath</p>
                        <span class="m-1">
                        <x-heroicon-s-envelope class="w-6 h-6 text-primary-400" />
                        </span>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Nome</label>
                            <input type="text" name="name" required class="w-full p-2 border border-[#9FE6E6] rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email</label>
                            <input type="email" name="email" required class="w-full p-2 border border-[#9FE6E6] rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Assunto</label>
                            <input type="text" name="subject" required class="w-full p-2 border border-[#9FE6E6] rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Mensagem</label>
                            <textarea name="message" required class="w-full p-2 border border-[#9FE6E6] rounded"></textarea>
                        </div>
                        <button type="submit" class="w-full text-primary-300 bg-primary-700 hover:bg-primary-400 focus:bg-primary-800text-white p-2 rounded-lg ">Enviar</button>
                    </form>
                </div>
            </section>

            <section class="w-full h-[800px] py-20">
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-cyan-950 text-center font-primary font-bold text-4xl">Depoimentos</h2>

                    <div class="grid grid-cols-4 gap-5 my-20">

                        <div class="p-4">
                            <div class="flex flex-col h-[150px]">
                                <h3 class="font-primary font-bold text-xl text-neutral-500">Fácil aprendizagem</h3>
                                <p class="font-primary font-normal text-xl text-neutral-400">Uma plataforma simples de se usar e fluída.</p>
                            </div>
                            <hr>
                            <div class="flex flex-row mt-2">
                                <img src="{{URL::asset('images/woman-photo1.jpeg')}}" alt="Mulher" class="w-14 h-14 rounded-full object-cover">
                                <span class="ml-3 mt-5">Roberta Miranda</span>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="flex flex-col h-[150px]">
                                <h3 class="font-primary font-bold text-xl text-neutral-500">Abordagem excepcional</h3>
                                <p class="font-primary font-normal text-xl text-neutral-400">Textos sincronizados foi diferencial na maneira de entendimento.</p>
                            </div>
                            <hr>
                            <div class="flex flex-row mt-2">
                                <img src="{{URL::asset('images/man-photo1.jpg')}}" alt="Homem" class="w-14 h-14 rounded-full object-cover">
                                <span class="ml-3 mt-5">Paulo Henrique</span>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="flex flex-col h-[150px]">
                                <h3 class="font-primary font-bold text-xl text-neutral-500">Favoritar</h3>
                                <p class="font-primary font-normal text-xl text-neutral-400">Adorei a possibilidade de favoritar os textos do meu interesse.</p>
                            </div>
                            <hr>
                            <div class="flex flex-row mt-2">
                                <img src="{{URL::asset('images/woman-photo2.jpg')}}" alt="Mulher" class="w-14 h-14 rounded-full object-cover">
                                <span class="ml-3 mt-5">Julia Almeida</span>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="flex flex-col h-[150px]">
                                <h3 class="font-primary font-bold text-xl text-neutral-500">Flashcards</h3>
                                <p class="font-primary font-normal text-xl text-neutral-400">Senti uma grande evolução no meu vocabulário.</p>
                            </div>
                            <hr>
                            <div class="flex flex-row mt-2">
                                <img src="{{URL::asset('images/man-photo2.jpg')}}" alt="Homem" class="w-14 h-14 rounded-full object-cover">
                                <span class="ml-3 mt-5">José Felipe</span>
                            </div>
                        </div>

                    </div>

                    <div class="py-10 mt-10">
                        <div class="w-full h-[50px] flex justify-center items-center">
                            <a
                                href="{{ route('register') }}"
                                class="w-[170px] h-[50px] font-primary text-primary-300  text-center text-base bg-primary-700 hover:bg-primary-400 focus:bg-primary-800 py-3 rounded-lg">
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
