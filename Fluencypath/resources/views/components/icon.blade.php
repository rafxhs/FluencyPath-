@props(['name', 'class' => 'w-6 h-6'])

{{-- Verifica se o arquivo do ícone existe e inclui ele --}}
@if (view()->exists("components.icons.{$name}"))
    @include("components.icons.{$name}", ['class' => $class, 'name' => $name])
@else
    {{-- Ícone padrão caso o nome seja inválido --}}
    <span class="text-red-500">[Ícone não encontrado]</span>
@endif
