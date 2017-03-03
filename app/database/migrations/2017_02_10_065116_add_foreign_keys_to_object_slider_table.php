<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObjectSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('object_slider', function(Blueprint $table)
		{
			$table->foreign('object_id', 'FK_object_slider_object_id')->references('id')->on('objetcs')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('object_slider', function(Blueprint $table)
		{
			$table->dropForeign('FK_object_slider_object_id');
		});
	}

}
