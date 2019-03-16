<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 16-Mar-19
 * Time: 12:26 PM
 */

namespace App\Models;


class User
{
    public $id_user;
    public $name;
    public $lastname;
    public $date_of_birth;
    public $gender;
    public $email;
    public $id_Room;
    public $id_Floor;
    public $id_Block;
    public $id_Card;
    public $id_UserType;
    public $image_name;
    public $password;
    public $creation_date;
    public $modification_date;
    public $college;
    public $index_number;
    public $phone_number;

    public function __construct()
    {
    }
}