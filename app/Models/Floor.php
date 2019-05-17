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

    protected $fillable = ['floor_number', 'id_Block'];

    public function roomFloor()
    {
        return $this->hasMany('App\Models\Room', "id_Floor");
    }

    public function insertFloor()
    {
        Floor::create(['floor_number' => '3', 'id_Block' => '0']);
    }

    public function deleteFloor()
    {
        $id = 5;
        // ispitati da li na spratu postoji soba, ako ne moze da izbrise sprat
        // ako sprat ima sobe i ako sprat postoji
        $roomsOnFloor = Room::where("id_Floor", $id)->get();
        //dd($roomsOnFloor);
        $isExistingFloor = Floor::where($this->primaryKey, $id)->get();
        if (!$roomsOnFloor->isNotEmpty()) {
            if ($isExistingFloor->isNotEmpty()) {
                Floor::where($this->primaryKey, $id)->delete();
                echo 'obrisa sam ' . $id;
            } else {
                echo 'vec je izbrisan';
            }

        } else {
            echo 'nemoj da brisese';
        }
    }
}
