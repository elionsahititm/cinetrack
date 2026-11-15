<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function prequel()
    {
        return $this->belongsTo(Title::class, 'sequel_of_id');
    }

    public function sequels()
    {
        return $this->hasMany(Title::class, 'sequel_of_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function credits()
    {
        return $this->hasMany(TitleCredit::class);
    }

    public function watchlistEntries()
    {
        return $this->hasMany(WatchlistEntry::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function viewings()
    {
        return $this->hasMany(Viewing::class);
    }
}
