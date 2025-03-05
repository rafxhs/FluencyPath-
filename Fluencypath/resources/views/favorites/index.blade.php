@extends('layouts.app')

@section('content')
<div class="container">
    <div>

    </div>

    <div>
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <a href="{{route('texts.index')}}" class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2 dark:hover:text-neutral-300">Textos</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-icon name="chevron-right" />
                    <span class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2">Meus Favoritos</span>
                </div>
            </li>
        </ol>
    </div>

    <h1 class="my-4">Meus Favoritos</h1>

    @if ($favoriteTexts->isEmpty())
    <p>Você ainda não favoritou nenhum texto.</p>
    @else
    @foreach ($favoriteTexts as $text)
    <div class="card mb-3">
        <div class="card-body">
            <h3>{{ $text->title }}</h3>
            <p>{{ Str::limit($text->content, 100, '...') }}</p>
            <a href="{{ route('texts.show', $text->id) }}" class="btn btn-primary">Ver mais</a>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection