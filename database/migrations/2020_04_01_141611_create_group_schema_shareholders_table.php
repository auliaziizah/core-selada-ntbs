<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGroupSchemaShareholdersTable.
 */
class CreateGroupSchemaShareholdersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_schema_shareholders', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('shareholder_id');
            $table->bigInteger('group_schema_id');
            $table->string('share');
            $table->timestamps();
			$table->softDeletes();
			
			$table->foreign('shareholder_id')
					->references('id')->on('shareholders')
					->onDelete('cascade');

			$table->foreign('group_schema_id')
					->references('id')->on('group_schemas')
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
		Schema::drop('group_schema_shareholders');
	}
}
