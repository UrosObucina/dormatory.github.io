<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationMNStockDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_m_n_stock_delivery', function (Blueprint $table) {
            $table->bigIncrements('id_stock_delivery');
            $table->integer('id_stock')->unsigned()->index();
            $table->integer("id_delivery")->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_m_n_stock_delivery');
    }
}
