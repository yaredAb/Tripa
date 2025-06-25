@extends('layouts.app')
@section('content')

    <!-- Interactive Hero Section -->
    <x-home.hero />

    <!-- Why Choose Us Section -->
    <x-home.why-us />
    <!-- Featured Trips Section -->
    <x-home.featured-trips :events="$events"/>

    <!-- Top Organizers Section -->
    <x-home.organizers :organizers="$organizers"/>

    <!-- Testimonials Section -->
    <x-home.testimonials />

    <!-- Call to Action Section -->
    <x-home.cta />

    <!-- Footer -->
    <x-home.footer />

    <!-- Custom Animations -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0) translateX(-50%); }
            40% { transform: translateY(-20px) translateX(-50%); }
            60% { transform: translateY(-10px) translateX(-50%); }
        }
        .animate-fadeIn {
            animation: fadeIn 1s ease-out forwards;
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-bounce {
            animation: bounce 2s infinite;
        }
        .animation-delay-200 {
            animation-delay: 200ms;
        }
        .animation-delay-300 {
            animation-delay: 300ms;
        }
        .animation-delay-500 {
            animation-delay: 500ms;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
@endsection
