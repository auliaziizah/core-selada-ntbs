<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTerminalsTable.
 */
class CreateTerminalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('terminals', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('merchant_id')->nullable();
            $table->string('merchant_name')->nullable();
            $table->string('merchant_address')->nullable();
            $table->string('merchant_account_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('sid')->nullable();
            $table->string('iccid')->nullable();
            $table->string('imei')->nullable();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('terminals');
	}
}
