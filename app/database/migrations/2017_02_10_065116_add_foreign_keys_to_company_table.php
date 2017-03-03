<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FK_company_user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company', function(Blueprint $table)
		{
			$table->dropForeign('FK_company_user_id');
		});
	}

}
