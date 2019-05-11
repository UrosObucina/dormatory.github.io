<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    //
    protected $primaryKey = "id_Floor";

    protected $table = 'floors';

    public function roomFloor()
    {
        return $this->hasMany('App\Models\Room', "id_Floor");
    }
    public function blockFloor()
    {
        return $this->hasOne("App\Models\Block");
    }
}
