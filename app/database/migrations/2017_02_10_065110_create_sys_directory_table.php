<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysDirectoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_directory', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->nullable();
			$table->boolean('can_delete')->nullable()->default(1);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sys_directory');
	}

}
