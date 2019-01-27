<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToParametresTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('parametres', function (Blueprint $table) {
			$table->string('telephone')->nullable();
			$table->string('email')->nullable();
			$table->string('adress')->nullable();

			$table->string('facebook')->nullable();
			$table->string('google')->nullable();
			$table->string('twitter')->nullable();
			$table->string('youtube')->nullable();

			$table->text('apropos')->nullable();
			$table->string('photo1')->nullable();
			$table->string('photo2')->nullable();
			$table->string('photo3')->nullable();

			$table->dateTime('last-save')->default(date("Y-m-d H:i:s"));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('parametres', function (Blueprint $table) {
			$table->dropColumn('telephone');
			$table->dropColumn('email');
			$table->dropColumn('adress');

			$table->dropColumn('facebook');
			$table->dropColumn('google');
			$table->dropColumn('twitter');
			$table->dropColumn('youtube');

			$table->dropColumn('apropos');
			$table->dropColumn('photo1');
			$table->dropColumn('photo2');
			$table->dropColumn('photo3');

			$table->dropColumn('last-save');
		});
	}
}
