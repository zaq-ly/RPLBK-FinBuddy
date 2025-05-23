<nav x-data="{ open: false, mobileMenuOpen: false }" class=" border-gray-100 dark:border-gray-700">

    <!-- Wrapper -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->

                <!-- Topbar (Mobile) Toggle -->
                <div class="lg:hidden ml-4">
                    <button type="button" @click="mobileMenuOpen = true" class="text-gray-700 dark:text-white">
                        <svg class="h-6 w-6 text-black" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>

            <!-- User Dropdown -->
            <div class="flex items-center">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black bg-white  hover:text-gray-400 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>
        </div>
    </div>

    <!-- Sidebar Desktop -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col bg-[#44679F] px-6 pb-4 text-white">
        <div class="absolute top-0 right-0 -z-10 transform-gpu overflow-hidden blur-2xl" aria-hidden="true">
            <div class="aspect-[1255/678] w-[50rem] rotate-45 bg-gradient-to-tr from-[#000000] to-[#0c0674] opacity-50"
                style="clip-path: polygon(
            78% 30%, 100% 55%, 90% 90%, 65% 100%,
            40% 85%, 30% 60%, 20% 80%, 0% 50%,
            15% 15%, 50% 5%, 70% 20%
        );">
            </div>
        </div>


        <div class="h-16 flex items-center">
            <img class="h-10 m-3 w-auto" src="img/FinBuddy Logo.png" alt="Logo">
            <p class="text-xl font-bold">FinBuddy</p>
        </div>
        <nav class="flex flex-col gap-y-5">
            <ul class="space-y-2 mt-5">
                <li>
                    <a href="{{ url('dashboard') }}"
                        class="block p-2 rounded-md {{ request()->is('dashboard') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('budgeting') }}"
                        class="block p-2 rounded-md {{ request()->is('budgeting*') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                        Budgeting
                    </a>
                </li>
                <li>
                    <a href="{{ url('visual') }}"
                        class="block p-2 rounded-md {{ request()->is('visual*') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                        Visualisasi Keuangan
                    </a>
                </li>
            </ul>
            <div class="text-xs text-gray-200 mt-4">Riwayat Keuangan</div>
            <ul class="space-y-2 mt-2">
                <li><a href="{{ url('riwayatInputSaldo') }}"
                        class="block p-2 rounded-md {{ request()->is('riwayatInputSaldo*') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                        Riwayat Input Saldo
                    </a></li>
                <li>
                    <a href="{{ url('riwayatPengeluaran') }}"
                        class="block p-2 rounded-md {{ request()->is('riwayatPengeluaran*') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                        Riwayat Pengeluaran
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Sidebar Mobile -->
    <div class="relative z-50 lg:hidden" x-show="mobileMenuOpen" x-transition>
        <div class="fixed inset-0 bg-gray-900/40" @click="mobileMenuOpen = false"></div>
        <div class="fixed inset-0 flex">
            <div class="relative mr-16 w-full max-w-xs bg-[#44679F] text-white px-6 pb-4 overflow-y-auto max-h-screen">
                <div class="h-16 flex items-center">
                    <img class="h-8 w-auto" src="img/FinBuddy Logo.png" alt="Logo">
                    <p class="text-xl font-bold ml-4">FinBuddy</p>
                </div>
                <button class="absolute top-4 right-4" @click="mobileMenuOpen = false">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <nav class="flex flex-col gap-y-5 mt-6">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ url('dashboard') }}"
                                class="block p-2 rounded-md {{ request()->is('dashboard') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('budgeting') }}"
                                class="block p-2 rounded-md {{ request()->is('budgeting*') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                                Budgeting
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('visual') }}"
                                class="block p-2 rounded-md {{ request()->is('visual*') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                                Visualisasi Keuangan
                            </a>
                        </li>
                    </ul>
                    <div class="text-xs text-gray-200 mt-4">Riwayat Keuangan</div>
                    <ul class="space-y-2 mt-2">
                        <li><a href="{{ url('riwayatInputSaldo') }}"
                                class="block p-2 rounded-md {{ request()->is('riwayatInputSaldo*') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                                Riwayat Input Saldo
                            </a></li>
                        <li>
                            <a href="{{ url('riwayatPengeluaran') }}"
                                class="block p-2 rounded-md {{ request()->is('riwayatPengeluaran*') ? 'bg-[#3B577D] text-white' : 'hover:bg-[#4d71a3]' }}">
                                Riwayat Pengeluaran
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</nav>
