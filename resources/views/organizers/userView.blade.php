@extends('layouts.app')

@section('content')

    <div class="relative h-60 bg-white shadow-sm">
        <img src="{{asset('image/tana.jpg')}}" alt="bg" class="absolute top-0 left-0 w-full h-full object-cover">
        <div class="shade"></div>
        <img src="{{asset('storage/'. $organizer->profile_img)}}" alt="{{$organizer->name}}" class="w-32 profile-circle absolute left-5 bg-white rounded-full p-2 z-20">
        <div class="absolute bottom-3 left-40 text-white z-20">
            <p class="text-2xl font-semibold">{{$organizer->name}}</p>
            <span class="font-medium text-sm">{{$organizer->bio}}</span>
            <div class="flex items-center gap-4 mt-2">
                <p class="text-sm font-semibold">100 Followers</p>
                <a href="#" class="rounded-full border-2 border-blue-500 text-sm font-semibold py-1 px-2">Follow</a>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-3 px-3 mt-3">
        @if(count($organizer->events) > 0)
            <p class="text-2xl font-semibold">Upcoming Trips</p>
            <div class="flex gap-2 overflow-x-auto">
                @foreach($organizer->events as $event)
                    <div class="flex-0 w-44">
                        <x-event :event="$event" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>


    <div class="flex flex-col gap-3 py-5 px-3">
        <p class="text-2xl font-semibold">Previous Trips</p>
        <div class="flex gap-2 overflow-x-auto">
            <a href="#" class=" flex-none block w-52 h-60 overflow-hidden rounded-lg bg-white shadow-lg relative">
                <img src="{{asset('image/wenchi.jpg')}}" alt="Wenchi" class="absolute top-0 left-0 w-full h-full object-cover">
                <div class="half-shade"></div>
                <p class="absolute bottom-6 left-4 text-white text-xl font-semibold z-20">Wenchi</p>
            </a>
            <a href="#" class=" flex-none block w-52 h-60 overflow-hidden rounded-lg bg-white shadow-lg relative">
                <img src=".{{asset('image/tana.jpg')}}" alt="Wenchi" class="absolute top-0 left-0 w-full h-full object-cover">
                <div class="half-shade"></div>
                <p class="absolute bottom-6 left-4 text-white text-xl font-semibold z-20">Tana Trip</p>
            </a>
        </div>
    </div>

</div>

@endsection
