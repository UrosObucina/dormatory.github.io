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
        Schema::create('demages', function (Blueprint $table) {
            $table->bigIncrements('id_demage');
            $table->integer("id_user");
            $table->integer("id_solved_user")->nullable();
            $table->string("demage_type",10);
            $table->string("demage_place",10);
            $table->text("demage_description");
            $table->timestamp('demage_registration');
            $table->timestamp('demage_resolved')->nullable();
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
        Schema::dropIfExists('demages');
    }
}
