<button {{ $attributes->merge(['type' => 'button', 'class' => 'sm:w-[180px] sm:h-[45px] inline-flex items-center justify-center px-2 py-2 bg-primary-700 font-primary font-500 border border-transparent rounded-lg text-primary-300  text-center text-base tracking-widest hover:bg-primary-400 focus:bg-primary-400 active:bg-primary-900 focus:outline-none transition ease-in-out duration-150 gap-2']) }}>
    {{ $slot }}
</button>
