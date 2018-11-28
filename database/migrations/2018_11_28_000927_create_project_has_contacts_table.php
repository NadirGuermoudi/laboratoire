<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectHasContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_has_contacts', function (Blueprint $table) {
            $table->integer('projet')->unsigned();
            $table->integer('contact')->unsigned();
            $table->timestamps();

            $table->foreign('projet')->references('id')->on('projets');
            $table->foreign('contact')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_has_contacts');
    }
}
