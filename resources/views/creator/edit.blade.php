@extends('layouts.creator.app')
@section('content')
    <form method="post" action="{{route('events.update', $event)}}" class="bg-white rounded-xl shadow-md p-6 md:p-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <!-- Form Header -->
        <div class="mb-8 border-b pb-4">
            <h1 class="text-3xl font-bold text-gray-800">Edit {{$event->title}} Event</h1>
        </div>

        <!-- Basic Information Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Basic Information</h2>

            <div class="grid gap-6 md:grid-cols-2">
                <!-- Event Title -->
                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">Event Title (Place) <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{$event->title}}" id="title"
                           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('title') border-red-500 @enderror"
                           placeholder="e.g. Summer Music Festival">
                    @error('title') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>

                <!-- Category -->
                <div class="space-y-2">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category <span class="text-red-500">*</span></label>
                    <select name="category" id="category"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('category') border-red-500 @enderror">
                        <option value="">Select category</option>
                        <option value="religion" @if($event->category == 'religion') selected @endif>Religion</option>
                        <option value="music" @if($event->category == 'music') selected @endif>Music</option>
                        <option value="sport" @if($event->category == 'sport') selected @endif>Sport</option>
                    </select>
                    @error('category') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Date & Transportation Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Date & Transportation</h2>

            <div class="grid gap-6 md:grid-cols-2">
                <!-- Date Range -->
                <div class="space-y-4">
                    <div class="space-y-2">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date <span class="text-red-500">*</span></label>
                        <input type="date" name="start_date" id="start_date" value="{{$event->start_date->format('Y-m-d')}}"
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('start_date') border-red-500 @enderror">
                        @error('start_date') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date <span class="text-red-500">*</span></label>
                        <input type="date" name="end_date" id="end_date" value="{{$event->end_date->format('Y-m-d')}}"
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('end_date') border-red-500 @enderror">
                        @error('end_date') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                    </div>
                </div>

                <!-- Transportation -->
                <div class="space-y-2">
                    <label for="transportation" class="block text-sm font-medium text-gray-700">Transportation <span class="text-red-500">*</span></label>
                    <select name="transportation" id="transportation"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('transportation') border-red-500 @enderror">
                        <option value="">Select transportation</option>
                        <option value="car" @if($event->transportation == 'car') selected @endif>Car</option>
                        <option value="plane" @if($event->transportation == 'plane') selected @endif>Plane</option>
                    </select>
                    @error('transportation') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Description</h2>

            <div class="space-y-6">
                <div class="space-y-2">
                    <label for="small_description" class="block text-sm font-medium text-gray-700">Short Description <span class="text-red-500">*</span></label>
                    <textarea name="small_description" id="small_description" rows="3"
                              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('small_description') border-red-500 @enderror"
                              placeholder="Brief description that appears in listings">{{$event->small_description}}</textarea>
                    @error('small_description') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label for="detail_description" class="block text-sm font-medium text-gray-700">Detailed Description</label>
                    <textarea name="detail_description" id="detail_description" rows="5"
                              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('detail_description') border-red-500 @enderror"
                              placeholder="Full details about the event">{{$event->long_description}}</textarea>
                    @error('detail_description') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Images Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Images</h2>

            <div class="grid gap-6 md:grid-cols-3">
                <!-- Main Image -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Main Image <span class="text-red-500">*</span></label>
                    <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 @error('main_image') border-red-500 @enderror">
                        <div class="space-y-1 text-center relative" id="main_image_container">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="main_image" class="relative cursor-pointer rounded-md bg-white font-medium text-blue-600 focus-within:outline-none hover:text-blue-500">
                                    <span>Upload a file</span>
                                    <input type="file" name="main_image" id="main_image" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                        </div>
                    </div>
                    @error('main_image') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>

                <!-- Additional Images -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Second Image</label>
                    <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 @error('image_2') border-red-500 @enderror">
                        <div class="space-y-1 text-center" id="second_image_container">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="second_image" class="relative cursor-pointer rounded-md bg-white font-medium text-blue-600 focus-within:outline-none hover:text-blue-500">
                                    <span>Upload a file</span>
                                    <input type="file" name="image_2" id="second_image" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                        </div>
                    </div>
                    @error('image_2') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Third Image</label>
                    <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 @error('image_3') border-red-500 @enderror">
                        <div class="space-y-1 text-center" id="third_image_container">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="third_image" class="relative cursor-pointer rounded-md bg-white font-medium text-blue-600 focus-within:outline-none hover:text-blue-500">
                                    <span>Upload a file</span>
                                    <input type="file" name="image_3" id="third_image" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                        </div>
                    </div>
                    @error('image_3') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Amenities Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Amenities</h2>

            <div class="flex items-center space-x-8">
                <div class="flex items-center">
                    <input type="hidden" name="has_hotel" value="0">
                    <input type="checkbox" name="has_hotel" id="hotel" value="1"
                           class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 p-2" @if($event->has_hotel) checked @endif>
                    <label for="hotel" class="ml-2 block text-sm font-medium text-gray-700">Hotel Included</label>
                </div>

                <div class="flex items-center">
                    <input type="hidden" name="has_food" value="0">
                    <input type="checkbox" name="has_food" id="food" value="1"
                           class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 p-2" @if($event->has_food) checked @endif>
                    <label for="food" class="ml-2 block text-sm font-medium text-gray-700">Food Included</label>
                </div>
            </div>
        </div>

        <!-- Pricing Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Pricing & Capacity</h2>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="space-y-2">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price <span class="text-red-500">*</span></label>
                    <div class="relative rounded-md shadow-sm">

                        <input type="number" name="price" id="price" value="{{$event->price}}"
                               class="block w-full rounded-md border-gray-300 pr-12 focus:border-blue-500 focus:ring-blue-500 p-2 @error('price') border-red-500 @enderror"
                               placeholder="0.00">
                    </div>
                    @error('price') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label for="no_of_people" class="block text-sm font-medium text-gray-700">Capacity (People) <span class="text-red-500">*</span></label>
                    <input type="number" name="people" id="no_of_people" value="{{$event->people}}"
                           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 @error('people') border-red-500 @enderror">
                    @error('people') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 p-2 focus:ring-offset-2">
                Create Event
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    // Image upload preview functionality
    function setupImageUpload(inputId, containerId) {
        const input = document.getElementById(inputId);
        const container = document.getElementById(containerId);

        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Create preview without removing the original input
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'absolute inset-0';
                    previewDiv.innerHTML = `
                        <img src="${e.target.result}" class="h-full w-full object-cover rounded-md" alt="Preview">
                        <button type="button" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-sm" onclick="removePreview(this, '${inputId}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    `;

                    // Add relative positioning to container
                    container.classList.add('relative');

                    // Remove any existing preview
                    const existingPreview = container.querySelector('.preview-image');
                    if (existingPreview) {
                        existingPreview.remove();
                    }

                    // Add the new preview
                    previewDiv.classList.add('preview-image');
                    container.appendChild(previewDiv);
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    function removePreview(button, inputId) {
        const previewDiv = button.closest('.preview-image');
        if (previewDiv) {
            previewDiv.remove();
        }

        // Reset the file input
        const input = document.getElementById(inputId);
        input.value = '';
    }

    // Initialize for all image uploads when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        setupImageUpload('main_image', 'main_image_container');
        setupImageUpload('second_image', 'second_image_container');
        setupImageUpload('third_image', 'third_image_container');
    });
</script>
@endsection
