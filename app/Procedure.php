<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $guarded = [];

    public function presences()
    {
      return $this->belongsToMany(Presence::class, 'presence_procedure');
    }
}
