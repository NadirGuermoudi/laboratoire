<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',50);
            $table->string('prenom',50);
            $table->integer('partenaire')->unsigned();
            $table->string('fonction');
            $table->string('pays',50);
            $table->string('ville',50);
            $table->string('adresse')->nullable();
            $table->string('telephone',10)->nullable();
            $table->timestamps();

            $table->unique('nom', 'prenom');
            $table->foreign('partenaire')->references('id')->on('partenaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
