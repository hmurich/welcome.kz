<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable();
			$table->text('note', 65535)->nullable();
			$table->string('attach')->nullable();
			$table->integer('status_id')->nullable();
			$table->integer('cat_id')->nullable();
			$table->integer('user_id')->nullable()->index('FK_tickets_user_id2');
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
		Schema::drop('tickets');
	}

}
