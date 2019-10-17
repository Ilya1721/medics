<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function job()
    {
      return $this->belongsTo(Job::class);
    }

    public function department()
    {
      return $this->belongsTo(Department::class);
    }

    public function city()
    {
      return $this->belongsTo(City::class);
    }
}
