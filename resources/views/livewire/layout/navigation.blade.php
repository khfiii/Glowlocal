<nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-8 sm:px-6 lg:px-8 md:pb-8">
        <div class="flex justify-between md:justify-center items-center h-16">
            <div class="flex flex-col">
                <!-- Logo -->
                <div class="shrink-0 flex justify-star md:justify-center md:py-7">
                    <a href="" class="text-gray-800 text-lg font-serif md:text-4xl font-bold">
                        Glowlocal Shop
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex" x-data="{ menuBarOpen: false }">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                        {{ __('Beranda') }}
                    </x-nav-link>
                    <x-nav-link :href="route('product')" :active="request()->routeIs('product')" wire:navigate>
                        {{ __('Produk') }}
                    </x-nav-link>
                    <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')" wire:navigate>
                        {{ __('Blog') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
                        {{ __('Ketentuan Layanan') }}
                    </x-nav-link>

                    @if(auth()->check() && auth()->user()->hasVerifiedEmail())       
                      <x-nav-link :href="route('logout.get')" :active="request()->routeIs('login')" wire:navigate>
                            {{ __('Logout') }}
                        </x-nav-link>
                    @endif

                    @guest
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                            {{ __('Login') }}
                        </x-nav-link>
                    @endguest
                        


                     <x-nav-link :href="route('cart')" :active="request()->routeIs('')" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </x-nav-link>

                </div>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center gap-2 sm:hidden">
                <x-nav-link :href="route('cart')" :active="request()->routeIs('')" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </x-nav-link>
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden" x-data="{ menuBarOpen: false }">
        <div class="pt-2 pb-3 space-y-1 px-5">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                {{ __('Beranda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('product')" :active="request()->routeIs('product')" wire:navigate>
                {{ __('Produk') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')" wire:navigate>
                {{ __('Blog') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
                {{ __('Ketentuan Layanan') }}
            </x-responsive-nav-link>
            @guest
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                    {{ __('Login') }}
                </x-responsive-nav-link>
            @endguest

            @auth()
                <x-responsive-nav-link :href="route('logout.get')" :active="request()->routeIs('auth/logout')" wire:navigate>
                    {{ __('Logout') }}
                </x-responsive-nav-link>
            @endauth
        </div>
    </div>


</nav>
