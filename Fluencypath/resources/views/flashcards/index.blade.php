@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Meus Flashcards</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($flashcards->isEmpty())
    <p>Você ainda não adicionou nenhum flashcard.</p>
    @else
    <div class="row">
        @foreach($flashcards as $flashcard)
        <div class="col-md-4 mb-4">
            <div class="card p-3 shadow-sm">
                <h5 class="text-center"><strong>{{ $flashcard->word }}</strong></h5>
                <p><em>{{ $flashcard->ipa }}</em></p>
                <p><strong>Frase em Inglês:</strong></p>
                <p>{!! $flashcard->sentence_en !!}</p>
                <p><strong>Tradução:</strong></p>
                <p>{!! $flashcard->sentence_pt !!}</p>
                <form action="{{ route('flashcards.destroy', $flashcard->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este flashcard?');">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Deseja excluir este flashcard?')" class="btn btn-danger btn-sm bg-red-300 text-white p-2 rounded hover:bg-red-400">
                        <i class="bi bi-trash"></i> Deletar
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <a href="{{ route('texts.index') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
