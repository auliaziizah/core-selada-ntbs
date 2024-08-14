<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionClosingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_closings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('start_date');
            $table->date('end_date');
            $table->text('note')->nullable();
            $table->string('total_expanse');
            $table->string('total_income');
            $table->string('current_balance');
            
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('transaction_closings');
    }
}
