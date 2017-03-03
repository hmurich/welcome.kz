<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObjectSpecialDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('object_special_data', function(Blueprint $table)
		{
			$table->foreign('object_id', 'FK_company_special_data_compan')->references('id')->on('objetcs')->onUpdate('RESTRICT')->onDelete('NO ACTION');
			$table->foreign('filter_id', 'FK_object_special_data_filter_')->references('id')->on('sys_filters')->onUpdate('RESTRICT')->onDelete('NO ACTION');
			$table->foreign('role_id', 'FK_object_special_data_role_id')->references('id')->on('sys_company_role')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('object_special_data', function(Blueprint $table)
		{
			$table->dropForeign('FK_company_special_data_compan');
			$table->dropForeign('FK_object_special_data_filter_');
			$table->dropForeign('FK_object_special_data_role_id');
		});
	}

}
