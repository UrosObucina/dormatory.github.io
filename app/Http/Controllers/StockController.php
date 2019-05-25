<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    private $stock;

    public function __construct()
    {
        $this->stock = new Stock();
    }
    public function getAll()
    {
        return $this->stock->getAll();
    }
    public function getOne($id)
    {
        return $this->stock->getOne($id);
    }
    public function insertStock()
    {
        $this->stock->insertStock();
    }
    public function updateStock($id)
    {
        $this->stock->updateStock($id);
    }
    public function deleteStock()
    {
        // ovde ce morati da se ispituju sve veze sa Materijalom, ne moze da se brise ako postoji veza
    }
}
