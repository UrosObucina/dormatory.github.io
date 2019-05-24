<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // update moze da se uradi ali kakav razmotriti jos!!

    private $room;
    public function __construct()
    {
        $this->room = new Room();
    }
    public function getAll()
    {
        return $this->room->getAll();
    }
    public function getOne($id)
    {
        return $this->room->getOne($id);
    }
    public function insertRoomFloor()
    {
        $this->room->insertRoomFloor();
    }
    public function insertRoom()
    {
        $this->room->insertRoom();
    }
    public function getRoom()
    {
        $this->room->getRoom();
    }
    public function deleteRoom()
    {
        $this->room->deleteRoom();
    }
}
