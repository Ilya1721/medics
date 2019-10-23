<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function clinic()
    {
      return $this->belongsTo(Clinic::class);
    }

    public function rooms()
    {
      return $this->hasMany(Room::class);
    }
}
