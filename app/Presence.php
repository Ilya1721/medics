<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $guarded = [];

    public function patient()
    {
      return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
      return $this->belongsTo(Employee::class);
    }

    public function room()
    {
      return $this->belongsTo(Room::class);
    }

    public function diseases()
    {
      return $this->belongsToMany(Disease::class, 'presence_disease');
    }

    public function patientData()
    {
      return $this->belongsToMany(PatientData::class, 'presence_data_presence');
    }

    public function treatments()
    {
      return $this->belongsToMany(Treatment::class, 'presence_treatment');
    }

    public function procedures()
    {
      return $this->belongsToMany(Procedure::class, 'presence_procedure');
    }

    public function medicaments()
    {
      return $this->belongsToMany(Medicament::class, 'presence_medicament');
    }

    public function symptoms()
    {
      return $this->belongsToMany(Symptom::class, 'presence_symptom');
    }
}
