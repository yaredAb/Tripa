<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request, Event $event)
    {
        $user = Auth::user();

        if ($user->favorites()->where('event_id', $event->id)->exists()){
            $user->favorites()->detach($event->id);
            return response()->json(['status', 'removed']);
        } else{
            $user->favorites()->attach($event->id);
            return response()->json(['status' => 'added']);
        }
    }
}
