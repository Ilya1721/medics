<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $guarded = [];

    public function presences()
    {
      return $this->belongsToMany(Presence::class, 'presence_disease');
    }

    public function symptoms()
    {
      return $this->belongsToMany(Symptom::class, 'symptom_diseases');
    }

    public function treatments()
    {
      return $this->belongsToMany(Treatment::class, 'treatment_diseases');
    }
}
