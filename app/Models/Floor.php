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

    protected $fillable = ['floor_number','id_Block'];

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
        // ako sprat ima sobe
        // izbrisati samo veze, ako se iszbrise sprat => sobama kojima je taj sprad dodeljen unsetuje se vrednst id_Floor na 0
        $roomsOnFloor = Room::where("id_Floor",1)->get();
        $roomsOnFloor;
        if(isset($roomsOnFloor))
        {
            return 'ima soba, nemoj da brises';
        }
    }
}
