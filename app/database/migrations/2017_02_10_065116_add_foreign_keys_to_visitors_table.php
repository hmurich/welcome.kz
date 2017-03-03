<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVisitorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('visitors', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FK_visitors_user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('visitors', function(Blueprint $table)
		{
			$table->dropForeign('FK_visitors_user_id');
		});
	}

}
