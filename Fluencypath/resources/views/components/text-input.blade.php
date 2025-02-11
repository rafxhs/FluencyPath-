@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-neutral-300 font-primary font-medium text-sm focus:border-primary-700 focus:ring-primary-700 rounded-lg shadow-sm']) }}>
