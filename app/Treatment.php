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

    public function patients()
    {
      return $this->belongsToMany(Patient::class, 'patient_treatment');
    }
}
