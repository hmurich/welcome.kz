<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObjectHashTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('object_hash_tags', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('object_id')->nullable()->index('FK_company_hash_company_id');
			$table->text('note', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('object_hash_tags');
	}

}
