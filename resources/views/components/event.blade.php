@props(['event'])

@if ($event)
    <a href="{{ route('events.detail', ['id' => $event->id]) }}"
        class="group block overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
        <!-- Image with overlay -->
        <div class="relative overflow-hidden h-48">
            <img src="{{ asset('storage/' . $event->main_image) }}" alt="{{ $event->title }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <!-- Price Tag -->
            <div class="absolute top-4 right-4 bg-white/90 text-blue-600 font-bold px-3 py-1 rounded-lg">
                {{ $event->price }} Birr
            </div>
        </div>

        <!-- Card Content -->
        <div class="bg-white p-5">
            <div class="flex justify-between items-start mb-3">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                    {{ $event->title }}</h3>
                <!-- Rating Stars -->
                <div class="flex items-center">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
            </div>

            <p class="text-gray-600 mb-4 line-clamp-2">{{ $event->small_description }}</p>
            <p class="text-gray-600 mb-4 line-clamp-2">By: <span class="text-purple-700 font-medium">{{ $event->organizer->name }}</span></p>

            <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span
                        class="text-sm text-gray-500">{{ Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}</span>
                </div>
                <span class="text-sm font-semibold text-blue-600">Learn More →</span>
            </div>
        </div>
    </a>
@endif
