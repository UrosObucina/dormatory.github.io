<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStockMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_materials', function (Blueprint $table) {
            $table->bigIncrements('id_stock_material');
            $table->string('material_name',30);
            $table->text("material_description");
            $table->string('material_dimension',20);
            $table->tinyInteger("material_quantity");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_materials');
    }
}
