<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSysFilterCatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sys_filter_cats', function(Blueprint $table)
		{
			$table->foreign('cat_id', 'FK_sys_filter_cats_cat_id')->references('id')->on('sys_company_cats')->onUpdate('RESTRICT')->onDelete('NO ACTION');
			$table->foreign('filter_id', 'FK_sys_filter_cats_filter_id')->references('id')->on('sys_filters')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sys_filter_cats', function(Blueprint $table)
		{
			$table->dropForeign('FK_sys_filter_cats_cat_id');
			$table->dropForeign('FK_sys_filter_cats_filter_id');
		});
	}

}
