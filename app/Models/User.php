<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    //
    protected $primaryKey = "id_user";

    protected $table = 'user';
    public $user;

    public function __construct()
    {
    }

    public function getAll()
    {
        $this->user = User::all();
        return $this->user;
    }

    public function getOne($id)
    {
        $this->user = User::where('id_user',$id)->get();
        return $this->user;
    }
    public function deleteOne($id) {
        $this->user = User::find($id)->delete();
        return "";
    }
    public function roomUser()
    {
        return $this->hasOne("App\Models\Room",'id_user');
    }
    public function getUserRoom()
    {
        $user = User::findOrFail(1);
        dd($user->roomUser);;
    }
    public function inserUserRoom()
    {
        $number = 15;
        $user = User::findOrFail(1);
        $room = new Room(['room_number'=> $number,'id_Floor'=>'10']);
        $user->roomUser()->save($room);
    }
    public function updateUserRoom()
    {
        // trazis sobu usera i za nju kreiras objekat, njegove propertije update-jes i na kraju SAVE!!!!
        $room = Room::where("id_User",1)->first();
        $room->room_number = '17';
        $room->id_Floor = 7;
        $room->save();
        return "uspeo";
    }
}
