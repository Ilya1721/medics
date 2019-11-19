<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $guarded = [];

    public function diseases()
    {
      return $this->belongsToMany(Disease::class, 'treatment_diseases');
    }

    public function presences()
    {
      return $this->belongsToMany(Presence::class, 'presence_treatment');
    }
}
