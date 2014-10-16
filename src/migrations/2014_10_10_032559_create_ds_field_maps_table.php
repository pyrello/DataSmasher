<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDsFieldMapsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ds_field_maps', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('source_id')->unsigned();
            $table->integer('target_id')->unsigned();
            $table->string('source_field');
            $table->string('target_field');
			$table->timestamps();

            $table->foreign('source_id')->references('id')->on('ds_sources');
            $table->foreign('target_id')->references('id')->on('ds_sources');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('ds_field_maps', function(Blueprint $table) {
            $table->dropForeign('ds_field_maps_source_id_foreign');
            $table->dropForeign('ds_field_maps_target_id_foreign');
        });
		Schema::drop('ds_field_maps');
	}

}
