<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25-May-19
 * Time: 11:29 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DeliveryNote extends Model
{
    protected $table = 'delivery_note';
    protected $primaryKey = 'id_delivery';

    CONST CREATED_AT = 'publishing_date';

    public $fillable = ['publishing_date', 'material_name', 'material_quantity'];

    public function getOne($id)
    {
        $delivety = DeliveryNote::where($this->primaryKey, $id)->first();
        dd($delivety->stockDelivery());
    }

    public function insertDeliveryNote()
    {
        DeliveryNote::create(['material_name' => 'Ekseri', 'material_quantity' => 20]);
    }
    public function stockDelivery()
    {
        return $this->belongsToMany('App\Models\Stock','relation_m_n_stock_delivery','id_delivery','id_stock');
    }
    public function insertStockForDelivery()
    {
        $delivery = DeliveryNote::where($this->primaryKey,1)->first();

        $stock = Stock::where('id_stock_material',1)->first();

        $delivery->stockDelivery()->save($stock);
    }
    public function updateDelivery()
    {
        $delivery = DeliveryNote::where($this->primaryKey,1)->first();

        if($delivery->has('stockDelivery'))
        {
            dd($delivery);
        }else{
            echo 'ne valja ti nesto';
        }
    }
}