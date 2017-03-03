<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('object_id')->nullable()->index('FK_events_object_id');
			$table->string('title')->nullable();
			$table->string('note')->nullable();
			$table->date('date_event')->nullable();
			$table->time('time_event')->nullable();
			$table->integer('duration')->nullable();
			$table->boolean('is_active')->nullable();
			$table->string('created_at')->nullable();
			$table->string('updated_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
