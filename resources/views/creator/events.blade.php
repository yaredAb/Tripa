@extends('layouts.creator.app')

@section('content')
    @php
        use Carbon\Carbon;
        $now = now();
    @endphp

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">My Events</h1>
            <a href="{{ route('creator.create') }}" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Create New Event
            </a>
        </div>

        @if (count($events) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Event Image with Status Badge -->
                    <div class="relative">
                        <img src="{{ asset('storage/' . $event->main_image) }}" alt="{{ $event->title }}"
                             class="w-full h-48 object-cover">
                        <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-semibold
                            @if($event->start_date && $event->start_date->isFuture()) bg-green-100 text-green-800
                            @elseif($event->start_date) bg-gray-100 text-gray-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            @if($event->start_date && $event->start_date->isFuture())
                                Upcoming
                            @elseif($event->start_date)
                                Past Event
                            @else
                                Date Not Set
                            @endif
                        </span>
                    </div>

                    <!-- Event Details -->
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $event->title }}</h3>

                        @if($event->start_date)
                        <div class="flex items-center text-gray-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            {{ $event->start_date->format('M j, Y') }}
                            @if($event->end_date && !$event->start_date->isSameDay($event->end_date))
                                - {{ $event->end_date->format('M j, Y') }}
                            @endif
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex space-x-3 mt-4">
                            <a href="{{ route('events.edit', $event) }}"
                               class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit
                            </a>

                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')"
                                        class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm p-8 text-center max-w-md mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="text-xl font-medium text-gray-700 mb-2">No Events Created Yet</h3>
                <p class="text-gray-500 mb-6">Get started by creating your first event</p>
                <a href="{{ route('creator.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Create Event
                </a>
            </div>
        @endif
    </div>
@endsection
