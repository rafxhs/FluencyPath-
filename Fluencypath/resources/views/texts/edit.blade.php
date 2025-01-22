@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Textos</h1>
    <form action="{{ route('texts.update', $text->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $text->title }}" required>

        <label for="content">Content:</label>
        <textarea name="content" required>{{ $text->content }}</textarea>

        <label for="tag">Tag:</label>
        <input type="text" name="tag" value="{{ $text->tag }}" required>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('texts.index') }}" class="btn btn-secondary">Voltar</a>

</div>
@endsection
