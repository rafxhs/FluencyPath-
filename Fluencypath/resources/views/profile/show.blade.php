@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::id() === $user->id)
    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Editar Perfil</a>
    @endif
    <h1 class="text-2xl font-bold mt-4">{{ $user->name }}</h1>

    <div class="card mt-4">
        <div class="card-body">
            <div class="flex items-center justify-center mb-4">
                <img src="{{ $user->profilePicture ? asset('storage/' . $user->profilePicture->path) : asset('images/default-profile.png') }}"
                    alt="Foto de Perfil"
                    class="w-32 h-32 rounded-full object-cover">
            </div>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
</div>
@endsection