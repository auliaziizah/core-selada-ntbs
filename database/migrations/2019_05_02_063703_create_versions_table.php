<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVersionsTable.
 */
class CreateVersionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('versions', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_version');
            $table->string('dashboard_version');
            $table->string('android_version');
            $table->string('database_version');
            $table->string('api_version');
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
		Schema::drop('versions');
	}
}
