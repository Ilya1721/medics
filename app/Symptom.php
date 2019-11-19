<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $guarded = [];

    public function diseases()
    {
      return $this->belongsToMany(Disease::class, 'symptom_diseases');
    }

    public function presences()
    {
      return $this->belongsToMany(Presence::class, 'presence_symptom');
    }
}
