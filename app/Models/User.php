<?php

namespace App\Models;

use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use mysql_xdevapi\Session;

class User extends Model
{
    //
    protected $primaryKey = "id_user";

    protected $table = 'user';
    public $user;
    CONST UPDATED_AT = 'creation_date';
    CONST CREATED_AT = 'modification_date';
    public $fillable = ['name', 'date_of_birth', 'gender', 'id_Room', 'id_Block', 'id_Floor', 'id_Card', 'id_UserType', 'email', 'image_name', 'password', 'college', 'lastname', 'phone', 'index_number', 'creation_date', 'modification_date'];

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
        // TODO moras da raskines veze sa Room tabelom i da resetujes na nulu id_user u toj tabeli pri brisanju
        $this->user = User::find($id)->delete();
        return "";
    }

    public function insertUser($user)
    {
        $room = Room::where('id_Room', $user['id_Room'])->first();
        $floor = Floor::where('id_Floor', $user['id_Floor'])->first();
        $block = Block::where('id_Block', $user['id_Block'])->first();

        if (!empty($room) && !empty($floor) && !empty($block)) {
            $inserted_user = new User();
            $inserted_user['name'] = $user['name'];
            $inserted_user['lastname'] = $user['lastname'];
            $inserted_user['date_of_birth'] = $user['date_of_birth'];
            $inserted_user['gender'] = $user['gender'];
            $inserted_user['id_Room'] = $user['id_Room'];
            $inserted_user['id_Floor'] = $user['id_Floor'];
            $inserted_user['id_Block'] = $user['id_Block'];
            $inserted_user['id_Card'] = $user['id_Card'];
            $inserted_user['id_UserType'] = $user['id_UserType'];
            $inserted_user['email'] = $user['email'];
            $inserted_user['image_name'] = $user['image_name'];
            $inserted_user['password'] = Hash::make($user['password']);
            $inserted_user['college'] = $user['college'];
            $inserted_user['phone'] = $user['phone'];
            $inserted_user['index_number'] = $user['index_number'];
            $inserted_user->save();
            // TODO kad se unese user mora da se unese u tabelu Room da ona njemu pripada
            $room['id_User'] = $inserted_user['id_user'];
            $room->save();
            echo 'Usepo si!';
        } else {
            echo "ne mozes da unsese!";
        }
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

    public function userMaterialRequirement()
    {
        return $this->hasMany('App\Models\MaterialRequirement', 'id_user');
    }

    /**
     * @param Request $request
     */
    public function login($request)
    {
        $email = 'petar.peric@gmail.com';
        $password = 'pera1234';
        $user = User::where('email', $email)->first();
        if (Hash::check($password, $user['password'])) {
            try {
                return $user['id_user'];
                // TODO api za logovanje mora da ima token("informacije o korisniku") cimer stvalja podatke u lokal storage
            } catch (Exception $e) {
                return $e;
            }
        } else {
            echo 'Pa i ne bas';
        }
    }
}
