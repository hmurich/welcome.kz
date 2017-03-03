<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObjetcsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('objetcs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('role_id')->nullable()->index('FK_objetcs_role_id');
			$table->string('name')->nullable();
			$table->integer('view_total')->nullable();
			$table->integer('view_add')->nullable();
			$table->integer('score_avg')->nullable();
			$table->integer('score_total')->nullable();
			$table->integer('score_add')->nullable();
			$table->integer('score_sum')->nullable();
			$table->integer('score_count')->nullable();
			$table->integer('city_id')->nullable();
			$table->integer('user_id')->nullable()->index('FK_objetcs_user_id');
			$table->integer('company_id')->nullable()->index('FK_objetcs_company_id');
			$table->boolean('is_active')->nullable()->default(1);
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
		Schema::drop('objetcs');
	}

}
