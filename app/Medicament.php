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
}
