@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Form Card -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Form Header -->
            <div class="bg-blue-600 px-6 py-4">
                <span class="text-5xl font-bold text-white">Tripa</span>
                <h2 class="text-2xl font-bold text-white mt-1">Organizer Registration</h2>
                <p class="text-blue-100 mt-1">Create your organizer account to start managing events</p>
            </div>

            <!-- Form Body -->
            <form class="p-6 space-y-6" method="POST" action="{{route('organizers.store')}}" enctype="multipart/form-data">
                @csrf

                <!-- Personal Information Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Personal Information</h3>

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name <span class="text-red-500">*</span></label>
                        <input type="text" value="{{old('name')}}" name="name" id="name"
                               class="mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('name') border-red-500 @else border-gray-300 @enderror">
                        @error('name') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                    </div>

                    <!-- Location Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- City Field -->
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City <span class="text-red-500">*</span></label>
                            <select name="city" id="city"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 p-2 focus:ring-blue-500 @error('city') border-red-500 @enderror">
                                <option value="">-- Select city --</option>
                                <option value="Addis Ababa" {{ old('city') == 'Addis Ababa' ? 'selected' : '' }}>Addis Ababa</option>
                                <option value="Hawassa" {{ old('city') == 'Hawassa' ? 'selected' : '' }}>Hawassa</option>
                                <option value="Dire" {{ old('city') == 'Dire' ? 'selected' : '' }}>Dire</option>
                            </select>
                            @error('city') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                        </div>

                        <!-- Address Field -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-red-500">*</span></label>
                            <input type="text" value="{{old('address')}}" name="address" id="address"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 p-2 focus:ring-blue-500 @error('address') border-red-500 @enderror">
                            @error('address') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <!-- Contact Field -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number <span class="text-red-500">*</span></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="country" class="sr-only">Country</label>
                                <span class="h-full py-0 pl-3 pr-1 flex items-center text-gray-500">+251</span>
                            </div>
                            <input type="tel" value="{{old('phone')}}" name="phone" id="phone"
                                   class="block w-full rounded-md border-gray-300 pl-14 focus:border-blue-500 p-2 focus:ring-blue-500 @error('phone') border-red-500 @enderror"
                                   placeholder="912345678">
                        </div>
                        @error('phone') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                    </div>
                </div>

                <!-- Account Information Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Account Information</h3>

                    <!-- Username Field -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username <span class="text-red-500">*</span></label>
                        <input type="text" value="{{old('username')}}" name="username" id="username"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 p-2 focus:ring-blue-500 @error('username') border-red-500 @enderror">
                        @error('username') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                    </div>

                    <!-- Password Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password" id="password"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 p-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                            @error('password') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                        </div>

                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation" id="confirm_password"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 p-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Profile Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Profile Details</h3>

                    <!-- Profile Picture -->
                    <div>
                        <label for="profile_img" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                        <div class="mt-1 flex items-center">
                            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                            <label for="profile_img" class="ml-5">
                                <span class="py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
                                    Change
                                </span>
                                <input type="file" name="profile_img" id="profile_img" class="sr-only @error('profile_img') border-red-500 @enderror">
                            </label>
                        </div>
                        @error('profile_img') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                        <p class="mt-2 text-sm text-gray-500">JPEG, JPG or PNG (Max. 5MB)</p>
                    </div>

                    <!-- Bio Field -->
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" rows="3"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 p-2 focus:ring-blue-500 @error('bio') border-red-500 @enderror">{{old('bio')}}</textarea>
                        @error('bio') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                        <p class="mt-2 text-sm text-gray-500">Tell us about yourself and your organization.</p>
                    </div>
                </div>

                <!-- Form Footer -->
                <div class="pt-6">
                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox"
                               class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="text-blue-600 hover:text-blue-500">Terms and Conditions</a>
                        </label>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            Register as Organizer
                        </button>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Sign in</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Profile picture preview
    document.getElementById('profile_img').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.querySelector('.inline-block.h-12.w-12');
                preview.innerHTML = `<img src="${event.target.result}" class="h-full w-full object-cover rounded-full">`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
