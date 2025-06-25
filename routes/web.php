<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrganizerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'welcome'])->name('home');
Route::get('/events/event/{id}', [EventController::class, 'detail'])->name('events.detail');
Route::resource('events', EventController::class);
Route::get('/organizers/organizer/{id}', [OrganizerController::class, 'userView'])->name('organizers.userView');
Route::resource('organizers', OrganizerController::class);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class, 'register'])->name('register-user');
Route::post('/register', [AuthController::class, 'register_authenticate'])->name('register-authenticate');
Route::view('/user-register', 'auth.user_register')->name('user_register');
Route::view('/pre-register', 'auth.pre-register')->name('pre-register');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/creator/dashboard', [EventController::class, 'dashboard'])->name('creator.dashboard');
    Route::view('/creator/event/create', 'creator.create')->name('creator.create');
    Route::get('/creator/events', [EventController::class, 'events_list'])->name('creator.events');

    Route::post('/evetns/{event}/favorite', [FavoriteController::class, 'toggle'])->name('events.favorite');
});
