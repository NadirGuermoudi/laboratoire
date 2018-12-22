<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartenaireToThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theses', function (Blueprint $table) {
            $table->integer('encadreur_ext')->unsigned()->nullable()->after('coencadreur_int');
            $table->integer('coencadreur_ext')->unsigned()->nullable()->after('encadreur_ext');

            $table-> foreign('encadreur_ext')->references('id')->on('contacts')->onDelete('set null');
            $table-> foreign('coencadreur_ext')->references('id')->on('contacts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theses', function (Blueprint $table) {
            $table->dropForeign(['encadreur_ext']);
            $table->dropForeign(['coencadreur_ext']);
            $table->dropColumn('encadreur_ext');
            $table->dropColumn('coencadreur_ext');
        });
    }
}
