<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'dob', 'age', 'height', 'weight'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}