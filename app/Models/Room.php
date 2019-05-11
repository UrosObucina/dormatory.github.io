<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $primaryKey = "id_Room";

    protected $table = 'rooms';

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = ['room_number','id_Floor','id_User'];

    public function userRoom()
    {
        return $this->hasOne("App\Models\User",'id_Room');
    }
//    public function floorRoom()
//    {
//        return $this->hasOne("App\Models\Floor");
//    }
    public function insertRoom()
    {
        $floor = Floor::findOrFail(1);
        $rooms = new Room(['room_number'=>'24','id_User'=>'0']);
        $floor->roomFloor()->save($rooms);
        return "uspeo";
    }
    public function getRoom()
    {
        $floor = Floor::findOrFail(1);
        $floor->roomFloor;
        dd($floor->roomFloor);
    }
}
