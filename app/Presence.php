<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $guarded = [];

    public function patient()
    {
      return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
      return $this->belongsTo(Employee::class);
    }

    public function room()
    {
      return $this->belongsTo(Room::class);
    }
}
