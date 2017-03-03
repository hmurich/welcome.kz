<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObjectReserveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('object__reserve', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('object_id')->nullable()->index('FK_company_reserve_company_id');
			$table->integer('role_id')->nullable();
			$table->string('total_count')->nullable();
			$table->string('free_count')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('object__reserve');
	}

}
