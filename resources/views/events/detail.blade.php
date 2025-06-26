@extends('layouts.app')
@section('content')
    <div class="w-full mx-auto bg-white shadow-sm rounded-lg overflow-hidden">


        <!-- Image carousel with Alpine -->
        <div x-data="{
            currentIndex: 0,
            images: [
                '{{ asset('storage/' . $event->main_image) }}',
                @if ($event->image2) '{{ asset('storage/' . $event->image2) }}', @endif
                @if ($event->image3) '{{ asset('storage/' . $event->image3) }}' @endif
            ].filter(Boolean),
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            },
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
            }
        }" class="relative h-64 w-full overflow-hidden bg-gray-100">
            <!-- Images -->
            <template x-for="(image, index) in images" :key="index">
                <img x-show="currentIndex === index" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" :src="image"
                    :alt="'{{ $event->title }} image ' + (index + 1)" class="absolute inset-0 w-full h-full object-cover"
                    loading="lazy" />
            </template>

            <!-- Navigation (only show if multiple images) -->
            <template x-if="images.length > 1">
                <div>
                    <button @click="prev()"
                        class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/40 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-black/60 transition backdrop-blur-sm"
                        aria-label="Previous image">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button @click="next()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/40 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-black/60 transition backdrop-blur-sm"
                        aria-label="Next image">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </template>

            <!-- Indicators -->
            <div x-show="images.length > 1" class="absolute bottom-4 left-0 right-0 flex justify-center gap-2">
                <template x-for="(_, index) in images" :key="index">
                    <button @click="currentIndex = index" class="w-2 h-2 rounded-full transition-all"
                        :class="currentIndex === index ? 'bg-white w-4 bg-opacity-100' : 'bg-white bg-opacity-50'"
                        aria-label="Go to image"></button>
                </template>
            </div>
        </div>

        <!-- Event details -->
        <div class="p-6 space-y-6">
            <!-- Title and date -->
            <div>
                <h1 class="text-2xl font-bold text-gray-900 mb-1">{{ $event->title }}</h1>
                <div class="flex items-center text-gray-500 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>
                        {{ \Carbon\Carbon::parse($event->start_date)->format('M j, Y') }}
                        @if ($event->end_date && $event->end_date != $event->start_date)
                            - {{ \Carbon\Carbon::parse($event->end_date)->format('M j, Y') }}
                        @endif
                    </span>
                </div>
            </div>

            {{-- small description --}}
            <p class="text-lg font-medium">{{$event->small_description}}</p>

            <!-- Description -->
            <p class="text-gray-700 leading-relaxed">{{ $event->long_description }}</p>

            <!-- Key details grid -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Category -->
                <div class="flex items-start space-x-3">
                    <div class="mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Category</p>
                        <p class="font-medium">{{ $event->category }}</p>
                    </div>
                </div>

                <!-- Price -->
                <div class="flex items-start space-x-3">
                    <div class="mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Price</p>
                        <p class="font-medium">{{ number_format($event->price) }} Birr</p>
                    </div>
                </div>

                <!-- Food -->
                <div class="flex items-start space-x-3">
                    <div class="mt-0.5">
                        @if ($event->has_food)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        @endif
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Food</p>
                        <p class="font-medium">{{ $event->has_food ? 'Included' : 'Not included' }}</p>
                    </div>
                </div>

                <!-- Accommodation -->
                <div class="flex items-start space-x-3">
                    <div class="mt-0.5">
                        @if ($event->has_hotel)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        @endif
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Accommodation</p>
                        <p class="font-medium">{{ $event->has_hotel ? 'Included' : 'Not included' }}</p>
                    </div>
                </div>

                <!-- Transportation -->
                <div class="flex items-start space-x-3">
                    <div class="mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Transport</p>
                        <p class="font-medium">By {{ $event->transportation }}</p>
                    </div>
                </div>

                <!-- Capacity -->
                <div class="flex items-start space-x-3">
                    <div class="mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Capacity</p>
                        <p class="font-medium">{{ $event->people }} people</p>
                    </div>
                </div>
            </div>

            <!-- Organizer info -->
            <div class="pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-500 mb-3">Organized by</p>
                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                        @if ($event->organizer->profile_img)
                        <img src="{{asset('storage/' . $event->organizer->profile_img)}}" class="w-10 h-10 bg-white p-1 rounded-full">
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @endif
                    </div>
                    <div>
                        <p class="font-medium">{{ $event->organizer->name }}</p>
                        <p class="text-sm text-gray-500">{{ $event->organizer->phone }}</p>
                    </div>
                    <a href="tel:{{ $event->organizer->phone }}"
                        class="ml-auto p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Action buttons -->
            <div class="flex space-x-3 pt-4">
                <a href="tel:{{ $event->organizer->phone }}"
                    class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 rounded-lg flex items-center justify-center space-x-2 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>


                    <span>Call Now</span>
                </a>

                @auth
                    <button id="favorite"
                        class="flex-1 bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg flex items-center justify-center space-x-2 transition font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        <span>Add Favorite</span>
                    </button>
                @endauth
            </div>
        </div>
    </div>
@endsection
