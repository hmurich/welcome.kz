<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObjetcsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('objetcs', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_objetcs_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('NO ACTION');
			$table->foreign('role_id', 'FK_objetcs_role_id')->references('id')->on('sys_company_role')->onUpdate('RESTRICT')->onDelete('NO ACTION');
			$table->foreign('user_id', 'FK_objetcs_user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('objetcs', function(Blueprint $table)
		{
			$table->dropForeign('FK_objetcs_company_id');
			$table->dropForeign('FK_objetcs_role_id');
			$table->dropForeign('FK_objetcs_user_id');
		});
	}

}
