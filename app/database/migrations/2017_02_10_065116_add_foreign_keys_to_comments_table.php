<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->foreign('object_id', 'FK_comments_object_id')->references('id')->on('objetcs')->onUpdate('RESTRICT')->onDelete('NO ACTION');
			$table->foreign('user_id', 'FK_comments_user_id2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('FK_comments_object_id');
			$table->dropForeign('FK_comments_user_id2');
		});
	}

}
