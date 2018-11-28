<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipeHasMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe_has_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material')->unsigned();
            $table->integer('equipe')->unsigned();
            $table->dateTime('date_emprunt');
            $table->dateTime('date_rendre');
            $table->dateTime('date_rendement')->nullable();

            $table->foreign('material')->references('id')->on('materials');
            $table->foreign('equipe')->references('id')->on('equipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipe_has_materials');
    }
}
