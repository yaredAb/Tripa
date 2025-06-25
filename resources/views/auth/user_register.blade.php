<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Tripa</title>
    @vite('resources/css/app.css')
    <style>
        .bg-auth {
            background-image: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }
        .auth-card {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.85);
        }
        .password-strength {
            height: 4px;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 flex flex-col">
    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Logo/Brand -->
            <div class="text-center mb-8">
                <a href="#" class="inline-block">
                    <span class="text-5xl font-bold text-blue-600">Tripa</span>
                    <span class="block text-sm text-gray-500 mt-1">Join our adventure community</span>
                </a>
            </div>

            <!-- Auth Card -->
            <div class="auth-card rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Account</h1>

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
                                    <h3 class="text-sm font-medium text-red-800">There were {{ $errors->count() }} errors with your submission</h3>
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

                    <!-- Registration Form -->
                    <form method="POST" action="" class="space-y-4">
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    required
                                    class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2 text-base border-gray-300 rounded-md placeholder-gray-400"
                                    placeholder="John Doe"
                                >
                            </div>
                        </div>

                        <!-- Username Field -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    value="{{ old('username') }}"
                                    required
                                    class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2 text-base border-gray-300 rounded-md placeholder-gray-400"
                                    placeholder="johndoe"
                                >
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') }}"
                                    required
                                    class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2 text-base border-gray-300 rounded-md placeholder-gray-400"
                                    placeholder="john@example.com"
                                >
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </div>
                                <input
                                    type="tel"
                                    name="phone"
                                    id="phone"
                                    value="{{ old('phone') }}"
                                    required
                                    class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2 text-base border-gray-300 rounded-md placeholder-gray-400"
                                    placeholder="+251 900 000 000"
                                >
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required
                                    class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2 text-base border-gray-300 rounded-md placeholder-gray-400"
                                    placeholder="At least 8 characters"
                                    x-data=""
                                    x-on:input="strength = Math.min(4, Math.floor(password.value.length / 2));
                                                $refs.strengthBar.style.width = strength * 25 + '%';
                                                $refs.strengthBar.className = 'password-strength rounded ' +
                                                    (strength < 2 ? 'bg-red-500' :
                                                     strength < 3 ? 'bg-yellow-500' : 'bg-green-500')"
                                >
                            </div>
                            <div class="mt-1 h-1 w-full bg-gray-200 rounded">
                                <div x-ref="strengthBar" class="password-strength rounded bg-red-500" style="width: 0%"></div>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">
                                Password must be at least 8 characters
                            </p>
                        </div>

                        <!-- Password Confirmation -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    required
                                    class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2 text-base border-gray-300 rounded-md placeholder-gray-400"
                                    placeholder="Re-enter your password"
                                >
                            </div>
                        </div>

                        <!-- Terms Agreement -->
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input
                                    id="terms"
                                    name="terms"
                                    type="checkbox"
                                    required
                                    class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                                >
                            </div>
                            <div class="ml-3">
                                <label for="terms" class="text-sm text-gray-700">
                                    I agree to the <a href="#" class="text-blue-600 hover:text-blue-500">Terms of Service</a> and <a href="#" class="text-blue-600 hover:text-blue-500">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button
                                type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150"
                            >
                                Create Account
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Footer/Sign In Link -->
                <div class="px-8 py-4 bg-gray-50 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 ml-1">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Tripa. All rights reserved.
    </footer>

    <!-- Alpine.js for password strength meter -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
