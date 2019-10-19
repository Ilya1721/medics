<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientData extends Model
{
    protected $guarded = [];

    public function patients()
    {
      return $this->belongsToMany(Patient::class, 'patient_data_patient');
    }
}
