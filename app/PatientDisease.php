<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDisease extends Model
{
    protected $guarded = [];

    public function patient()
    {
      return $this->belongsToMany(Patient::class);
    }

    public function disease()
    {
      return $this->belongsToMany(Disease::class);
    }

    public function doctor()
    {
      return $this->belongsTo(Employee::class);
    }
}
