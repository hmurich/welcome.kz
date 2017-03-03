<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObjectReserveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('object__reserve', function(Blueprint $table)
		{
			$table->foreign('object_id', 'FK_company_reserve_company_id')->references('id')->on('objetcs')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('object__reserve', function(Blueprint $table)
		{
			$table->dropForeign('FK_company_reserve_company_id');
		});
	}

}
