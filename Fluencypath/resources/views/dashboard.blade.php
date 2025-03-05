@extends('layouts.app')
@section('content')
<div>
    <div class="flex justify-end">
        <x-secondary-button>
            <x-heroicon-s-plus class="w-6 h-6  text-primary-300"/>
            <a href="{{ route('texts.create') }}" class="font-primary text-sm text-primary-300">Adicionar texto</a>
        </x-secondary-button>
    </div>
    <section>

        <h1 class="font-primary font-medium text-xl text-primary-1000">Meus Favoritos</h1>
        <div class="grid grid-cols-3 gap-4">
            <div class="w-[310px] h-[260px] bg-primary-100 rounded-lg">
                <div>
                    <a></a>
                    <div class="flex w-[50px] h-[30px] rounded-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                        <p>5</p>
                    </div>
                </div>
                <div>
                    <p>Roberta Miranda</p>
                </div>
                <div>As tags aqui</div>
                <div>

                </div>
            </div>

            <div>

            </div>

            <div>

            </div>

        </div>

    </section>

    <section>
        <h1 class="font-primary font-medium text-xl text-primary-1000">Meus Textos</h1>

        <div class="justify-items-center grid grid-cols-3 gap-2">

            @foreach ($userTexts as $text)
            <div class="w-[340px] h-[260px] bg-primary-100 rounded-lg p-4 shadow-md">

                <div class="flex items-center space-x-2 mt-2">
                    <a href="{{ route('texts.show', $text->id) }}" class="font-primary font-medium text-base text-primary-1000">
                        {{ $text->title }}
                    </a>

                    <div class="flex w-[50px] h-[30px] bg-primary-200 rounded border-2 border-neutral-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                        <p class="text-neutral-300">{{ $text->favorites_count }}</p>
                    </div>
                </div>

                <div>
                    <p class="text-sm text-gray-500">{{ $text->user->name }} - {{ $text->created_at->format('d/m/Y') }}</p>
                </div>

                <div class="mt-2">
                    @php
                    $tags = json_decode($text->tag, true);
                    @endphp
                    @if (is_array($tags))
                    @foreach ($tags as $tag)
                    <span class="inline-block bg-gray-200 text-gray-800 px-2 py-1 rounded-md text-sm">
                        {{ $tag['value'] }}
                    </span>
                    @endforeach
                    @else
                    <span class="text-gray-400 text-sm">Sem tags</span>
                    @endif
                </div>

                <div>
                    <p class="mt-2 text-sm text-gray-700">{{ Str::limit($text->content, 160, '...') }}</p>
                </div>

                <!-- Áudio -->
                @if ($text->audio_path)
                <audio controls class="mt-2 w-full">
                    <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
                </audio>
                @endif
            </div>
            @endforeach
        </div>

        <div>
            <a href="{{ route('texts.index') }}" class="">ver mais</a>
        </div>
    </section>

    <section>
        <h1 class="font-primary font-medium text-xl text-primary-1000">Textos</h1>
    </section>
</div>

@endsection