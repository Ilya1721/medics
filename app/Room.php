<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function department()
    {
      return $this->belongsTo(Department::class);
    }

    public function presences()
    {
      return $this->hasMany(Presence::class);
    }
}
