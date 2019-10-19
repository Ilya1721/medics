<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $guarded = [];

    public function patients()
    {
      return $this->belongsToMany(Patient::class, 'patient_procedure');
    }
}
