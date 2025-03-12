@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-20 pb-8">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li aria-current="page">
                <div class="flex items-center">
                    <span class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2">Perfil</span>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <x-heroicon-s-chevron-right class="w-5 h-4 text-neutral-300" />
                    <a :href="route('profile.show', ['id' => Auth::user()->id])" class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2 dark:hover:text-neutral-300">{{ __('Meu Perfil') }}</a>
                </div>
            </li>
        </ol>
    </div>

    <div class="flex-row items-center p-4 sm:p-8 bg-white shadow sm:rounded-lg gap-10">
        <div class="w-full inline-flex justify-between items-center mb-10 mx-4">
            <h2 class="font-primary font-medium text-xl text-neutral-600">
                {{ __('Meu Perfil') }}
            </h2>
            <button class="w-[150px] h-[40px] gap-1 inline-flex items-center justify-center mx-4 px-4 py-2 bg-primary-700 font-primary font-500 border border-transparent rounded-lg text-primary-300  text-center text-base tracking-widest hover:bg-primary-400 focus:bg-primary-400 active:bg-primary-900 focus:outline-none transition ease-in-out cursor-pointer duration-150">
                @if(Auth::id() === $user->id)
                <a href="{{ route('profile.edit') }}" class="font-primary text-sm text-center text-primary-100">Editar Perfil</a>
                @endif
            </button>
        </div>
        <div class="max-w-xl m-4">
            <div class="flex flex-row mt-2">
                <img src="{{ Auth::user()->profilePicture ? asset('storage/' . Auth::user()->profilePicture->path) : asset('images/default-profile.png') }}"
                    alt="Foto de Perfil Atual"
                    class="w-32 h-32 rounded-full object-cover drop-shadow-md">
                <div class="m-8">
                    <p class="font-primary font-medium text-2xl text-neutral-600">{{ $user->name }}</p>
                    <p class="font-primary font-base text-xl text-neutral-600">{{ $user->email }}</p>
                </div>
            </div>
            <input id="profile_picture" name="profile_picture" type="file" class="hidden" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>
    </div>
</section>
@endsection