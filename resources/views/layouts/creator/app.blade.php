<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="h-screen bg-gray-100 relative" x-data="{ open: false }">
        <!-- Top Navbar -->
        <div class="flex items-center justify-between bg-white shadow px-6 py-4">
            <div class="flex items-center gap-4">
                <!-- Hamburger / Close Icon -->
                <button @click="open = !open" class="text-gray-700 focus:outline-none">
                    <template x-if="!open">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </template>
                    <template x-if="open">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </template>
                </button>

                <!-- Brand -->
                <a href="#" class="text-2xl font-bold text-blue-600">Tripa</a>
            </div>

            <!-- Page Label -->
            <div class="flex items-center">
                <h1 class="text-lg font-semibold text-gray-700">{{$organizer_name}}</h1>
                <img src="{{asset('storage/' . $profile_img)}}" alt="{{$organizer_name}}" class="p-2 w-14 h-14 object-cover rounded-full shadow-lg">
            </div>
        </div>

        <!-- Sidebar -->
        <div x-show="open" @click.away="open = false" x-transition class="w-64 bg-white shadow py-8 px-4 space-y-4 absolute z-20">
            <x-sidebar-link
                href="{{route('creator.dashboard')}}"
                :active="request()->routeIs('creator.dashboard')"
                icon="dashboard">
                Dahboard
            </x-sidebar-link>
            <x-sidebar-link href="{{route('creator.events')}}" icon="events" :active="request()->routeIs('creator.events')">
                Events
            </x-sidebar-link>
            <x-sidebar-link href="{{route('creator.create')}}" :active="request()->routeIs('creator.create')" icon="new event">
                New Event
            </x-sidebar-link>
            <x-sidebar-link href="#" icon="settings">
                Settings
            </x-sidebar-link>

            <x-sidebar-link href="{{route('logout')}}" icon="logout">
                Logout
            </x-sidebar-link>
        </div>

        <!-- Main Content Area (placeholder) -->
        <div class="flex-1 h-[780px] overflow-y-auto pt-4 px-3">
            @yield('content')
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('script')
</body>
</html>
