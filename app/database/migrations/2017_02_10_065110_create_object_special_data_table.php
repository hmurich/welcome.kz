<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObjectSpecialDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('object_special_data', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('object_id')->nullable()->index('FK_company_special_data_compan');
			$table->integer('filter_id')->nullable()->index('FK_object_special_data_filter_');
			$table->string('filter_key')->nullable();
			$table->integer('val_int')->nullable();
			$table->text('val_text', 65535)->nullable();
			$table->integer('role_id')->nullable()->index('FK_object_special_data_role_id');
			$table->boolean('is_filter')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('object_special_data');
	}

}
