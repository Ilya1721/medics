<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $guarded = [];

    public function manufactor()
    {
      return $this->belongsTo(Manufactor::class);
    }

    public function patients()
    {
      return $this->belongsToMany(Patient::class, 'patient_medicament');
    }
}
