<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // update moze da se uradi ali kakav razmotriti jos!!

    public function insertRoomFloor()
    {
        $room = new Room();
        $room->insertRoomFloor();
        //return 'usao';
    }
    public function insertRoom()
    {
        $room = new Room();
        $room->insertRoom();
    }
    public function getRoom()
    {
        $room = new Room();
        $room->getRoom();
    }
    public function deleteRoom(){
        $room = new Room();
        $room->deleteRoom();
    }
}
