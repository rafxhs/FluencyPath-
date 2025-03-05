<nav x-data="{ open: false }" class="bg-primary-200 drop-shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-[80px]">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('texts.index')" :active="request()->routeIs('texts.index')">
                        {{ __('Textos') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('Flashcards') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('Quem somos') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex justify-between items-center border-b">
                <form class="w-[350px]">
                    <div class="relative flex items-center  text-neutral-500 focus-within:text-neutral-800">
                        <input id="searchbar" name="searchbar" type="search" aria-label="Pesquisar"
                            placeholder="Pesquisar"
                            class="w-full h-[40px] bg-primary-300 border-none ring-1 ring-neutral-300 text-neutral-800 focus:ring-2 focus:ring-neutral-300 rounded-lg pl-10 ps-8">
                    </div>
                </form>
            </div>

            <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <button class="w-[100px] h-[40px] border-neutral-200 border-2 rounded-md">
                    <div class="inline-flex justify-between items-center gap-5">
                        <x-heroicon-s-fire class="w-6 h-6 text-primary-500" />
                        <span class="font-secondary font-medium text-xl text-neutral-500">0</span>
                    </div>
                </button>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="px-3 py-2">
                            <div class="flex flex-row">
                                <img src="{{ Auth::user()->profilePicture ? asset('storage/' . Auth::user()->profilePicture->path) : asset('images/default-profile.png') }}"
                                    alt="Foto de Perfil"
                                    class="w-[40px] h-[40px] rounded-full object-cover">
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.show', ['id' => Auth::user()->id])">
                            <div class="flex flex-row">
                                <img src="{{ Auth::user()->profilePicture ? asset('storage/' . Auth::user()->profilePicture->path) : asset('images/default-profile.png') }}"
                                    alt="Foto de Perfil"
                                    class="w-14 h-14 rounded-full object-cover">
                                <div class="flex flex-col">
                                    <span>{{ Auth::user()->name }}</span>
                                    <span>{{ Auth::user()->email}}</span>
                                </div>
                            </div>
                        </x-dropdown-link>

                        <hr>

                        <x-dropdown-link :href="route('profile.show', ['id' => Auth::user()->id])">
                            {{ __('Meu Perfil') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('texts.index')">
                            Meus Textos
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('favorites.index')">
                            Meus Favoritos
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('profile.edit')">
                            Configurações
                        </x-dropdown-link>

                        <hr>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('texts.index')" :active="request()->routeIs('texts.index')">
                {{ __('Textos') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('Flashcards') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('Quem somos') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.show', ['id' => Auth::user()->id])">
                    {{ __('Meu perfil') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('texts.index')">
                    {{ __('Meus textos') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('favorites.index')">
                    {{ __('Meus favoritos') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Configurações') }}
                </x-responsive-nav-link>

                <hr>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>