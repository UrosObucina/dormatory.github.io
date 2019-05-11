<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    //
    protected $primaryKey = "id_Floor";

    protected $table = 'floors';

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = ['floor_number'];

    public function roomFloor()
    {
        return $this->hasMany('App\Models\Room', "id_Floor");
    }
    public function insertFloor()
    {
        Floor::create(['floor_number'=>'3','id_Block'=>'0']);
    }
    public function deleteFloor()
    {
        // ispitati da li na spratu postoji soba, ako ne moze da izbrise sprat
    }
}
