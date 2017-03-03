<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSysFilterRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sys_filter_role', function(Blueprint $table)
		{
			$table->foreign('filter_id', 'FK_sys_filter_role_filter_id')->references('id')->on('sys_filters')->onUpdate('RESTRICT')->onDelete('NO ACTION');
			$table->foreign('role_id', 'FK_sys_filter_role_role_id')->references('id')->on('sys_company_role')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sys_filter_role', function(Blueprint $table)
		{
			$table->dropForeign('FK_sys_filter_role_filter_id');
			$table->dropForeign('FK_sys_filter_role_role_id');
		});
	}

}
