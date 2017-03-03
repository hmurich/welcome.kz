<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysDirectoryNamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_directory_names', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->nullable();
			$table->integer('directory_id')->nullable()->index('FK_sys_directory_names_directo');
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
		Schema::drop('sys_directory_names');
	}

}
