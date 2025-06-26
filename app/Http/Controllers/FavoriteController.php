<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Event $event)
    {
        if (auth()->user()->favorites()->where('event_id', $event->id)->exists()) {
            return back()->with('warning', 'You already favorited this event');
        }

        auth()->user()->favorites()->attach($event->id);
        return back()->with('success', 'Event added to favorites!');
    }

    public function destroy(Event $event)
    {
        auth()->user()->favorites()->detach($event->id);
        return back()->with('success', 'Event removed from favorites!');
    }
}
