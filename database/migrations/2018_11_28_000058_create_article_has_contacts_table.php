<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleHasContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_has_contacts', function (Blueprint $table) {
            $table->integer('article')->unsigned();
            $table->integer('contact')->unsigned();
            $table->timestamps();

            $table->foreign('article')->references('id')->on('articles');
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
        Schema::dropIfExists('article_has_contacts');
    }
}
