<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $guarded = [];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
