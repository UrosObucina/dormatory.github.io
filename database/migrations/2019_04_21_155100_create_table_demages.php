<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDemages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damages', function (Blueprint $table) {
            $table->bigIncrements('id_damage');
            $table->integer("id_user");
            $table->integer("id_solved_user")->nullable();
            $table->string("damage_type",10);
            $table->string("damage_place",10);
            $table->text("damage_description");
            $table->timestamp('damage_registration');
            $table->timestamp('damage_resolved')->nullable();
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('damages');
    }
}
