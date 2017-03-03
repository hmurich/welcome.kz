<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSysFilterNamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sys_filter_names', function(Blueprint $table)
		{
			$table->foreign('filter_id', 'FK_sys_filter_names_filter_id')->references('id')->on('sys_filters')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sys_filter_names', function(Blueprint $table)
		{
			$table->dropForeign('FK_sys_filter_names_filter_id');
		});
	}

}
