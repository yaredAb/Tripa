<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function welcome()
    {
        $organizers = Organizer::all();
        $events = Event::orderBy('created_at', 'desc')->with('organizer')->limit(3)->get();
        return view('welcome', compact('events', 'organizers'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $organizers = Organizer::all();
        $events = Event::orderBy('created_at', 'desc')->paginate(10);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user() && Auth::user()->role == 'organizer'){
            return view('events.create');
        }
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request->all());

        $user = Auth::user();
        $organizer = $user->organizer;

        $request->validate([
            'title' => 'required|string',
            'small_description' => 'required|string',
            'detail_description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'category' => 'required|string',
            'transportation' => 'required|string',
            'price' => 'required|numeric',
            'people' => 'required|numeric',
            'has_hotel' => 'required|boolean',
            'has_food' => 'required|boolean',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('main_image')){
            $mainImPath = $request->file('main_image')->store('events', 'public');
        }
        if($request->hasFile('image_2')){
            $image2Path = $request->file('image_2')->store('events', 'public');
        }
        if($request->hasFile('image_3')){
            $image3Path = $request->file('image_3')->store('events', 'public');
        }

        Event::create([
            'title' => $request->title,
            'small_description' => $request->small_description,
            'long_description' => $request->detail_description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'category' => $request->category,
            'transportation' => $request->transportation,
            'price' => $request->price,
            'people' => $request->people,
            'has_hotel' => $request->has_hotel,
            'has_food' => $request->has_food,
            'main_image' => $mainImPath,
            'image2' => $image2Path ?? null,
            'image3' => $image3Path ?? null,
            'organizer_id' => $organizer->id,
        ]);
        return redirect()->route('events.index')->with('success', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('creator.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $organizer = $user->organizer;

        $info = Event::where('id', $id)->first();
        $main_image = $info->main_image;
        $image2 = $info->image2 || null;
        $image3 = $info->image3 || null;

        $request->validate([
            'title' => 'required|string',
            'small_description' => 'required|string',
            'detail_description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'category' => 'required|string',
            'transportation' => 'required|string',
            'price' => 'required|numeric',
            'people' => 'required|numeric',
            'has_hotel' => 'required|boolean',
            'has_food' => 'required|boolean',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('main_image')){
            $main_image= $request->file('main_image')->store('events', 'public');
        }
        if($request->hasFile('image_2')){
            $image2 = $request->file('image_2')->store('events', 'public');
        }
        if($request->hasFile('image_3')){
            $image3 = $request->file('image_3')->store('events', 'public');
        }

        $info->update([
            'title' => $request->title,
            'small_description' => $request->small_description,
            'long_description' => $request->detail_description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'category' => $request->category,
            'transportation' => $request->transportation,
            'price' => $request->price,
            'people' => $request->people,
            'has_hotel' => $request->has_hotel,
            'has_food' => $request->has_food,
            'main_image' => $main_image,
            'image2' => $image2,
            'image3' => $image3,
            'organizer_id' => $organizer->id,
        ]);
        return redirect()->route('creator.events')->with('success', 'Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }

    public function detail(string $id)
    {
        $event = Event::with('organizer')->find($id);
        if($event){
            return view('events.detail', compact('event'));
        }
        return redirect()->route('events.index');
    }

    public function events_list()
    {

        $user = Auth::user();
        $organizer = $user->organizer;

        $events = $organizer->events()->with('organizer')->get();
        return view('creator.events', compact('events'));
    }

    public function dashboard()
    {
        $organizer = Auth::user()->organizer;
        $event_count = $organizer->events()->count();

        $now = now();
        $upcoming_events = $organizer->events()->where('start_date', '>', $now)->count();
        return view('creator.dashboard', compact(['event_count', 'upcoming_events']));
    }
}
