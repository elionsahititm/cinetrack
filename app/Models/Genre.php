<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [];

    public function titles()
    {
        return $this->belongsToMany(Title::class);
    }
}
