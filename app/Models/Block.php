<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    //
    public function blockFloors()
    {
        return $this->hasMany('App\Models\Floor');
    }
}
