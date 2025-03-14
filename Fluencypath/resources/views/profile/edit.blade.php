@extends('layouts.app')
@section('content')
<section>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14">
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
            <li aria-current="page">
                <div class="flex items-center">
                    <x-heroicon-s-chevron-right class="w-5 h-4 text-neutral-300" />
                    <span class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2">Configurações</span>
                </div>
            </li>
        </ol>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-500">
                            @foreach ($errors->all() as $error)
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection