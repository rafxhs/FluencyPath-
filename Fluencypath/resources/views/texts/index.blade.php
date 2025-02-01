@extends('layouts.app')

@section('content')
<div class="container" style="margin-left: 50px;">
    <h1 class="my-4" style=" font-size:larger">Textos</h1>

    <a href="{{ route('texts.create') }}" class="btn btn-danger btn-sm bg-blue-300 text-white p-2 rounded hover:bg-blue-400">Adicionar Texto</a>

    @foreach ($texts as $text)
        <div class="card" style="border: 1px solid #ccc; padding: 15px; margin: 15px; width: 50%">
            <h3>{{ $text->title }}</h3>
            <p>
            Tags:
            @php
                $tags = json_decode($text->tag, true);
            @endphp
            @if (is_array($tags))
                @foreach ($tags as $tag)
                    <span style="display: inline-block; background-color: #e0e0e0; color: #333; padding: 5px 10px; margin: 5px; border-radius: 5px;">
                        {{ $tag['value'] }}
                    </span>
                @endforeach
            @else
                <span>tags não correspondente (MUDAR ISSO pra quando não tiver na lista, nem guradar no banco)</span>
            @endif
        </p>
            <p>{{ Str::limit($text->content, 30, '...') }}</p>  <!--Limita até 25 caracteres do texto -->
            @if ($text->audio_path)
            <audio controls>
                <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
            </audio>
    @endif
        <a href="{{ route('texts.show', $text->id) }}" style="text-decoration: none; color: blue;">Ver mais</a>

       <!-- Botão de Favoritar -->
<button
    class="favorite-btn flex items-center space-x-2 mt-4"
    data-text-id="{{ $text->id }}"
    data-favorited="{{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? 'true' : 'false' }}"
>
    <!-- Ícone do coração -->
    <span class="favorite-icon text-2xl">
        {{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? '❤️' : '🤍' }}
    </span>
    <!-- Contador de favoritos -->
    <span class="favorites-count text-gray-600 text-lg">
        {{ $text->favorites_count }}
    </span>
</button>
    </div>



    <div>
        <form action="{{ route('texts.destroy', $text->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Deseja excluir este texto?')" class="btn btn-danger btn-sm bg-red-300 text-white p-2 rounded hover:bg-red-400" >
            <i class="bi bi-trash"></i> Deletar
            </button>
        </form>

        <a href="{{ route('texts.edit', $text->id) }}" class="bg-yellow-300 text-white p-2 rounded hover:bg-yellow-600 " >Editar</a>
    </div>
    @endforeach
</div>
@endsection
