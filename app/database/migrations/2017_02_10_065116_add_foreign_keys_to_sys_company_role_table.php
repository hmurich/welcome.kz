<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSysCompanyRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sys_company_role', function(Blueprint $table)
		{
			$table->foreign('cat_id', 'FK_sys_company_role_cat_id2')->references('id')->on('sys_company_cats')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sys_company_role', function(Blueprint $table)
		{
			$table->dropForeign('FK_sys_company_role_cat_id2');
		});
	}

}
