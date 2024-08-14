<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTransactionBJBsTable.
 */
class CreateTransactionBJBsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaction_bjb', function(Blueprint $table) {
            $table->increments('id');
			$table->string('transaction_name')->nullable();
            $table->string('transaction_code')->nullable();
            $table->string('product_name')->nullable();
            $table->bigInteger('nominal')->nullable();
            $table->bigInteger('fee')->nullable();
            $table->bigInteger('total')->nullable();
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
		Schema::drop('transaction_bjb');
	}
}
