<section class="relative h-screen max-h-[600px] overflow-hidden">
    <!-- Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-800"></div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-1/4 left-1/4 w-16 h-16 rounded-full bg-white animate-float"></div>
        <div class="absolute top-1/3 right-1/3 w-24 h-24 rounded-full bg-white animate-float animation-delay-2000"></div>
        <div class="absolute bottom-1/4 left-1/3 w-20 h-20 rounded-full bg-white animate-float animation-delay-4000">
        </div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fadeIn">
            Discover <span class="text-yellow-300">Ethiopia</span>'s Hidden Gems
        </h1>
        <p class="text-xl text-white mb-8 max-w-md animate-fadeIn animation-delay-300">
            Experience unforgettable adventures with local experts
        </p>
        <div class="flex flex-col sm:flex-row gap-4 animate-fadeIn animation-delay-500">
            <a href="{{ route('pre-register') }}"
                class="bg-white text-blue-600 hover:bg-blue-50 py-3 px-8 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                Join Now
            </a>
            <a href="#featured-trips"
                class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600 py-3 px-8 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                Explore Trips
            </a>
        </div>
    </div>

    <!-- Scrolling Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>
