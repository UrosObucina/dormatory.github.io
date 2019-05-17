<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    //
    protected $primaryKey = "id_Block";

    protected $table = 'blocks';

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = ['block_Name'];

    public function blockFloors()
    {
        return $this->hasMany('App\Models\Floor', 'id_Block');
    }

    public function insertBlock()
    {
        Block::create(['block_Name' => 'Paviljon II']);
    }

    public function insertBlockFloors()
    {
        $block = Block::findOrFail(1);
        $floor = new Floor(['floor_number' => '2']);
        $block->blockFloors()->save($floor);
    }

    public function updateBlock()
    {
        $block = Block::where($this->primaryKey, 1)->first();
        $block->block_Name = 'Paviljon II';
        $block->save();
    }

    public function deleteBlock()
    {
        $id_Block = 2;
        //Block::where($this->primaryKey,2)->delete();
        $blockOnFloor = Floor::where('id_Block', $id_Block)->get();
        $isExistingBlock = Block::where('id_Block', $id_Block)->get();
        //dd($blockOnFloor);
        if (!$blockOnFloor->isNotEmpty()) {
            if ($isExistingBlock->isNotEmpty()) {
                Block::where($this->primaryKey, 2)->delete();
                echo 'obrisan je blok ' . $id_Block;
            } else {
                echo 'ne postoji';
            }
        } else {
                echo 'postoje spratovi u bloku';
        }
    }

}
