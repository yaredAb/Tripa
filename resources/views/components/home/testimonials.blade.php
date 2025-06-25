<section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Traveler Stories</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ([1, 2, 3] as $testimonial)
                <div
                    class="bg-white/10 p-6 rounded-xl backdrop-blur-sm border border-white/20 hover:border-white/40 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/{{ $testimonial % 2 ? 'women' : 'men' }}/{{ $testimonial * 10 + 2 }}.jpg"
                            alt="Traveler" class="w-12 h-12 rounded-full mr-4 border-2 border-white">
                        <div>
                            <h4 class="font-semibold">{{ $testimonial % 2 ? 'Sarah' : 'Michael' }} J.</h4>
                            <div class="flex">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-300 fill-current"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="italic">"The trip to the
                        {{ $testimonial == 1 ? 'Simien Mountains' : ($testimonial == 2 ? 'Danakil Depression' : 'Lalibela') }}
                        was absolutely breathtaking. Our guide was knowledgeable and made sure we had the best
                        experience possible."</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
