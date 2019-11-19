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

    public function presences()
    {
      return $this->belongsToMany(presence::class, 'presence_medicament');
    }
}
