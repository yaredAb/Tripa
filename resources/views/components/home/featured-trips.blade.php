@props(['events'])
<section id="featured-trips" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center mb-10">
                <h2 class="main-title">Featured Trips</h2>
                <a href="{{ route('events.index') }}" class="text-blue-600 hover:text-blue-800 text-lg font-semibold transition duration-300 flex items-center">
                    View All Trips <span class="ml-2">→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($events as $event)
                    <!-- Improved Card Component -->
                    <x-event :event="$event"></x-event>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <div class="text-gray-400 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-xl">No upcoming trips at the moment. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
