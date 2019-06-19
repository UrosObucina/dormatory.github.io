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
        //dd($user_json);
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
    public function login(Request $request)
    {
        $user = $this->setUserRepository()->login($request);
        return $user;
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}
