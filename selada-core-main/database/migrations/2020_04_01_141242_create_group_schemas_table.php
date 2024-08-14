<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGroupSchemasTable.
 */
class CreateGroupSchemasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_schemas', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('group_id');
            $table->bigInteger('schema_id');
            $table->bigInteger('share')->default(0);
            $table->boolean('is_shareable')->default(false);
            $table->timestamps();
			$table->softDeletes();
			
			$table->foreign('group_id')
					->references('id')->on('groups')
					->onDelete('cascade');

			$table->foreign('schema_id')
					->references('id')->on('schemas')
					->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_schemas');
	}
}
