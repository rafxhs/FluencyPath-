@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Meus Favoritos</h1>

    @if ($favoriteTexts->isEmpty())
        <p>Você ainda não favoritou nenhum texto.</p>
    @else
        @foreach ($favoriteTexts as $text)
            <div class="card mb-3">
                <div class="card-body">
                    <h3>{{ $text->title }}</h3>
                    <p>{{ Str::limit($text->content, 100, '...') }}</p>
                    <a href="{{ route('texts.show', $text->id) }}" class="btn btn-primary">Ver Mais</a>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
