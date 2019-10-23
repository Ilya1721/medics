<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $guarded = [];

    public function manufactors()
    {
      return $this->belongsToMany(Manufactor::class, 'medicament_manufactor');
    }

    public function patients()
    {
      return $this->belongsToMany(Patient::class, 'patient_medicament');
    }
}
