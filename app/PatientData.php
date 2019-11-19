<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presenceData extends Model
{
    protected $guarded = [];

    public function presences()
    {
      return $this->belongsToMany(presence::class, 'presence_data_presence');
    }
}
