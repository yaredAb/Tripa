@extends('layouts.creator.app')

@section('content')
    <div class="space-y-2">
        <x-dashboard-card header="Created Events" :description="$event_count" bg="bg-blue-200" />
        <x-dashboard-card header="Upcoming Events" :description="$upcoming_events" bg="bg-red-200" />
    </div>
@endsection
