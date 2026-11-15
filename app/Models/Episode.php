<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $guarded = [];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function reviews()
    {
        return $this->hasMany(EpisodeReview::class);
    }

    public function viewings()
    {
        return $this->hasMany(EpisodeViewing::class);
    }
}
