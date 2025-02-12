@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-primary font-medium text-base text-neutral-500']) }}>
    {{ $value ?? $slot }}
</label>
