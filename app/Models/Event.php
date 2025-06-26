<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'category',
        'transportation',
        'start_date',
        'end_date',
        'small_description',
        'long_description',
        'main_image',
        'image2',
        'image3',
        'has_hotel',
        'has_food',
        'price',
        'people',
        'organizer_id'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime', // if you have this field
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'event_id', 'user_id')->withTimestamps();
    }

    public function isFavoritedBy(User $user = null)
    {
        if(!$user) {
            $user = auth()->user();
        }

        return $user ? $this->favoritedBy->contains($user) : false;
    }
}
