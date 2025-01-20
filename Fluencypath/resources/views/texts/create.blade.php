@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">add Textos</h1>

        <form action="{{ route('texts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="content">Content:</label>
            <textarea name="content" required></textarea>

            <label for="tag">Tag:</label>
            <input type="text" name="tag" required>

            <button type="submit">Upload</button>
        </form>

    <a href="{{ route('texts.index') }}" class="btn btn-secondary">Voltar</a>

</div>
@endsection
