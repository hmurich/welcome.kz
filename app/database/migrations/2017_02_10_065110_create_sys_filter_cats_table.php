<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysFilterCatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_filter_cats', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('filter_id')->nullable()->index('FK_sys_filter_cats_filter_id');
			$table->integer('cat_id')->nullable()->index('FK_sys_filter_cats_cat_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sys_filter_cats');
	}

}
