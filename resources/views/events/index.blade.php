@extends('layouts.app')
@section('content')

<div class="space-y-2 py-4 px-6">
    <h2 class="main-title text-center">All Events</h2>
    @forelse ($events as $event)
        <x-event :event="$event"/>
    @empty
        <p> There is no event yet.</p>
    @endforelse

    {{ $events->links()}}
</div>
@endsection
