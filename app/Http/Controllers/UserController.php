<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @var
     */
    private $userRepository;


    /**
     * @return User
     */
    private function setUserRepository()
    {
        return $this->userRepository = new User();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $user = $this->setUserRepository()->getAll();
        return (json_decode($user, true));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        $user = $this->setUserRepository()->getOne($id);
        return (json_decode($user, true));
    }


    public function delete($id)
    {
        $this->setUserRepository()->deleteOne($id);
        return "Uspesno obrisan user";
    }

    /**
     * @param UserRequest $request
     */
    public function insert(UserRequest $request)
    {
        // izmesti logiku u repozitori ovde pozovi fukkciju
        // kad se bude unosio user mora da se unese i njegova saba sto znaci update tabele room
        $user_json = $request->json()->all();
        dd($user_json);
//        $user = new User(['name'=>$user_json['name'],'lastname'=>$user_json['lastname'],'date_of_birth'=>$user_json['date_of_birth'],'gender'=>$user_json['gender'],'email'=>$user_json['email'],'id_Room'=>$user_json['id_Room'],'id_Floor'=>$user_json['id_Floor'],'id_Block'=>$user_json['id_Block'],'id_Card'=>$user_json['id_Card'],'id_UserType'=>$user_json['id_UserType'],'image_name'=>$user_json['image_name'],'password'=>$user_json['password'],'creation_date'=>$user_json['creation_date'],'college'=>$user_json['college'],'index_number'=>$user_json['index_number'],'phone_number'=>$user_json['phone_number']]);
//        $users= new User();
//        $users->save($user);
//        return 'uspeo';
    }
    // vrati vezu user -> room
    public function userRoom()
    {
        $user = new User();
        $user->getUserRoom();
    }
    public function insertUserRoom()
    {
        $user = new User();
        $user->inserUserRoom();
    }
    public function updateUserRoom()
    {
        $user = new User();
        $user->updateUserRoom();
    }
}
