<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];

    public function city()
    {
      return $this->belongsTo(City::class);
    }

    public function diseases()
    {
      return $this->belongsToMany(Disease::class, 'patient_diseases');
    }

    public function patientData()
    {
      return $this->belongsToMany(PatientData::class, 'patient_data_patient');
    }

    public function treatments()
    {
      return $this->belongsToMany(Treatment::class, 'patient_treatment');
    }

    public function procedures()
    {
      return $this->belongsToMany(Procedure::class, 'patient_procedure');
    }

    public function medicaments()
    {
      return $this->belongsToMany(Medicament::class, 'patient_medicament');
    }

    public function symptoms()
    {
      return $this->belongsToMany(Symptom::class, 'patient_symptom');
    }
}
