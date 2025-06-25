<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-[#eee]">
<div class="flex flex-col w-full overflow-hidden">
    <nav
    x-data="{ open: false }"
    class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left side - Logo -->
            <div class="flex items-center">
                <a href="/" class="text-2xl font-semibold text-gray-900 hover:text-blue-600 transition">
                    Tripa
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-900 hover:text-blue-600 px-1 pt-1 border-b-2 border-transparent hover:border-blue-600 transition">
                    Home
                </a>
                <a href="#featured-trips" class="text-gray-900 hover:text-blue-600 px-1 pt-1 border-b-2 border-transparent hover:border-blue-600 transition">
                    Trips
                </a>
                <a href="{{ route('organizers.index') }}" class="text-gray-900 hover:text-blue-600 px-1 pt-1 border-b-2 border-transparent hover:border-blue-600 transition">
                    Organizers
                </a>
                <a href="#" class="text-gray-900 hover:text-blue-600 px-1 pt-1 border-b-2 border-transparent hover:border-blue-600 transition">
                    About
                </a>
                <a href="{{ route('pre-register') }}" class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Sign Up
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button
                    @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 focus:outline-none transition"
                >
                    <span class="sr-only">Open menu</span>
                    <!-- Hamburger icon -->
                    <svg
                        x-show="!open"
                        class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close icon -->
                    <svg
                        x-show="open"
                        class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div
        x-show="open"
        @click.away="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="md:hidden origin-top-right absolute right-0 left-0 bg-white shadow-lg rounded-b-lg"
    >
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="/" class="block py-2 text-gray-900 hover:text-blue-600 border-l-4 border-blue-600 pl-3 transition">
                Home
            </a>
            <a href="{{ route('events.index') }}" class="block py-2 text-gray-900 hover:text-blue-600 border-l-4 border-transparent hover:border-blue-600 pl-3 transition">
                Trips
            </a>
            <a href="{{ route('organizers.index') }}" class="block py-2 text-gray-900 hover:text-blue-600 border-l-4 border-transparent hover:border-blue-600 pl-3 transition">
                Organizers
            </a>
            <a href="#" class="block py-2 text-gray-900 hover:text-blue-600 border-l-4 border-transparent hover:border-blue-600 pl-3 transition">
                About
            </a>
            <div class="pt-2 border-t border-gray-200">
                <a href="{{ route('pre-register') }}" class="block w-full px-4 py-2 text-center text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
</nav>

@yield('content')
</div>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@yield('script')
</body>
</html>
