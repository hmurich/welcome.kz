<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitors', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('from')->nullable();
			$table->string('external_id')->nullable();
			$table->integer('user_id')->nullable()->index('FK_visitors_user_id');
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
		Schema::drop('visitors');
	}

}
