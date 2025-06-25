<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organizers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric|unique:organizers',
            'username' => 'required|string|unique:organizers',
            'password' => 'required|string|confirmed',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'nullable|string',
        ]);

        $profile_path = null;
        if($request->hasFile('profile_img')){
            $profile_path = $request->file('profile_img')->store('organizers', 'public');
        }

        $hash_password = Hash::make($request->password);

        $user = User::create([
            'username' => $request->username,
            'password' => $hash_password,
            'role' => 'organizer',
        ]);

        Organizer::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => $hash_password,
            'profile_img' => $profile_path,
            'bio' => $request->bio ?? null,
        ]);

        return redirect()->route('events.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function userView(string $id){
        $organizer = Organizer::with('events')->find($id);
        return view('organizers.userView', compact('organizer'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
