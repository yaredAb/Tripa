<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-50">
<div class="min-h-screen flex flex-col justify-center items-center px-6 py-12 sm:px-6 lg:px-8">
    <!-- Logo with better spacing -->
    <div class="text-center">
        <a href="#" class="inline-block">
            <span class="text-5xl font-bold text-blue-600">Tripa</span>
        </a>
        <p class="mt-2 text-sm text-gray-600">Your event management solution</p>
    </div>

    <!-- Main content card -->
    <div class="mt-8 w-full max-w-md p-8 bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="text-center">
            <h2 class="text-2xl font-semibold text-gray-900">Join as</h2>
            <p class="mt-2 text-gray-600">Select your role to continue registration</p>
        </div>

        <!-- Buttons with hover effects and better spacing -->
        <div class="mt-6 grid gap-4">
            <a href="{{route('organizers.create')}}"
               class="flex items-center justify-center px-6 py-4 border border-transparent rounded-lg shadow-sm text-lg font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                Event Organizer
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                </svg>
            </a>

            <a href="{{route('user_register')}}"
               class="flex items-center justify-center px-6 py-4 border-2 border-blue-600 rounded-lg shadow-sm text-lg font-medium text-blue-600 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                Event Participant
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <!-- Additional help text -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">
                Already have an account?
                <a href="{{route('login')}}" class="font-medium text-blue-600 hover:text-blue-500">Sign in</a>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <div class="mt-8 text-center text-xs text-gray-400">
        <p>© 2023 Tripa. All rights reserved.</p>
    </div>
</div>
</body>
</html>
