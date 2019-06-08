<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRelationNMMaterialStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_n_m_material_stock', function (Blueprint $table) {
            $table->bigIncrements('id_material_stock');
            $table->integer('id_material')->unsigned()->index();
            $table->integer("id_stock")->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_n_m_material_stock');
    }
}
