<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Untuk history status sehingga bisa terecord semua perubahan status
        Schema::create('transaction_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaction_id')->unsigned();
			$table->smallInteger('status');
			$table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_statuses');
    }
}
