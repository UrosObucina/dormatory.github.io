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
    CONST UPDATED_AT = 'creation_date';
    CONST CREATED_AT = 'modification_date';
    public $fillable = ['name', 'lastname', 'date_of_birth', 'gender', 'id_Room', 'id_Blokc', 'id_Floor', 'id_Card', 'id_UserType', 'email', 'image_name', 'password', 'college', 'phone', 'index_number', 'creation_date', 'modification_date'];

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
        $this->user = User::where('id_user', $id)->get();
        return $this->user;
    }

    public function deleteOne($id)
    {
        $this->user = User::find($id)->delete();
        return "";
    }

    public function insertUser($user)
    {
        $room = Room::where('id_Room', $user['id_Room'])->get();
        $floor = Floor::where('id_Floor', $user['id_Floor'])->get();
        $block = Block::where('id_Block', $user['id_Block'])->get();

        if (!empty($room) && !empty($floor) && !empty($block)) {
            // TODO ovde puca nece da izvrsi upit
            User::create(['name' => $user['name'], "lastname" => $user['lastname'], "date_of_birth" => $user['date_of_birth'], "gender" => $user['gender'], "email" => $user['email'], "id_Room" => $user['id_Room'], "id_Block" => $user['id_Block'], "id_Floor" => $user['id_Floor'], "id_Card" => $user['id_Card'], "id_UserType" => $user['id_UserType'], "image_name" => $user['image_name'], "password" => $user['password'], "college" => $user['college'], "inedex_number" => $user['index_number'], "phone" => $user['phone_number']]);
        }
        echo 'Usepo si!';

    }

    public function roomUser()
    {
        return $this->hasOne("App\Models\Room", 'id_user');
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
        $room = new Room(['room_number' => $number, 'id_Floor' => '10']);
        $user->roomUser()->save($room);
    }

    public function updateUserRoom()
    {
        // trazis sobu usera i za nju kreiras objekat, njegove propertije update-jes i na kraju SAVE!!!!
        $room = Room::where("id_User", 1)->first();
        $room->room_number = '17';
        $room->id_Floor = 7;
        $room->save();
        return "uspeo";
    }
}
