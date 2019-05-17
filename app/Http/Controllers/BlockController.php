<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    //
    public function insertBlock()
    {
        $block = new Block();
        $block->insertBlock();
    }
    public function insertBlockFloors()
    {
        $block = new Block();
        $block->insertBlockFloors();
    }
    public function updateBlock()
    {
        $block = new Block();
        $block->updateBlock();
    }
    public function deleteBlock()
    {
        $block = new Block();
        $block->deleteBlock();
    }
}
