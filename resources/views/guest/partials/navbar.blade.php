<nav class="bg-white py-4 sticky top-0 z-[999]" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <h1 class="font-bold text-3xl">LOGO <span class="text-amber-600">HERE</span></h1>
                    </a>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('home') }}"
                        class=" {{ request()->routeIs('home') ? 'bg-amber-600 text-white' : 'hover:bg-amber-600 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                        aria-current="page">Beranda</a>

                    <!-- HAK CIPTA -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" type="button"
                            class="inline-flex items-center gap-x-1 text-sm rounded-md px-3 py-2 font-medium  hover:bg-amber-600 hover:text-white"
                            aria-expanded="false">
                            <span>Hak Cipta</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            class="absolute left-1/2 z-10 mt-5 flex w-48 max-w-max -translate-x-1/2 px-4"
                            style="display: none;">
                            <div
                                class="w-screen max-w-md flex-auto overflow-hidden rounded-md bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5">
                                <div class="py-2">
                                    <a href="{{ route('pengenalan') }}"
                                        class="{{ request()->routeIs('pengenalan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Tentang Hak Cipta</a>

                                    <a href="{{ route('prosedurPengajuan') }}"
                                        class="{{ request()->routeIs('prosedurPengajuan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Cara Pengajuan</a>

                                    <a href="{{ route('pengajuan') }}"
                                        class="{{ request()->routeIs('pengajuan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Pengajuan</a>

                                    <a href="{{ route('jenisCiptaan') }}"
                                        class="{{ request()->routeIs('jenisCiptaan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Jenis Ciptaan</a>

                                    <a href="{{ route('syaratLampiran') }}"
                                        class="{{ request()->routeIs('syaratLampiran') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Syarat Lampiran</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PATEN MEREK -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" type="button"
                            class="inline-flex items-center gap-x-1 text-sm rounded-md px-3 py-2 font-medium  hover:bg-amber-600 hover:text-white"
                            aria-expanded="false">
                            <span>Paten</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            class="absolute left-1/2 z-10 mt-5 flex w-48 max-w-max -translate-x-1/2 px-4"
                            style="display: none;">

                            <div
                                class="w-screen max-w-md flex-auto overflow-hidden rounded-md bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5">
                                <div class="py-2">
                                    <a href="{{ route('paten.pengenalan') }}"
                                        class="{{ request()->routeIs('paten.pengenalan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Tentang Paten</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('pengumuman') }}"
                        class="{{ request()->routeIs('pengumuman') ? 'bg-amber-600 text-white' : 'hover:bg-amber-600 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                        aria-current="page">Pengumuman</a>
                    <a href="{{ route('kontak') }}"
                        class="{{ request()->routeIs('kontak') ? 'bg-amber-600 text-white' : 'hover:bg-amber-600 hover:text-white' }} rounded-md  px-3 py-2 text-sm font-medium"
                        aria-current="page">Kontak</a>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    @auth
                    <div class="relative ml-3">
                        <div>
                            <button @click="isOpen = !isOpen" type="button"
                                class="relative flex max-w-xs items-center rounded-full" id="user-menu-button"
                                aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <div class="flex items-center gap-2">
                                    <h5 class="underline font-semibold text-sm">{{ auth()->user()->nama }}</h5>
                                    <div
                                        class="h-8 w-8 rounded-full text-indigo-400 overflow-hidden text-2xl flex items-center justify-center bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-amber-600">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('submission.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Pengajuan</a>
                            <a href="{{ route('profile.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                                role="menuitem" tabindex="-1" id="user-menu-item-1">Profile</a>
                            <form action="{{ route('auth.logout') }}" method="post" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                            </form>
                        </div>
                    </div>
                    @endauth
                    @guest
                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}" class="px-4 py-1 rounded font-semibold border-2 border-amber-600 bg-amber-600 text-white duration-200 hover:bg-amber-700">Login</a>
                    </div>
                    @endguest
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button @click="isOpen = !isOpen" type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-amber-600 p-2 text-white hover:bg-amber-600 hover:text-amber-400 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="{{ route('home') }}"
                class="block rounded-md px-3 py-2 text-base font-medium {{ request()->routeIs('home') ? 'bg-amber-600 text-white' : 'hover:bg-amber-600 hover:text-white' }}">Beranda</a>

            <div x-data="{ open: false }">
                <button @click="open = !open" type="button"
                    class="block w-full text-left rounded-md px-3 py-2 text-base font-medium hover:bg-amber-600 hover:text-white"
                    aria-expanded="false">
                    Hak Cipta
                    <svg class="inline h-5 w-5 float-right" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 -translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-4" class="mt-2 space-y-1 px-4"
                    style="display: none;">

                    <a href="{{ route('pengenalan') }}"
                        class="block px-4 py-2 text-base font-medium {{ request()->routeIs('pengenalan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }}">Tentang
                        Hak Cipta</a>

                    <a href="{{ route('prosedurPengajuan') }}"
                        class="block px-4 py-2 text-base font-medium {{ request()->routeIs('prosedurPengajuan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }}">Cara
                        Pengajuan</a>

                    <a href="{{ route('pengajuan') }}"
                        class="block px-4 py-2 text-base font-medium {{ request()->routeIs('pengajuan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }}">Pengajuan</a>

                    <a href="{{ route('jenisCiptaan') }}"
                        class="block px-4 py-2 text-base font-medium {{ request()->routeIs('jenisCiptaan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }}">Jenis
                        Ciptaan</a>

                    <a href="{{ route('syaratLampiran') }}"
                        class="block px-4 py-2 text-base font-medium {{ request()->routeIs('syaratLampiran') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }}">Syarat
                        Lampiran</a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" type="button"
                    class="block w-full text-left rounded-md px-3 py-2 text-base font-medium hover:bg-amber-600 hover:text-white"
                    aria-expanded="false">
                    Paten
                    <svg class="inline h-5 w-5 float-right" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 -translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-4" class="mt-2 space-y-1 px-4"
                    style="display: none;">

                    <a href="{{ route('paten.pengenalan') }}"
                        class="block px-4 py-2 text-base font-medium {{ request()->routeIs('paten.pengenalan') ? 'text-amber-600' : 'hover:bg-indigo-100 text-gray-700' }}">Tentang
                        Paten</a>
                </div>
            </div>

            <a href="{{ route('pengumuman') }}"
                class="block rounded-md px-3 py-2 text-base font-medium {{ request()->routeIs('pengumuman') ? 'bg-amber-600 text-white' : 'hover:bg-amber-600 hover:text-white' }}">Pengumuman</a>
            <a href="{{ route('kontak') }}"
                class="block rounded-md px-3 py-2 text-base font-medium {{ request()->routeIs('kontak') ? 'bg-amber-600 text-white' : 'hover:bg-amber-600 hover:text-white' }}">Kontak</a>
        </div>

        @auth
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div
                    class="h-8 w-8 rounded-full text-indigo-400 overflow-hidden text-2xl flex items-center justify-center bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-amber-600">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none">{{ auth()->user()->nama }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="{{ route('submission.index') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                    role="menuitem" tabindex="-1" id="user-menu-item-0">Pengajuan</a>
                <a href="{{ route('profile.index') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                    role="menuitem" tabindex="-1" id="user-menu-item-1">Profile</a>
                <form action="{{ route('auth.logout') }}" method="post" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                        role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                </form>
            </div>
        </div>
        @endauth
        @guest
        <div class="w-full p-8 text-center">
            <a href="{{ route('login') }}" class="block px-4 py-1 rounded font-semibold bg-amber-600 text-white duration-200 hover:bg-amber-700">Login</a>
        </div>
        @endguest
    </div>
</nav>