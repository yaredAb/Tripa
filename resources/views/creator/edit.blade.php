@extends('layouts.creator.app')
@section('content')
    <form method="post" action="{{ route('events.update', $event) }}" class="bg-white p-2 flex flex-col gap-5"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <p class="text-2xl font-medium">Add Event</p>
        <div class="flex flex-col gap-1 text-lg">
            <label for="title">Title (Place) <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ $event->title }}" id="title"
                class="input-form-style @error('title') border-red-500 @enderror">
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-1">
            <div class="w-1/2 flex flex-col gap-1 text-lg">
                <label for="category">Category <span class="text-red-500">*</span></label>
                <select name="category" id="category" class="input-form-style @error('category') border-red-500 @enderror">
                    <option value="">--select category--</option>
                    <option value="religion" {{ $event->category == 'religion' ? 'selected' : null }}>Religion</option>
                    <option value="music" {{ $event->category == 'music' ? 'selected' : null }}>Music</option>
                    <option value="sport" {{ $event->category == 'sport' ? 'selected' : null }}>Sport</option>
                </select>
                @error('category')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-1/2 flex flex-col gap-1 text-lg">
                <label for="transportation">Transportation <span class="text-red-500">*</span></label>
                <select name="transportation" id="transportation"
                    class="input-form-style @error('transportation') border-red-500 @enderror">
                    <option value="">--select transportation--</option>
                    <option value="car" {{ $event->transportation == 'car' ? 'selected' : null }}>Car</option>
                    <option value="plane" {{ $event->transportation == 'palne' ? 'selected' : null }}>Plane</option>
                </select>
                @error('transportation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex gap-1">
            <div class="w-1/2 flex flex-col gap-1 text-lg">
                <label for="date">Start Date<span class="text-red-500">*</span></label>
                <input type="date" name="start_date" id="date" value="{{ $event->start_date }}"
                    class="input-form-style @error('start_date') border-red-500 @enderror">
                @error('start_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-1/2 flex flex-col gap-1 text-lg">
                <label for="end_date">End Date<span class="text-red-500">*</span></label>
                <input type="date" name="end_date" id="end_date" value="{{ $event->end_date }}"
                    class="input-form-style @error('end_date') border-red-500 @enderror">
                @error('end_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col gap-1 text-lg">
            <label for="small_description">Small Description<span class="text-red-500">*</span></label>
            <textarea name="small_description" id="small_description"
                class="input-form-style h-16 @error('small_description') border-red-500 @enderror">{{ $event->small_description }}</textarea>
            @error('small_description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col gap-1 text-lg">
            <label for="detail_description">Detail Description</label>
            <textarea name="detail_description" id="detail_description"
                class="input-form-style h-36 @error('detail_description') border-red-500 @enderror">{{ $event->long_description }}</textarea>
            @error('detail_description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-1 text-lg">
                <label for="main_image">Main Image<span class="text-red-500">*</span></label>
                <label for="main_image" id="main_label"
                    class="w-24 h-24 input-form-style flex justify-center items-center text-sm @error('main_image') border-2 border-red-500 @enderror">+</label>
                <input type="file" name="main_image" id="main_image" class="hidden">
                @error('main_image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1 text-lg">
                <label for="second_image">Second Image</label>
                <label for="second_image" id="second_label"
                    class="w-24 h-24 input-form-style flex justify-center items-center text-sm @error('image_2') border-2 border-red-500 @enderror">+</label>
                <input type="file" name="image_2" id="second_image" class="hidden">
                @error('image_2')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1 text-lg">
                <label for="main_image">Third Image</label>
                <label for="third_image" id="third_label"
                    class="w-24 h-24 input-form-style flex justify-center items-center text-sm @error('image_3') border-2 border-red-500 @enderror">+</label>
                <input type="file" name="image_3" id="third_image" class="hidden">
                @error('image_3')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex justify-evenly">
            <div class="flex gap-3 text-lg">
                <label for="hotel">Hotel</label>
                <input type="hidden" name="has_hotel" value="0">
                <input type="checkbox" name="has_hotel" id="hotel" value="1" class="input-form-style w-6">
            </div>
            <div class="flex gap-3 text-lg">
                <label for="food">Food</label>
                <input type="hidden" name="has_food" value="0">
                <input type="checkbox" name="has_food" id="food" value="1" class="input-form-style w-6">
            </div>
        </div>

        <div class="flex gap-1">
            <div class="w-1/2 flex flex-col gap-1 text-lg">
                <label for="price">Price<span class="text-red-500">*</span></label>
                <input type="number" name="price" id="price" value="{{ $event->price }}"
                    class="input-form-style @error('price') border-red-500 @enderror">
                @error('price')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-1/2 flex flex-col gap-1 text-lg">
                <label for="no_of_people">People<span class="text-red-500">*</span></label>
                <input type="number" name="people" id="no_of_people" value="{{ $event->people }}"
                    class="input-form-style @error('people') border-red-500 @enderror">
                @error('people')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="bg-blue-500 p-2 text-2xl text-white font-medium rounded-lg">Save</button>

    </form>
@endsection

@section('script')
    <script>
        const input1 = document.getElementById('main_image');
        const input1_label = document.getElementById('main_label');

        input1.addEventListener('change', function() {
            input1_label.innerHTML = this.files[0]?.name || 'No file Selected'
        })

        const input2 = document.getElementById('second_image');
        const input2_label = document.getElementById('second_label');

        input2.addEventListener('change', function() {
            input2_label.innerHTML = this.files[0]?.name || 'No file Selected'
        })

        const input3 = document.getElementById('third_image');
        const input3_label = document.getElementById('third_label');

        input3.addEventListener('change', function() {
            input3_label.innerHTML = this.files[0]?.name || 'No file Selected'
        })
    </script>
@endsection
