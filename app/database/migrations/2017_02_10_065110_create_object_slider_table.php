<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObjectSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('object_slider', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('object_id')->nullable()->index('FK_object_slider_object_id');
			$table->string('image')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('object_slider');
	}

}
