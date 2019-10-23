<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufactor extends Model
{
    protected $guarded = [];

    public function country()
    {
      return $this->belongsTo(Country::class);
    }

    public function medicaments()
    {
      return $this->belongsToMany(Medicament::class, 'medicament_manufactor');
    }
}
