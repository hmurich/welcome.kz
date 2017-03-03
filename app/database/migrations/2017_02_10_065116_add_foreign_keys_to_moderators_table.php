<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToModeratorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('moderators', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FK_moderators_user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('moderators', function(Blueprint $table)
		{
			$table->dropForeign('FK_moderators_user_id');
		});
	}

}
