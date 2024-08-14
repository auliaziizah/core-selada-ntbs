<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRevenuesTable.
 */
class CreateRevenuesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revenues', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('type'); // 1 sementara, 2 permanent
            $table->bigInteger('merchant_id');
            $table->bigInteger('amount');
            $table->date('date');
            $table->timestamps();
			$table->softDeletes();
			
			$table->foreign('merchant_id')
					->references('id')->on('merchants')
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
		Schema::drop('revenues');
	}
}
