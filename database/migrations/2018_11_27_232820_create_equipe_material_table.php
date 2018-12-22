<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipeMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe_material', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material_id')->unsigned();
            $table->integer('equipe_id')->unsigned();
            $table->dateTime('date_emprunt');
            $table->dateTime('date_rendre');
            $table->dateTime('date_rendement')->nullable();

            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('equipe_id')->references('id')->on('equipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipe_material');
    }
}
