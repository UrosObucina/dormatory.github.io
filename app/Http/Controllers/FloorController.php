<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    //
    public function insertFloor()
    {
        $floor = new Floor();
        $floor->insertFloor();
    }
    public function deleteFloor()
    {
        $floor = new Floor();
        $floor->deleteFloor();
    }
}
