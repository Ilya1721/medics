<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $guarded = [];

    public function patients()
    {
      return $this->hasMany(Patient::class);
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
