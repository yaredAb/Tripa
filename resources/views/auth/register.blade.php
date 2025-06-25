<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Tripa - Authentication</title>
</head>
<body class="bg-gray-50">
<div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8">
    <!-- Logo with better spacing -->
    <div class="text-center mb-8">
        <a href="#" class="inline-block">
            <span class="text-5xl font-bold text-blue-600">Tripa</span>
        </a>
        <p class="mt-2 text-sm text-gray-600">Your event management solution</p>
    </div>

    <!-- Form Card -->
    <div class="w-full max-w-md">
        <div class="bg-white py-8 px-6 shadow rounded-lg border border-gray-100">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">
                {{ str_contains(request()->route()->getName(), 'login') ? 'Welcome Back' : 'Create Account' }}
            </h2>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                There {{ $errors->count() > 1 ? 'were' : 'was' }} {{ $errors->count() }} {{ str_plural('error', $errors->count()) }} with your submission
                            </h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{route('register-authenticate')}}" class="space-y-6">
                @csrf

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="username" id="username" value="{{old('username')}}"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-lg"
                               placeholder="Enter your username" autocomplete="username" autofocus>
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" name="password" id="password"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-lg"
                               placeholder="••••••••" autocomplete="new-password">
                    </div>
                </div>

                <!-- Confirm Password Field (only for registration) -->
                @if(str_contains(request()->route()->getName(), 'register'))
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-lg"
                               placeholder="••••••••" autocomplete="new-password">
                    </div>
                </div>
                @endif

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        {{ str_contains(request()->route()->getName(), 'login') ? 'Sign In' : 'Create Account' }}
                    </button>
                </div>
            </form>

            <!-- Alternate Action Links -->
            <div class="mt-6 text-center text-sm">
                @if(str_contains(request()->route()->getName(), 'login'))
                    <p class="text-gray-600">
                        Don't have an account?
                        <a href="{{route('user_register')}}" class="font-medium text-blue-600 hover:text-blue-500">Sign up</a>
                    </p>
                @else
                    <p class="text-gray-600">
                        Already have an account?
                        <a href="{{route('login')}}" class="font-medium text-blue-600 hover:text-blue-500">Sign in</a>
                    </p>
                @endif
            </div>
        </div>

        <!-- Footer Links -->
        <div class="mt-6 text-center text-xs text-gray-500">
            <p>© {{ date('Y') }} Tripa. All rights reserved.</p>
        </div>
    </div>
</div>
</body>
</html>
