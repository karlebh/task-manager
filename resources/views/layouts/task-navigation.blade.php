<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    @php
        $user = request()->user;
    @endphp
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('task.index', $user) }}">
                        <h1><b>T</b>ask Manager</h1>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('task.dashboard', $user)" :active="request()->routeIs('task.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('task.index', $user)" :active="request()->routeIs('task.index')">
                        {{ __('All Tasks') }}
                    </x-nav-link>
                    <x-nav-link :href="route('task.create', $user)" :active="request()->routeIs('task.create')">
                        {{ __('Create Task') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ $user->name }}</div>

                            <div class="ms-1">
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
                        <a href="#"
                            class="text-gray-700 hover:text-blue-500 hover:bg-gray-200 rounded-md px-4 py-2 block {{ request()->routeIs('task.dashboard', $user) ? 'bg-blue-100 text-blue-700' : '' }}">
                            {{ $user->username }}
                        </a>
                        <x-dropdown-link :href="route('task.index', $user)" :active="request()->routeIs('task.index', $user)">
                            {{ __('All Tasks') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('task.create', $user)" :active="request()->routeIs('task.create', $user)">
                            {{ __('Create Task') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
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
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('task.dashboard', $user)" :active="request()->routeIs('task.dashboard', $user)">
                {{ $user->username }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('task.dashboard', $user)" :active="request()->routeIs('task.dashboard', $user)">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('task.index', $user)" :active="request()->routeIs('task.index', $user)">
                {{ __('All Tasks') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('task.create', $user)" :active="request()->routeIs('task.create', $user)">
                {{ __('Create Task') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ $user->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ $user->email }}</div>
            </div>
        </div>
    </div>
</nav>
