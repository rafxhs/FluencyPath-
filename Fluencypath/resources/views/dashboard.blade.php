@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <section class="py-10">
        <div class="w-full flex justify-end pt-28">
            <x-secondary-button>
                <x-heroicon-s-plus class="w-6 h-6  text-primary-300" />
                <a href="{{ route('texts.create') }}" class="font-primary text-sm text-primary-300">Adicionar texto</a>
            </x-secondary-button>
            @endsection
