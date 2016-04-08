<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
