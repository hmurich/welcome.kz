<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSysDirectoryNamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sys_directory_names', function(Blueprint $table)
		{
			$table->foreign('directory_id', 'FK_sys_directory_names_directo')->references('id')->on('sys_directory')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sys_directory_names', function(Blueprint $table)
		{
			$table->dropForeign('FK_sys_directory_names_directo');
		});
	}

}
