@props(['organizers'])

<section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center mb-10">
                <h2 class="main-title">Trusted Organizers</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 text-lg font-semibold transition duration-300 flex items-center">
                    View All Organizers <span class="ml-2">→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($organizers as $organizer)
                <a href="{{route('organizers.userView', $organizer->id)}}"
                   class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-48 overflow-hidden relative">
                        @if($organizer->cover_img)
                            <img src="{{asset('storage/' . $organizer->cover_img)}}" alt="{{$organizer->name}}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-r from-blue-500 to-purple-600"></div>
                        @endif
                        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2">
                            <img src="{{asset('storage/' . $organizer->profile_img)}}" alt="{{$organizer->name}}"
                                 class="w-24 h-24 rounded-full border-4 border-white object-cover shadow-md">
                        </div>
                    </div>
                    <div class="pt-14 pb-6 px-4 text-center">
                        <h3 class="font-semibold text-lg mb-1">{{$organizer->name}}</h3>
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{$organizer->bio}}</p>
                        <div class="flex justify-center items-center">
                            @for($i = 0; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                            <span class="text-gray-500 text-xs ml-1">(24 reviews)</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
