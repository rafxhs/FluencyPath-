@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Textos</h1>

    @foreach ($texts as $text)
    <div>
        <tr>
            <td>Titulo:{{$text->title}}</td> <br>
            <td>{{$text->content }}</td> <br>
            <td>Tags:{{$text->tag }}</td> <br>
       

            <form action="{{ route('texts.destroy', $text->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este texto?')">
                <i class="bi bi-trash"></i> Deletar
                </button>
            </form>

            <a href="{{ route('texts.edit', $text->id) }}">Edit</a>

        <tr>
    </div>
    @endforeach

    <a href="{{ route('texts.create') }}" class="btn btn-secondary">Criar</a>

</div>
@endsection
