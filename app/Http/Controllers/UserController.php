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
    public function insertUser(UserRequest $request)
    {
        // TODO izmesti logiku u repozitori ovde pozovi fukkciju
        // TODO kad se bude unosio user mora da se unese i njegova saba sto znaci update tabele room
        $user_json = $request->json()->all();
        //dd($user_json['name']);
        $this->setUserRepository()->insertUser($user_json);
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
