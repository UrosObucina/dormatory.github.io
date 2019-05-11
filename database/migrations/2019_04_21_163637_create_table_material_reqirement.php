<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMaterialReqirement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_requirement', function (Blueprint $table) {
            $table->bigIncrements('id_requirement');
            $table->integer('id_user');
            $table->string('requiremnt_name',30);
            $table->tinyInteger('requirement_quantity');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_requirement');
    }
}
