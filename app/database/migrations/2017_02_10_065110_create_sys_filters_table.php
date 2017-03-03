<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysFiltersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_filters', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('spec_key')->nullable()->unique('spec_key');
			$table->string('name')->nullable();
			$table->integer('type_id')->nullable();
			$table->boolean('is_many')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sys_filters');
	}

}
