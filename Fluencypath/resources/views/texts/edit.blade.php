@extends('layouts.app')

@section('content')
<section class="container max-w-7xl mx-auto px-4 sm:px-10 lg:px-10">
    <nav class="w-full">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse pt-10">
            <li>
                <div class="flex items-center">
                    <a href="{{route('texts.index')}}" class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2 dark:hover:text-neutral-300">Textos</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <x-heroicon-s-chevron-right class="w-5 h-5 text-neutral-300" />
                    <a href="{{route('texts.index',  $text->id)}}" class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2 dark:hover:text-neutral-300">{{ $text->title }}</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-heroicon-s-chevron-right class="w-5 h-5 text-neutral-300" />
                    <span class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2">Editar Texto</span>
                </div>
            </li>
        </ol>
    </nav>

    <section class="flex py-10">
        <div class="w-[1240px] h-[900px]">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg py-6 px-20">
                <form action="{{ route('texts.update', $text->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="w-full inline-flex justify-between items-center">
                        <h1 class="my-4 font-primary font-medium text-2xl text-neutral-600">Editar Texto</h1>
                        <label for="audio-upload" class="w-[170px] h-[45px] gap-1 inline-flex items-center justify-center px-2 py-2 bg-primary-700 font-primary font-500 border border-transparent rounded-lg text-primary-300  text-center text-sm tracking-widest hover:bg-primary-400 focus:bg-primary-400 active:bg-primary-900 focus:outline-none transition ease-in-out cursor-pointer duration-150">
                            <x-heroicon-o-microphone class="w-5 h-5 text-primary-100" />
                            <span>Adicionar áudio</span>
                        </label>
                        <input id="audio-upload" type="file" name="audio" accept="audio/*" required class="hidden">
                    </div>
                    <label for="title" class="text-sm font-semibold">Título</label>
                    <input type="text" name="title" value="{{ $text->title }}" required class="border border-neutral-300 p-2 rounded-lg focus:ring-neutral-300 focus:ring-opacity-100 focus:ring-1 focus:outline-none">

                    <label for="tag" class="text-sm font-semibold">Tags</label>
                    <input id="tags-input" name="tag" value="{{ $text->tag }}" placeholder="Add tags" required class="border border-neutral-300 p-2 rounded-lg focus:ring-neutral-300 focus:ring-opacity-100 focus:ring-1 focus:outline-none">

                    <label for="content" class="text-sm font-semibold">Texto</label>
                    <textarea name="content" required class="h-[400px] text-justify border border-neutral-300 p-8 rounded-lg">{{ $text->content }}</textarea>

                    <div class="mt-20 flex justify-end items-end">
                        <button type="submit" class="sm:w-[150px] sm:h-[40px] inline-flex items-center justify-center px-4 py-2 bg-primary-700 font-primary font-500 border border-transparent rounded-lg text-primary-300  text-center text-base tracking-widest hover:bg-primary-400 focus:bg-primary-400 active:bg-primary-900 focus:outline-none transition ease-in-out duration-150">
                            {{ __('Salvar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script>
    const predefinedTags = ["Educação", "Música", "Ciência", "Saúde", "Tecnologia", "História", "Literatura", "Arte", "Filosofia", "Psicologia", "Esportes", "Negócios", "Economia", "Política", "Meio Ambiente", "Entretenimento", "Cinema", "Teatro", "Religião", "Espiritualidade", "Viagens", "Gastronomia", "Direito", "Matemática", "Astronomia", "Física", "Química", "Biologia", "Sociologia", "Linguística", "Programação", "Jogos", "Autodesenvolvimento", "Poesia", "Fotografia", "Meditação", "Moda", "Bem-estar", "Notícias", "Inovação", "Marketing", "Finanças", "Arquitetura", "Agricultura", "Inteligência Artificial", "Robótica", "Segurança da Informação", "Podcasts", "Curiosidades", "Cultura Pop", "Outros"];
    const input = document.querySelector('#tags-input');
    const tagify = new Tagify(input, {
        whitelist: predefinedTags,
        enforceWhitelist: false,
        dropdown: {
            enabled: 1,
        },
    });
</script>
@endsection