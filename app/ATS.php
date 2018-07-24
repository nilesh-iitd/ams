<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ATS extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'dop', 'aid', 'tid', 'sid'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}