@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::id() === $user->id)
        <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Editar Perfil</a>
    @endif
    <h1>{{ $user->name }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
</div>
@endsection
