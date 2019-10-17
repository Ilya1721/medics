<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $guarded = [];

    public function diseases()
    {
      return $this->belongsToMany(Disease::class, 'symptom_diseases');
    }
}
