<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObjectLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('object_locations', function(Blueprint $table)
		{
			$table->foreign('object_id', 'FK_company_locations_company_i')->references('id')->on('objetcs')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('object_locations', function(Blueprint $table)
		{
			$table->dropForeign('FK_company_locations_company_i');
		});
	}

}
