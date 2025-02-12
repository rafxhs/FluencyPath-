@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4" style="margin-left: 50px; font-size:larger">Adicionar Textos</h1>

        <div class="flex p-10 ml-12">
            <form
                action="{{ route('texts.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="flex flex-col space-y-4">
                @csrf
                <label for="title" class="text-sm font-semibold">Titulo do texto:</label>
                <input
                    type="text"
                    name="title"
                    required
                    class="border border-gray-300 p-2 rounded">

                <label for="content" class="text-sm font-semibold">Seu texto</label>

                <textarea
                    name="content"
                    required
                    class="border border-gray-300 p-2 rounded w-96 h-60"></textarea>

                <label for="tag" class="text-sm font-semibold">Tags:</label>
                <input
                    id="tags-input"
                    name="tag"
                    placeholder="Add tags"
                    required
                    class="border border-gray-300 p-2 rounded">


                    <label for="audio" class="text-sm font-semibold">Áudio:</label>
                    <input
                        type="file"
                        name="audio"
                        accept="audio/*"
                        required
                        class="border border-gray-300 p-2 rounded">

                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                    Adicionar
                </button>
            </form>
        </div>

        <a href="{{ route('texts.index') }}" class="bg-blue-300 text-white p-2 rounded hover:bg-blue-600 ">Voltar</a>

        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
        <script>
            const predefinedTags = ["Educação", "Música", "Ciência", "Saúde", "Tecnologia", "História", "Literatura", "Arte", "Filosofia", "Psicologia", "Esportes", "Negócios", "Economia", "Política", "Meio Ambiente", "Entretenimento", "Cinema", "Teatro", "Religião", "Espiritualidade", "Viagens", "Gastronomia", "Direito", "Matemática", "Astronomia", "Física", "Química", "Biologia", "Sociologia", "Linguística", "Programação", "Jogos", "Autodesenvolvimento", "Poesia", "Fotografia", "Meditação", "Moda", "Bem-estar", "Notícias", "Inovação", "Marketing", "Finanças", "Arquitetura", "Agricultura", "Inteligência Artificial", "Robótica", "Segurança da Informação", "Podcasts", "Curiosidades", "Cultura Pop", "Outros"]
            const input = document.querySelector('#tags-input');
            const tagify = new Tagify(input, {
                whitelist: predefinedTags,
                enforceWhitelist: false,
                dropdown: {
                    enabled: 1,
                },
            });
        </script>

</div>
@endsection
