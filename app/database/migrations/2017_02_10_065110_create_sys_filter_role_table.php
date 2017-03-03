<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysFilterRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_filter_role', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('filter_id')->nullable()->index('FK_sys_filter_role_filter_id');
			$table->integer('role_id')->nullable()->index('FK_sys_filter_role_role_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sys_filter_role');
	}

}
