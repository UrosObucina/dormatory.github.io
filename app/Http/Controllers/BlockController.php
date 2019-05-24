<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    //
    private $block;
    public function __construct()
    {
        $this->block = new Block();
    }
    public function getAll()
    {
        return $this->block->getAll();
    }
    public function getOne($id)
    {
        return $this->block->getOne($id);
    }
    public function insertBlock()
    {
        $this->block->insertBlock();
    }
    public function insertBlockFloors()
    {
        $this->block->insertBlockFloors();
    }
    public function updateBlock()
    {
        $this->block->updateBlock();
    }
    public function deleteBlock()
    {
        $this->block->deleteBlock();
    }
}
