<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModeratorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moderators', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50)->nullable();
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('mobile')->nullable();
			$table->text('note', 65535)->nullable();
			$table->integer('user_id')->nullable()->index('FK_moderators_user_id');
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
		Schema::drop('moderators');
	}

}
