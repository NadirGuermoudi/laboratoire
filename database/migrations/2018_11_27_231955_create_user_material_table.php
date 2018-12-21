<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_material', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('date_emprunt');
            $table->dateTime('date_rendre');
            $table->dateTime('date_rendement')->nullable();

            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_material');
    }
}
