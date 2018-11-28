<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHasMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material')->unsigned();
            $table->integer('user')->unsigned();
            $table->dateTime('date_emprunt');
            $table->dateTime('date_rendre');
            $table->dateTime('date_rendement')->nullable();

            $table->foreign('material')->references('id')->on('materials');
            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_materials');
    }
}
