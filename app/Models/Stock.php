<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $primaryKey = "id_stock_material";

    protected $table = 'stock_materials';

    public $fillable = ['material_name', 'material_description', 'material_dimension', 'material_quantity'];

    CONST UPDATED_AT = NULL;
    CONST CREATED_AT = NULL;

    public function getAll()
    {
        return Stock::all();
    }

    public function getOne($id)
    {
        return Stock::where($this->primaryKey, $id)->first();
    }

    public function insertStock()
    {
        Stock::create(['material_name' => 'Sraf', 'material_description' => 'Dimenzije su 15x20x2', 'material_dimension' => '15x20x2', 'material_quantity' => 2]);
    }

    public function updateStock($id)
    {
        $stock = Stock::where($this->primaryKey, $id)->first();
        $stock->material_name = 'Ekser';
        $stock->material_dimension = '5x1';
        $stock->save();
    }

    public function deleteStock()
    {
        $id = 1;
        $oneStock = Stock::where($this->primaryKey, $id)->fisrt();
        if ($oneStock->isNotNull()) {
            echo 'postoji materijal';
        } else {
            echo 'ne postoji materijal';
        }
    }
}
