<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransLibTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trans_lib', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('lang_id');
			$table->text('russian', 65535)->nullable();
			$table->text('other', 65535)->nullable();
			$table->boolean('is_have')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trans_lib');
	}

}
