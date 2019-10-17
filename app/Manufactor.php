<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufactor extends Model
{
    public function country()
    {
      return $this->belongsTo(Country::class);
    }
}
