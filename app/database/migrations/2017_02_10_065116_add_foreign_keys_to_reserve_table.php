<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReserveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reserve', function(Blueprint $table)
		{
			$table->foreign('object_id', 'FK_reserve_object_id')->references('id')->on('objetcs')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reserve', function(Blueprint $table)
		{
			$table->dropForeign('FK_reserve_object_id');
		});
	}

}
