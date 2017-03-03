<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable();
			$table->text('note', 65535)->nullable();
			$table->boolean('is_answer')->nullable()->default(0);
			$table->integer('score')->nullable();
			$table->integer('object_id')->nullable()->index('FK_comments_object_id');
			$table->integer('parent_id')->nullable();
			$table->boolean('is_publish')->nullable()->default(0);
			$table->integer('user_id')->nullable()->index('FK_comments_user_id2');
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
		Schema::drop('comments');
	}

}
