<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function insertRoom()
    {
        $room = new Room();
        $room->insertRoom();
        return 'usao';
    }
    public function getRoom()
    {
        $room = new Room();
        $room->getRoom();
    }
}
