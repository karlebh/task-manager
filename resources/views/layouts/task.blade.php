<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Task manager') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            @if (session('message'))
                <div id="session-message"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md mb-4 inline-block absolute z-40 right-10 top-10 transform transition-all duration-300 translate-x-3 opacity-0">
                    <div class="flex items-center">
                        <strong> {{ session('message') }} </strong>
                        <button onclick="closeMessage()" class="p-1 text-white text-lg font-bold mx-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif



            @include('layouts.task-navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            const messageBox = document.getElementById('session-message');

            setTimeout(() => {
                messageBox.classList.remove('translate-x-3', 'opacity-0');
                messageBox.classList.add('translate-x-0', 'opacity-100');
            }, 10);

            setTimeout(() => {
                closeMessage();
            }, 5000);

            function closeMessage() {
                messageBox.classList.remove('translate-x-0', 'opacity-100');
                messageBox.classList.add('translate-x-3', 'opacity-0');
                setTimeout(() => {
                    messageBox.style.display = 'none';
                }, 300);
            }
        </script>
    </body>

</html>
