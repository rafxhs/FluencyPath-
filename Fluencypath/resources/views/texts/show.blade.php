@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Texto</h1>

    <div style="padding: 20px; border: 1px solid #ccc; margin: 20px;">
        <h2>{{ $texts->title }}</h2>
        <p><strong>Tags:</strong> {{ $texts->tag }}</p>
        <p>{{ $texts->content }}</p>
        <a href="{{ route('texts.index') }}" style="text-decoration: none; color: blue;">Back to List</a>
    </div>

</div>
@endsection