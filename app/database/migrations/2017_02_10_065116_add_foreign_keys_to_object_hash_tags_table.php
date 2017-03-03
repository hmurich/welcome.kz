<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObjectHashTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('object_hash_tags', function(Blueprint $table)
		{
			$table->foreign('object_id', 'FK_company_hash_company_id')->references('id')->on('objetcs')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('object_hash_tags', function(Blueprint $table)
		{
			$table->dropForeign('FK_company_hash_company_id');
		});
	}

}
