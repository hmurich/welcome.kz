<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable();
			$table->text('note', 65535)->nullable();
			$table->string('image')->nullable();
			$table->text('meta_key', 65535)->nullable();
			$table->text('meta_desc', 65535)->nullable();
			$table->integer('object_id')->nullable()->index('FK_news_object_id');
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
		Schema::drop('news');
	}

}
