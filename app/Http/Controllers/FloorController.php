<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    //
    private $floor;
    public function __construct()
    {
        $this->floor = new Floor();
    }
    public function getAll()
    {
        return $this->floor->getAll();
    }
    public function getOne($id)
    {
        return $this->floor->getOne($id);
    }
    public function insertFloor()
    {
        $this->floor->insertFloor();
    }
    public function deleteFloor()
    {
        $this->floor->deleteFloor();
    }
}
