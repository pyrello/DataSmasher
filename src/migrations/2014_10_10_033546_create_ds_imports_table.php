<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDsImportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ds_imports', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('source_id')->unsigned();
            $table->string('status')->default('created');
            $table->string('source', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('created_by', 255);
            $table->string('updated_by', 255);
			$table->timestamps();

            $table->foreign('source_id')->references('id')->on('ds_sources');
		});

        Schema::create('ds_import_processing', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('import_id')->unsigned();
            $table->string('status')->nullable();
            $table->text('data')->nullable();
            $table->string('type')->nullable();
            $table->string('format')->default('json');
            $table->integer('count')->default(0);
            $table->string('updated_by', 255);

            $table->foreign('import_id')->references('id')->on('ds_imports');
        });

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('ds_import_processing', function(Blueprint $table) {
            $table->dropForeign('ds_import_processing_import_id_foreign');
        });

        Schema::drop('ds_import_processing');

        Schema::table('ds_imports', function(Blueprint $table) {
            $table->dropForeign('ds_imports_source_id_foreign');
        });

		Schema::drop('ds_imports');
	}

}
