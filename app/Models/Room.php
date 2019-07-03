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

    public function getAll()
    {
        return Room::all();
    }
    public function getOne($id)
    {
        return Room::where($this->primaryKey,$id)->first();
    }
    public function userRoom()
    {
        return $this->hasMany("App\Models\User",'id_Room');
    }
    public function floorRoom()
    {
        return $this->belongsTo("App\Models\Floor");
    }
    public function insertRoomFloor()
    {
        $floor = Floor::findOrFail(1);
        $rooms = new Room(['room_number'=>'24','id_User'=>'0']);
        $floor->roomFloor()->save($rooms);
        return "uspeo";
    }
    public function insertRoom()
    {
        // unos u bazu bez ikakvih veza
        $rooms = Room::create(['room_number'=>'33','id_Floor'=>'2','id_User'=>'0']);
        return "uspeo";
    }
    public function getRoom()
    {
        $floor = Floor::findOrFail(1);
        $floor->roomFloor;
        dd($floor->roomFloor);
    }
    public function deleteRoom()
    {
        Room::where('id_Room',2)->delete();
        return 'izbrisan je user';
    }
}
