<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('name',30);
            $table->string('lastname',40);
            $table->string('date_of_birth',10);
            $table->tinyInteger('gender');
            $table->string('email',70);
            $table->tinyInteger('id_Room');
            $table->tinyInteger('id_Floor');
            $table->tinyInteger('id_Block');
            $table->integer('id_Card');
            $table->integer('id_UserType');
            $table->string('image_name',100);
            $table->string('password',90);
            $table->timestamp('creation_date');
            $table->timestamp('modification_date')->nullable();
            $table->string('college',80);
            $table->string('index_number',10);
            $table->integer('phone');
            $table->text('token');
            $table->text('refresh_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
