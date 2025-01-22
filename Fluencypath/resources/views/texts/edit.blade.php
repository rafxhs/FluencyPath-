@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Texto</h1>
    <form action="{{ route('texts.update', $text->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $text->title }}" required>

        <label for="content">Content:</label>
        <textarea name="content" required>{{ $text->content }}</textarea>

        <label for="tag">Tags:</label>
        <input id="tags-input" name="tag" value="{{ $text->tag }}" placeholder="Add tags" required>

        <button type="submit">Update</button>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    <script>
        const predefinedTags = ["Education", "Technology", "Science", "Health", "Music"];
        const input = document.querySelector('#tags-input');
        const tagify = new Tagify(input, {
            whitelist: predefinedTags,
            enforceWhitelist: false,
            dropdown: {
                enabled: 1,
            },
        });
    </script>


    <a href="{{ route('texts.index') }}" class="btn btn-secondary">Voltar</a>

</div>
@endsection
