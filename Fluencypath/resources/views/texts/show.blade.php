@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Texto</h1>
    <div class="card" style="border: 1px solid #ccc; padding: 15px; margin: 15px; width: 50%">
            <h3>{{ $texts->title }}</h3>
            <p>
            Tags:
            @php
                $tags = json_decode($texts->tag, true);
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

        <audio controls>
            <source src="{{ Storage::url($texts->audio->file_path) }}" type="audio/{{ pathinfo($texts->audio->file_path, PATHINFO_EXTENSION) }}">
            Seu navegador não suporta o elemento de áudio.
        </audio>

        <p>{{ $texts->content }}</p>
    </div>

    <a href="{{ route('texts.index') }}" style="text-decoration: none; color: blue;">Voltar</a>

</div>
@endsection
