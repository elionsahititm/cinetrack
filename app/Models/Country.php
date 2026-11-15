<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function titles()
    {
        return $this->hasMany(Title::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
